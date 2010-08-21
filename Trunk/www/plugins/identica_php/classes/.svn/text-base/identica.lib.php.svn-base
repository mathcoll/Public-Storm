<?php
/**
 * Copyright (c) <2009> Gianluca Urgese <g.urgese@jasone.it>
 *
 * Permission is hereby granted, free of charge, to any person
 * obtaining a copy of this software and associated documentation
 * files (the "Software"), to deal in the Software without
 * restriction, including without limitation the rights to use,
 * copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following
 * conditions:
 * 
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 */


/**
* The main identica-php class. Create an object to use your Identi.ca account from php. 
*/ 
class Identica {
	/** Username:password format string */
	private $credentials;
	
	/** Contains the last HTTP status code returned */
	private $http_status;
	
	/** Contains the last API call */
	private $last_api_call;
	
	/** Contains the application calling the API */
	private $application_source;

	/** 
    * Identi.ca class constructor. 
    * @param username is a alphanumeric string to perform login on Identi.ca. 
    * @param password is a alphanumeric string to perform login on Identi.ca. 
    * @param source is the name of your application. 
    * @return An Identica object to use to perform all the operation.
    */ 
	function Identica($username, $password, $source=false) {
		$this->credentials = sprintf("%s:%s", $username, $password);
		$this->application_source = $source;
	}
	
	/** 
    * Returns the 20 most recent statuses from non-protected users who have set a custom user icon. 
    * @param format is the extension for the result file (xml, json, rss, atom). 
    * @param since_id returns only statuses with an ID greater than (that is, more recent than) the specified ID.  
    * @return the public timeline in the specified format.
    */
	function getPublicTimeline($format, $since_id = 0) {
		$api_call = sprintf("http://identi.ca/api/statuses/public_timeline.%s", $format);
		if ($since_id > 0) {
			$api_call .= sprintf("?since_id=%d", $since_id);
		}
		return $this->APICall($api_call);
	}
	
	/** 
    * Returns the 20 most recent statuses posted by the authenticating user and that user's friends. 
    * @param format is the extension for the result file (xml, json, rss, atom). 
    * @param id returns only statuses from specified ID.
    * @param since returns only statuses with an ID greater than (that is, more recent than) the specified ID.  
    * @return the friends timeline in the specified format.
    */
	function getFriendsTimeline($format, $id = NULL, $since = NULL) {
		if ($id != NULL) {
			$api_call = sprintf("http://identi.ca/api/statuses/friends_timeline/%s.%s", $id, $format);
		}
		else {
			$api_call = sprintf("http://identi.ca/api/statuses/friends_timeline.%s", $format);
		}
		if ($since != NULL) {
			$api_call .= sprintf("?since=%s", urlencode($since));
		}
		return $this->APICall($api_call, true);
	}
	
	/** 
    * Returns the 20 most recent statuses posted from the authenticating user. 
    * @param format is the extension for the result file (xml, json, rss, atom). 
    * @param id get only statuses from specified ID.
    * @param count specifies the number of statuses to retrieve. May not be greater than 200.
    * @param since get only statuses with an ID greater than (that is, more recent than) the specified ID.  
    * @return the 20 most recent statuses posted from the authenticating user.
    */
	function getUserTimeline($format, $id = NULL, $count = 20, $since = NULL) {
		if ($id != NULL) {
			$api_call = sprintf("http://identi.ca/api/statuses/user_timeline/%s.%s", $id, $format);
		}
		else {
			$api_call = sprintf("http://identi.ca/api/statuses/user_timeline.%s", $format);
		}
		if ($count != 20) {
			$api_call .= sprintf("?count=%d", $count);
		}
		if ($since != NULL) {
			$api_call .= sprintf("%ssince=%s", (strpos($api_call, "?count=") === false) ? "?" : "&", urlencode($since));
		}
		return $this->APICall($api_call, true);
	}
	
	/** 
    * Returns a single status, specified by the id parameter below. The status's author will be returned inline. 
    * @param format is the extension for the result file (xml, json, rss, atom). 
    * @param id get only statuses from specified ID.
    * @return a single status, specified by the id parameter.
    */
	function showStatus($format, $id) {
		$api_call = sprintf("http://identi.ca/api/statuses/show/%d.%s", $id, $format);
		return $this->APICall($api_call);
	}
	
	/** 
    * Updates the authenticating user's status. Request must be a POST. Statuses over 140 characters will be forceably truncated.
    * @param status is the text of your status update. 
    * @return the current update from authenticating user.
    */
	function updateStatus($status) {
		$status = urlencode(stripslashes(urldecode($status)));
		$api_call = sprintf("http://identi.ca/api/statuses/update.xml?status=%s", $status);
		return $this->APICall($api_call, true, true);
	}
	
	/** 
    * Returns a list of replies from authenticating user. 
    * @param format is the extension for the result file (xml, json, rss, atom). 
    * @param page specifies the page of results to retrieve.
    * @return list of replies from authenticating user.
    */
	function getReplies($format, $page = 0) {
		$api_call = sprintf("http://identi.ca/api/statuses/replies.%s", $format);
		if ($page) {
			$api_call .= sprintf("?page=%d", $page);
		}
		return $this->APICall($api_call, true);
	}
	
	/** 
    * Destroys the status specified by the required ID parameter. The authenticating user must be the author of the specified status. 
    * @param format is the extension for the result file (xml, json, rss, atom). 
    * @param id the ID of the status to destroy.
    * @return a destroyed status specified by the id parameter.
    */
	function destroyStatus($format, $id) {
		$api_call = sprintf("http://identi.ca/api/statuses/destroy/%d.%s", $id, $format);
		return $this->APICall($api_call, true, true);
	}
	
	/** 
    * Returns a user's friends, each with current status inline. They are ordered by the order in which 
    * they were added as friends, 100 at a time. Use the page option to access older friends. With no 
    * user specified, request defaults to the authenticated user's friends. 
    * @param format is the extension for the result file (xml, json, rss, atom). 
    * @param id is the ID of the user for whom to request a list of friends.
    * @return a user's friends.
    */
	function getFriends($format, $id = NULL) {
		if ($id != NULL) {
			$api_call = sprintf("http://identi.ca/api/statuses/friends/%s.%s", $id, $format);
		}
		else {
			$api_call = sprintf("http://identi.ca/api/statuses/friends.%s", $format);
		}
		return $this->APICall($api_call, true);
	}
	
	/** 
    * Returns a user's followers. They are ordered by the order in which they joined Identi.ca, 100 at a time.   
    * @param format is the extension for the result file (xml, json, rss, atom). 
    * @param lite specified if status must be show.
    * @return a user's followers.
    */
	function getFollowers($format, $lite = NULL) {
		$api_call = sprintf("http://identi.ca/api/statuses/followers.%s%s", $format, ($lite) ? "?lite=true" : NULL);
		return $this->APICall($api_call, true);
	}
	
	/** 
    * Returns extended information of a given user, specified by ID or email as per the required id parameter.  
    * @param format is the extension for the result file (xml, json). 
    * @param id is the ID of specified user.
    * @param email is the email of specified user.
    * @return extended information of a given user.
    */
	function showUser($format, $id, $email = NULL) {
		if ($email == NULL) {
			$api_call = sprintf("http://identi.ca/api/users/show/%s.%s", $id, $format);
		}
		else {
			$api_call = sprintf("http://identi.ca/api/users/show.xml?email=%s", $email);
		}
		return $this->APICall($api_call, true);
	}
	
	/** 
    * Returns a list of the 20 most recent direct messages sent to the authenticating user. The XML 
    * and JSON versions include detailed information about the sending and recipient users. 
    * @param format is the extension for the result file (xml, json, rss, atom). 
    * @param since get only messages from an ID greater than (that is, more recent than) the specified ID.
    * @param since_id returns only statuses from the specified ID.
    * @param page Specifies the page of direct messages to retrieve.  
    * @return a list of the 20 most recent direct messages.
    */
	function getMessages($format, $since = NULL, $since_id = 0, $page = 1) {
		$api_call = sprintf("http://identi.ca/api/direct_messages.%s", $format);
		if ($since != NULL) {
			$api_call .= sprintf("?since=%s", urlencode($since));
		}
		if ($since_id > 0) {
			$api_call .= sprintf("%ssince_id=%d", (strpos($api_call, "?since") === false) ? "?" : "&", $since_id);
		}
		if ($page > 1) {
			$api_call .= sprintf("%spage=%d", (strpos($api_call, "?since") === false) ? "?" : "&", $page);
		}
		return $this->APICall($api_call, true);
	}
	
	/** 
    * Returns a list of the 20 most recent direct messages sent by the authenticating user. The XML 
    * and JSON versions include detailed information about the sending and recipient users. 
    * @param format is the extension for the result file (xml, json, rss, atom). 
    * @param since get only messages from an ID greater than (that is, more recent than) the specified ID.
    * @param since_id returns only statuses from the specified ID.
    * @param page specifies the page of direct messages to retrieve.  
    * @return a list of the 20 most recent sent direct messages.
    */
	function getSentMessages($format, $since = NULL, $since_id = 0, $page = 1) {
		$api_call = sprintf("http://identi.ca/api/direct_messages/sent.%s", $format);
		if ($since != NULL) {
			$api_call .= sprintf("?since=%s", urlencode($since));
		}
		if ($since_id > 0) {
			$api_call .= sprintf("%ssince_id=%d", (strpos($api_call, "?since") === false) ? "?" : "&", $since_id);
		}
		if ($page > 1) {
			$api_call .= sprintf("%spage=%d", (strpos($api_call, "?since") === false) ? "?" : "&", $page);
		}
		return $this->APICall($api_call, true);
	}
	
	/** 
    * Sends a new direct message to the specified user from the authenticating user. Request must be a POST.  
    * @param format is the extension for the result file (xml, json). 
    * @param user is the ID of specified user to send the message.
    * @param text is the text of your direct message.
    * @return the sent message in the requested format when successful.
    */
	function newMessage($format, $user, $text) {
		$text = urlencode(stripslashes(urldecode($text)));
		$api_call = sprintf("http://identi.ca/api/direct_messages/new.%s?user=%s&text=%s", $format, $user, $text);
		return $this->APICall($api_call, true, true);
	}
	
	/** 
    * Destroys the direct message specified in the required ID parameter. The authenticating user 
    * must be the recipient of the specified direct message.  
    * @param format is the extension for the result file (xml, json). 
    * @param id is the ID of specified direct message.
    * @return the message destroyed.
    */
	function destroyMessage($format, $id) {
		$api_call = sprintf("http://identi.ca/api/direct_messages/destroy/%s.%s", $id, $format);
		return $this->APICall($api_call, true, true);
	}
	
	/** 
    * Allows the authenticating users to follow the user specified in the ID parameter.   
    * @param format is the extension for the result file (xml, json). 
    * @param id is the ID of specified user.
    * @return the befriended user in the requested format when successful. Returns a string describing the 
    * failure condition when unsuccessful. If you are already friends with the user an HTTP 403 will be returned.
    */
	function createFriendship($format, $id) {
		$api_call = sprintf("http://identi.ca/api/friendships/create/%s.%s", $id, $format);
		return $this->APICall($api_call, true, true);
	}
	
	/** 
    * Allows the authenticating users to unfollow the user specified in the ID parameter.   
    * @param format is the extension for the result file (xml, json). 
    * @param id is the ID of specified user.
    * @return the unfollowed user in the requested format when successful. Returns a string 
    * describing the failure condition when unsuccessful.
    */
	function destroyFriendship($format, $id) {
		$api_call = sprintf("http://identi.ca/api/friendships/destroy/%s.%s", $id, $format);
		return $this->APICall($api_call, true, true);
	}
	
	/** 
    * Tests for the existence of friendship between two users.   
    * @param format is the extension for the result file (xml, json). 
    * @param user_a is the ID of the first specified user.
    * @param user_b is the ID of the second specified user.
    * @return true if user_a follows user_b, otherwise will return false.
    */
	function friendshipExists($format, $user_a, $user_b) {
		$api_call = sprintf("http://identi.ca/api/friendships/exists.%s?user_a=%s&user_b=%s", $format, $user_a, $user_b);
		return $this->APICall($api_call, true);
	}
	
	/** 
    * Tests if supplied user credentials are valid.   
    * @param format is the extension for the result file (xml, json). 
    * @return an HTTP 200 OK response code and a representation of the requesting user if authentication 
    * was successful; returns a 401 status code and an error message if not.
    */
	function verifyCredentials($format = NULL) {
		$api_call = sprintf("http://identi.ca/api/account/verify_credentials%s", ($format != NULL) ? sprintf(".%s", $format) : NULL);
		return $this->APICall($api_call, true);
	}
	
	/** 
    * Ends the session of the authenticating user, returning a null cookie.    
    * @return NULL
    */
	function endSession() {
		$api_call = "http://identi.ca/api/account/end_session";
		return $this->APICall($api_call, true);
	}
	
	/** 
    * Update user's location in the profile.   
    * @param location is the user's location . 
    * @return NULL.
    */
	function updateLocation($format, $location) {
		$api_call = sprintf("http://identi.ca/api/account/update_location.%s?location=%s", $format, $location);
		return $this->APICall($api_call, true, true);
	}
	
	/** 
    * Sets which device Identi.ca delivers updates to for the authenticating user.   
    * @param format is the extension for the result file (xml, json). 
    * @param device must be one of: sms, im, none.
    * @return user's profile details in a selected format.
    */
	function updateDeliveryDevice($format, $device) {
		$api_call = sprintf("http://identi.ca/api/account/update_delivery_device.%s?device=%s", $format, $device);
		return $this->APICall($api_call, true, true);
	}
	
	/** 
    * Returns the remaining number of API requests available to the requesting user before the API 
    * limit is reached for the current hour. Calls to rateLimitStatus() do not count against the rate limit.  
    * @param format is the extension for the result file (xml, json). 
    * @return remaining number of API requests.
    */
	function rateLimitStatus($format) {
		$api_call = sprintf("http://identi.ca/api/account/rate_limit_status.%s", $format);
		return $this->APICall($api_call, true);
	}
	
	/** 
    * Returns the 20 most recent favorite statuses for the authenticating user or user 
    * specified by the ID parameter in the requested format.
    * @param format is the extension for the result file (xml, json, rss, atom). 
    * @param id is the ID of specified user.
    * @param page specifies the page of favorites to retrieve.  
    * @return a list of the 20 most recent favorite statuses.
    */
	function getFavorites($format, $id = NULL, $page = 1) {
		if ($id == NULL) {
			$api_call = sprintf("http://identi.ca/api/favorites.%s", $format);
		}
		else {
			$api_call = sprintf("http://identi.ca/api/favorites/%s.%s", $id, $format);
		}
		if ($page > 1) {
			$api_call .= sprintf("?page=%d", $page);
		}
		return $this->APICall($api_call, true);
	}
	
	/** 
    * Favorites the status specified in the ID parameter as the authenticating user. 
    * @param format is the extension for the result file (xml, json). 
    * @param id is the ID of specified user.  
    * @return the favorite status when successful.
    */
	function createFavorite($format, $id) {
		$api_call = sprintf("http://identi.ca/api/favorites/create/%d.%s", $id, $format);
		return $this->APICall($api_call, true, true);
	}
	
	/** 
    * Un-favorites the status specified in the ID parameter as the authenticating user. 
    * @param format is the extension for the result file (xml, json). 
    * @param id is the ID of specified user.  
    * @return the un-favorited status in the requested format when successful.
    */
	function destroyFavorite($format, $id) {
		$api_call = sprintf("http://identi.ca/api/favorites/destroy/%d.%s", $id, $format);
		return $this->APICall($api_call, true, true);
	}
	
	/** 
    * Enables device notifications for updates from the specified user. 
    * @param format is the extension for the result file (xml, json). 
    * @param id is the ID of specified user.  
    * @return the specified user when successful.
    */
	function follow($format, $id) {
		$api_call = sprintf("http://identi.ca/api/notifications/follow/%d.%s", $id, $format);
		return $this->APICall($api_call, true, true);
	}
	
	/** 
    * Disables notifications for updates from the specified user to the authenticating user. 
    * @param format is the extension for the result file (xml, json). 
    * @param id is the ID of specified user.  
    * @return the specified user when successful.
    */
	function leave($format, $id) {
		$api_call = sprintf("http://identi.ca/api/notifications/leave/%d.%s", $id, $format);
		return $this->APICall($api_call, true, true);
	}
	
	/** 
    * Blocks the user specified in the ID parameter as the authenticating user. Destroys a friendship to the blocked user if it exists. 
    * @param format is the extension for the result file (xml, json). 
    * @param id is the ID of specified user.  
    * @return the blocked user in the requested format when successful.
    */
	function createBlock($format, $id) {
		$api_call = sprintf("http://identi.ca/api/blocks/create/%d.%s", $id, $format);
		return $this->APICall($api_call, true, true);
	}
	
	/** 
    * Un-blocks the user specified in the ID parameter for the authenticating user. 
    * @param format is the extension for the result file (xml, json). 
    * @param id is the ID of specified user.  
    * @return the un-blocked user in the requested format when successful.
    */
	function destroyBlock($format, $id) {
		$api_call = sprintf("http://identi.ca/api/blocks/destroy/%d.%s", $id, $format);
		return $this->APICall($api_call, true, true);
	}
	
	/** 
    * Returns true or false in the requested format with a 200 OK HTTP status code. 
    * @param format is the extension for the result file (xml, json).   
    * @return test results.
    */
	function test($format) {
		$api_call = sprintf("http://identi.ca/api/help/test.%s", $format);
		return $this->APICall($api_call, true);
	}
	
	private function APICall($api_url, $require_credentials = false, $http_post = false) {
		$curl_handle = curl_init();
		if($this->application_source){
			$api_url .= "&source=" . $this->application_source;
		}
		curl_setopt($curl_handle, CURLOPT_URL, $api_url);
		if ($require_credentials) {
			curl_setopt($curl_handle, CURLOPT_USERPWD, $this->credentials);
		}
		if ($http_post) {
			curl_setopt($curl_handle, CURLOPT_POST, true);
		}
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, TRUE);
		$identica_data = curl_exec($curl_handle);
		$this->http_status = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);
		$this->last_api_call = $api_url;
		curl_close($curl_handle);
		return $identica_data;
	}
	
	function lastStatusCode() {
		return $this->http_status;
	}
	
	function lastAPICall() {
		return $this->last_api_call;
	}
}
?>
