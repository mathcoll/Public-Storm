<?php
require 'globals.php';
require 'oauth_helper.php';

// Fill in the next 3 variables.
/*
$request_token='ktmkyfh';
$request_token_secret='edca649f19d8dc32a304a956d7e4c5c01f92ca74';
$oauth_verifier= 'na47p9';
*/

$request_token = $_SESSION["oauth_request_token"];
$request_token_secret = $_SESSION["oauth_token_secret"];
/*
print "request_token : ".$request_token."<br />";
print "request_token_secret : ".$request_token_secret."<br />";
print "oauth_verifier : ".$oauth_verifier."<br />";

(
    [oauth_token] => A%3Ds.dqYQeY4jGDf1oLZLvmMhceCpD6IUZ6ZWtyDdAvINoTg7RQqflZFZFVr0AWAwxi_LNEb5ihdr68OLhb4_JmICrHoPwHW2DfoJZ6GOLjJlx6OltVhDfWq0vJwS_h_QhNVBD_yDuphsMbbboCK1TarYP_9PO3aDZFj.ob4eTA2JwjsG6VvS946D2uY3k_GKFtXLPV4v_ZLoVTAViM6dMcgXR687Ay5p1treq_4OzFAZIZjKhwqX.unL4GocjwKEXVZBzzhllVQgDouHdErMWn3uiVTJ6Nuy9HSXjyauMwKpZgNkJSeeC_8PZ8Cv1LL8aN3sYp7yPCaZNy15RE5QFU8_SBRv5Zf8zI1zFBm1BVaL8BX.4qyfaSYUzK2dlWcbOI2e3DDT_aHL9bKob3PHDRDHKfAQbPG0zhxR1CvrQkQY7SZqbfSVO7SXmsBB8w8QzGB.ReXymK6TU2kPKrJuttIILvy7lGKa9pf4WyqhaC2EwlCK3_q82ih_MjZvVKykrBkJrxCIvvOkvX0qz1.d8liE.7nR8BU1tPBNBO0WwJsNKYwCZzRqAynhxH6VzBPQc6E16cTdBJngOjq1VE3UMuSO6QwrFduLYS6jK965OvIAAdfnchidzZvBWqhkmE1.uAkPYqsjCpCwhsYev0ccXOKR1HUjsmAya6SdUE9Q.VXku3FgGCAoo4ZEX0YNtpbkXzcQTsD.ez60TeCWLLx2YFxBcN7BrsYNqXICCZV2zINsQ-
    [oauth_token_secret] => 0b9ac15c3802c52a52a66693dea6622ed593b055
    [oauth_expires_in] => 3600
    [oauth_session_handle] => ALLhzk0yDv0_Of3wY2y13cAWqZMLxSByz9fIcmJ0vs51tsYhgwc-
    [oauth_authorization_expires_in] => 842076383
    [xoauth_yahoo_guid] => 7YMYEOYBAMPT2K3JMHCV7NBOLE
)
*/

// Get the access token using HTTP GET and HMAC-SHA1 signature
$retarr = get_access_token(OAUTH_CONSUMER_KEY, OAUTH_CONSUMER_SECRET,
                           $request_token, $request_token_secret,
                           $oauth_verifier, false, true, true);

if (! empty($retarr)) {
  list($info, $headers, $body, $body_parsed) = $retarr;
  if ($info['http_code'] == 200 && !empty($body)) {
    /*print "Use oauth_token as the token for all of your API calls:\n" .
          rfc3986_decode($body_parsed['oauth_token']) . "\n";*/
	$_SESSION["guid"] = $body_parsed['xoauth_yahoo_guid'];
	$_SESSION["access_token"] = rfc3986_decode($body_parsed['oauth_token']);
	$_SESSION["access_token_secret"] = $body_parsed['oauth_token_secret'];
	include_once Settings::getVar('ROOT')."plugins/sendtoafriend/classes/yahoo_OAuth/callcontact.php";
  }
}

//exit(0);

/**
 * Get an access token using a request token and OAuth Verifier.
 * @param string $consumer_key obtained when you registered your app
 * @param string $consumer_secret obtained when you registered your app
 * @param string $request_token obtained from getreqtok
 * @param string $request_token_secret obtained from getreqtok
 * @param string $oauth_verifier obtained from step 3
 * @param bool $usePost use HTTP POST instead of GET
 * @param bool $useHmacSha1Sig use HMAC-SHA1 signature
 * @param bool $passOAuthInHeader pass OAuth credentials in HTTP header
 * @return array of response parameters or empty array on error
 */
function get_access_token($consumer_key, $consumer_secret, $request_token, $request_token_secret, $oauth_verifier, $usePost=false, $useHmacSha1Sig=true, $passOAuthInHeader=true)
{
  $retarr = array();  // return value
  $response = array();

  $url = 'https://api.login.yahoo.com/oauth/v2/get_token';
  $params['oauth_version'] = '1.0';
  $params['oauth_nonce'] = mt_rand();
  $params['oauth_timestamp'] = time();
  $params['oauth_consumer_key'] = $consumer_key;
  $params['oauth_token']= $request_token;
  $params['oauth_verifier'] = $oauth_verifier;

  // compute signature and add it to the params list
  if ($useHmacSha1Sig) {
    $params['oauth_signature_method'] = 'HMAC-SHA1';
    $params['oauth_signature'] =
      oauth_compute_hmac_sig($usePost? 'POST' : 'GET', $url, $params,
                             $consumer_secret, $request_token_secret);
  } else {
    $params['oauth_signature_method'] = 'PLAINTEXT';
    $params['oauth_signature'] =
      oauth_compute_plaintext_sig($consumer_secret, $request_token_secret);
  }

  // Pass OAuth credentials in a separate header or in the query string
  if ($passOAuthInHeader) {
    $query_parameter_string = oauth_http_build_query($params, false);
    $header = build_oauth_header($params, "yahooapis.com");
    $headers[] = $header;
  } else {
    $query_parameter_string = oauth_http_build_query($params);
  }

  // POST or GET the request
  if ($usePost) {
    $request_url = $url;
    logit("getacctok:INFO:request_url:$request_url");
    logit("getacctok:INFO:post_body:$query_parameter_string");
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $response = do_post($request_url, $query_parameter_string, 443, $headers);
  } else {
    $request_url = $url . ($query_parameter_string ?
                           ('?' . $query_parameter_string) : '' );
    logit("getacctok:INFO:request_url:$request_url");
    $response = do_get($request_url, 443, $headers);
  }

  // extract successful response
  if (! empty($response)) {
    list($info, $header, $body) = $response;
    $body_parsed = oauth_parse_str($body);
    if (! empty($body_parsed)) {
      logit("getacctok:INFO:response_body_parsed:");
      //print_r($body_parsed);
    }
    $retarr = $response;
    $retarr[] = $body_parsed;
  }

  return $retarr;
}
?>
