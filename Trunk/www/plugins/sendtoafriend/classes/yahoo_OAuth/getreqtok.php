<?php
require 'globals.php';
require 'oauth_helper.php';

// Callback can either be 'oob' or a url whose domain must match
// the domain that you entered when registering your application

//$callback = Settings::getVar('ROOT')."plugins/sendtoafriend/yahoo_callback.php";
$callback = "http://public-storm.internetcollaboratif.info/sendtoafriend/yahoo_callback.php";


// Get the request token using HTTP GET and HMAC-SHA1 signature
$retarr = get_request_token(OAUTH_CONSUMER_KEY, OAUTH_CONSUMER_SECRET, $callback, false, true, true);

/*
    [oauth_token] => hybhwjz
    [oauth_token_secret] => 18753060b7c94ae3372f6e60df7f83409cf1f1c8
    [oauth_expires_in] => 3600
    [xoauth_request_auth_url] => https%3A%2F%2Fapi.login.yahoo.com%2Foauth%2Fv2%2Frequest_auth%3Foauth_token%3Dhybhwjz
    [oauth_callback_confirmed] => true
*/


if (! empty($retarr)){
  list($info, $headers, $body, $body_parsed) = $retarr;
  if ($info['http_code'] == 200 && !empty($body)) {
    /*print "Have the user go to xoauth_request_auth_url to authorize your app\n" .
          rfc3986_decode($body_parsed['xoauth_request_auth_url']) . "\n";*/
          
	$_SESSION["oauth_request_token"] = $body_parsed['oauth_token'];
	$_SESSION["oauth_token_secret"] = $body_parsed['oauth_token_secret'];
	//print_r($_SESSION);
	
	header("refresh:0;url=".rfc3986_decode($body_parsed['xoauth_request_auth_url']), true, 200); 
	header("Location: ". rfc3986_decode($body_parsed['xoauth_request_auth_url']), true, 200);
  }
}

exit(0);

/**
 * Get a request token.
 * @param string $consumer_key obtained when you registered your app
 * @param string $consumer_secret obtained when you registered your app
 * @param string $callback callback url can be the string 'oob'
 * @param bool $usePost use HTTP POST instead of GET
 * @param bool $useHmacSha1Sig use HMAC-SHA1 signature
 * @param bool $passOAuthInHeader pass OAuth credentials in HTTP header
 * @return array of response parameters or empty array on error
 */
function get_request_token($consumer_key, $consumer_secret, $callback, $usePost=false, $useHmacSha1Sig=true, $passOAuthInHeader=false)
{
  $retarr = array();  // return value
  $response = array();

  $url = 'https://api.login.yahoo.com/oauth/v2/get_request_token';
  $params['oauth_version'] = '1.0';
  $params['oauth_nonce'] = mt_rand();
  $params['oauth_timestamp'] = time();
  $params['oauth_consumer_key'] = $consumer_key;
  $params['oauth_callback'] = $callback;

  // compute signature and add it to the params list
  if ($useHmacSha1Sig) {
    $params['oauth_signature_method'] = 'HMAC-SHA1';
    $params['oauth_signature'] =
      oauth_compute_hmac_sig($usePost? 'POST' : 'GET', $url, $params,
                             $consumer_secret, null);
  } else {
    $params['oauth_signature_method'] = 'PLAINTEXT';
    $params['oauth_signature'] =
      oauth_compute_plaintext_sig($consumer_secret, null);
  }

  // Pass OAuth credentials in a separate header or in the query string
  if ($passOAuthInHeader) {
      
    $query_parameter_string = oauth_http_build_query($params, FALSE);
    
    $header = build_oauth_header($params, "yahooapis.com");
    $headers[] = $header;
  } else {
    $query_parameter_string = oauth_http_build_query($params);
  }
 
  // POST or GET the request
  if ($usePost) {
    $request_url = $url;
    logit("getreqtok:INFO:request_url:$request_url");
    logit("getreqtok:INFO:post_body:$query_parameter_string");
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $response = do_post($request_url, $query_parameter_string, 443, $headers);
  } else {
    $request_url = $url . ($query_parameter_string ?
                           ('?' . $query_parameter_string) : '' );
     
    logit("getreqtok:INFO:request_url:$request_url");
    
    $response = do_get($request_url, 443, $headers);
    
  }
  
  // extract successful response
  if (! empty($response)) {
    list($info, $header, $body) = $response;
    $body_parsed = oauth_parse_str($body);
    if (! empty($body_parsed)) {
      logit("getreqtok:INFO:response_body_parsed:");
      //print_r($body_parsed);
    }
    $retarr = $response;
    $retarr[] = $body_parsed;
  }

  return $retarr;
}
?>
