<?php
class readAPI {

	private $token, $name, $age, $gender, $mode, $url, $openIdUrl,$tokenUrl;
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
	
	/**
	 * Generate token
	 */
	function generateToken() {
		if (isset ( $this->token ))
			return;
		$this->token = base_convert ( md5 ( uniqid ( rand (), true ) ), 16, 36 );
	}
}

?>