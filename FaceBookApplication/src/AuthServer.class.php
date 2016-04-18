<?php
class AuthServer {
	// 1.create a token
	// 2.create a link
	// 3.exist or not, save the token to token table
	// 4.exist or not,join user table and token table by uid and tid in usertoken table
	// 5.
	private $token, $name, $age, $gender, $mode, $url, $openIdUrl, $tokenUrl;
	private $openId = array (
			"app1" => "linkin",
			"app2" => "hotmail" 
	);
	function __construct($token = null, $mode = null, $url = null) {
		$this->openId = $openId;
		$this->token = $token;
		$this->name = $name;
		$this->url = $url;
	}
	
	/**
	 * get the openid from the other app
	 */
	function getOpenIdUrl() {
		if (isset ( $_GET ["openId"] )) {
			$this->openIdUrl = $_GET ["openId"];
		}
	}
	
	/**
	 * get the token from the other app
	 */
	function getTokenUrl() {
		if (isset ( $_GET ["token"] )) {
			$this->$tokenUrl = $_GET ["$token"];
		}
	}
	function getToken() {
		return $this->token;
	}
	function setToken($value) {
		$this->token = $value;
	}
	
	/**
	 * Generate token
	 */
	function generateToken() {
		if (isset ( $this->token ))
			return;
		$this->token = base_convert ( md5 ( uniqid ( rand (), true ) ), 16, 36 );
	}
	
	/**
	 * Clear token
	 */
	function clearToken() {
		$this->token = null;
	}
	
// 	/**
// 	 * Save token to token table
// 	 */
// 	function saveToken() {
// 		$this->token = null;
// 	}
}
?>