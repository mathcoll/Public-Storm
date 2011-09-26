<?php

// Retrieve the current page URL
function curPageURL() {
        $pageURL = 'http';
        if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";

        $pageURL .= $_SERVER["SERVER_NAME"];
        if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= ":".$_SERVER["SERVER_PORT"];
        }
        $pageURL .= $_SERVER["SCRIPT_NAME"];

        return $pageURL;
}

// Make HTTP calls (for API and for direct URLs)
function _http($method, $path, $params = null, $uri = null) {
    global $opts, $access_token, $api_base;

    if (!$params) {
        $params = array();
    }

    $opt = $opts;
    $opt[CURLOPT_URL] = ($uri) ? $uri : $api_base.$path.'?access_token='.$access_token;
    if ($method != 'GET') {
        $headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
        $opt[CURLOPT_HTTPHEADER] = $headers;
        $opt[CURLOPT_POSTFIELDS] = http_build_query($params, NULL, '&');
        $opt[CURLOPT_CUSTOMREQUEST] = $method;
    } else {
        $opt[CURLOPT_URL] .= '&' . http_build_query($params, NULL, '&');
    }

    $ch = curl_init();
    curl_setopt_array($ch, $opt);
    $result = curl_exec($ch);
    list($headers, $body) = explode("\r\n\r\n", $result);
    $result = json_decode($body);
    curl_close($ch);

    if (isset($result->error)) {
        echo "An error occured : " . print_r($result->error, true);
        return false;
    }

    return $result;
}


function make_requests() {
    html_start();

    // ME
    $me = _http('GET', '/me');
    echo "<b>me</b>: <br>";
    print_me($me);

    // MY INTERESTS
    echo "<br><b>my interests</b>: ";
    print $me->interests."<br>";

    // CHANGE MY INTERESTS
    if (!strpos($me->interests, 'Viadeo API')) {
        echo '<br><b>Viadeo API is not one of my interests, lets modify them..</b><br>';
        _http('PUT', '/me', array('interests' => $me->interests . ", Viadeo API"));
        echo "<br><b>my new interests</b>: ";
        $me = _http('GET', '/me');
        print $me->interests."<br>";
    } else {
        echo "<br><b>Viadeo API is already one of my interests</b><br>";
    }

    // LIST MY CONTACTS
    echo "<br><b>my contacts (2 pages of 3 results)</b>: <br>";
    $contacts = _http('GET', '/me/contacts', array('limit' => 3, 'user_detail' => 'partial'));
    $nb = 1; $maxPages = 2;
    do {
        echo "----- page $nb -----<br>";
        foreach ($contacts->data as $contact) {
            print_contact($contact);
        }
        $nb++;
    } while ((--$maxPages > 0)
       && (strlen($contacts->paging->next) > 0)
       && ($contacts = _http('GET', null, null, $contacts->paging->next)));

    // POST STATUS
    echo "<br><br>Say to my contacts i'm consulting them..<br>";
    _http('POST', '/status', array('message' => "I'm consulting the list of my contacts.."));

    html_end();
}
