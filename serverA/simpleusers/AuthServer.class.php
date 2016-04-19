<?php
class AuthServer {
	// 1.create a token
	// 2.create a link
	// 3.exist or not, save the token to token table
	// 4.exist or not,join user table and token table by uid and tid in usertoken table
	// 5.
	private $token, $name, $age, $gender, $mode, $url, $openIdUrl, $tokenUrl;
	const link = "http://localhost/APIDemo/LinkInApplication/connectAPI.php?";
	const linkFirst = "http://localhost/APIDemo/LinkInApplication/connectInterface.php?";
	private $openId = array (
			"app1" => "Linkin",
			"app2" => "Hotmail" 
	);
	function __construct($token = null, $url = null) {
		$this->token = $token;
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
		// if (isset ( $this->token ))
		// return;
		$this->token = base_convert ( md5 ( uniqid ( rand (), true ) ), 16, 36 );
		// save to session
		//session_start ();
		$_SESSION ["token"] = $this->token;
		return $this->token;
	}
	
	/**
	 * Generate link
	 */
	function generateUrl() {
		$this->url = self::linkFirst ."token=". $this->generateToken ();
		return $this->url;
	}
	
	/**
	 * Clear token
	 */
	function clearToken() {
		$this->token = null;
	}
	
	// /**
	// * Save token to token table
	// */
	// function saveToken() {
	// $this->token = null;
	// }
	function checkOpenId($value) {
		foreach ($this->openId as $key=>$openIdValue)
		{
			if ($value==$openIdValue)
			{
				return true;
				break;
			}
		}
		return false;
	}
}
?>