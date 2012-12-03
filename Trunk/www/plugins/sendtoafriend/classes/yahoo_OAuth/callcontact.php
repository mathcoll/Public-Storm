<?php
//require 'globals.php';
//require 'oauth_helper.php';

// Fill in the next 3 variables.
/*
$guid='SRT7CF7XGV34GXFSNCALUW4NVI';
$access_token='A=6kjrBVXtuhMr0RPlNdApccK5jNWago6RWYAkMBc4Bl3Kvb8r5dcAxkLHJrVKG05wMFz0DvNUikSmW3y0A9jAeLJ1aPKIJGyF3lM_v_WwudBw3J9YUseHgvY2ZRAc.8ix_XPdWh3cxRvOJKzM3hhveria5Kqr9hCb02I1wC4INYI5iybL06QOcXsQ0mrpRFB1vsCX5LEfGT0zpxmr0Yaf7m1UYKVfL6XffmgKhLuHZhgizIXRfUnasoLnE6kLN2dB75wvY_KPk5KIHkIxyEZxWQIrKzUYpKvh7isXwGxrhhO3pd.nVSc1n8DO0hO11Yp1g5Ym866ggzTONgCZgFlK0OOb3RSWTbN_DakA62fhI9S.8E52.Z7tc9dfdpDCwP0ADn_81ViMxxrmlb7xaNr050aOIzEj5E9xuabHw_JRPq5PunaXdSm_6OF4uH5mlRVMBMK7BGdGp0NZ0z_HLhHiDiGnqMz2DWmNPb0yC4_XgAPCqPAooKrt4sDOTzzGU86MX_pnr8YT.jwXKNLFtQkmSLD.cl_XF6ZB2IYi.t9.YKX.cCUfPNdKWQIklXS6Tuf2WZNg2TMhmsdD.t6QKwWZPdOIXrBL8EmkOiqviramaTxEqLTyLYmQrih.F_swrlELWPFkknJP1DDGGHDRWQtpUYdeFSRgrAtuWBlnLrmm5umz9mDSvjgejujn89eeXXc.N3lFBS4IiLJC44uYBNcT2xmoBfUz6_qUylCijbJtdg--';
$access_token_secret='8b9f4b4250115351ab6c0fb6253043a01f122222';
*/

$guid = $_SESSION["guid"];
$access_token = $_SESSION["access_token"];
$access_token_secret = $_SESSION["access_token_secret"];

// Call Contact API
$retarr = callcontact(OAUTH_CONSUMER_KEY, OAUTH_CONSUMER_SECRET,
                      $guid, $access_token, $access_token_secret,
                      false, true);
//exit(0);

/**
 * Call the Yahoo Contact API
 * @param string $consumer_key obtained when you registered your app
 * @param string $consumer_secret obtained when you registered your app
 * @param string $guid obtained from getacctok
 * @param string $access_token obtained from getacctok
 * @param string $access_token_secret obtained from getacctok
 * @param bool $usePost use HTTP POST instead of GET
 * @param bool $passOAuthInHeader pass the OAuth credentials in HTTP header
 * @return response string with token or empty array on error
 */
function callcontact($consumer_key, $consumer_secret, $guid, $access_token, $access_token_secret, $usePost=false, $passOAuthInHeader=true)
{
  $retarr = array();  // return value
  $response = array();

  $url = 'http://social.yahooapis.com/v1/user/' . $guid . '/contacts;count=150';

  $params['format'] = 'json';
  $params['view'] = 'compact';
  $params['oauth_version'] = '1.0';
  $params['oauth_nonce'] = mt_rand();
  $params['oauth_timestamp'] = time();
  $params['oauth_consumer_key'] = $consumer_key;
  $params['oauth_token'] = $access_token;

  // compute hmac-sha1 signature and add it to the params list
  $params['oauth_signature_method'] = 'HMAC-SHA1';
  $params['oauth_signature'] =
      oauth_compute_hmac_sig($usePost? 'POST' : 'GET', $url, $params,
                             $consumer_secret, $access_token_secret);

  // Pass OAuth credentials in a separate header or in the query string
  if ($passOAuthInHeader) {
    $query_parameter_string = oauth_http_build_query($params, true);
    $header = build_oauth_header($params, "yahooapis.com");
    $headers[] = $header;
  } else {
    $query_parameter_string = oauth_http_build_query($params);
  }

  // POST or GET the request
  if ($usePost) {
    $request_url = $url;
    logit("callcontact:INFO:request_url:$request_url");
    logit("callcontact:INFO:post_body:$query_parameter_string");
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $response = do_post($request_url, $query_parameter_string, 80, $headers);
  } else {
    $request_url = $url . ($query_parameter_string ?
                           ('?' . $query_parameter_string) : '' );
    logit("callcontact:INFO:request_url:$request_url");
    $response = do_get($request_url, 80, $headers);
  }

  // extract successful response
  if (! empty($response)) {
    list($info, $header, $body) = $response;
    if ($body) {
      logit("callcontact:INFO:response:");
      //print(json_pretty_print($body));
      $_SESSION["json"] = json_pretty_print($body);
    }
    $retarr = $response;
  }

  return $retarr;
}
?>
