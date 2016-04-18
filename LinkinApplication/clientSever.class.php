<?php
	session_start();
	require_once(dirname(__FILE__)."/simpleusers/su.inc.php");

	class clientServer{
		
		private $token,$url,$error;
		
		function __construct() {}
		
		function getToken() { return $this->token;}
		function setToken($token) { $this->token=$token; }
		function getUrl() { return $this->url;}
		function getError(){ return $this->error;}
		
		/**
		 * get the token from other application
		 */
		function receiveToken() {
			if (isset($_GET["token"])&&!empty($_GET["token"])) {
				$this->token=$_GET["token"];
			}
			else {
				$this->error="No token.";
			}
		}
		
		/**
		 * send url to other application
		 */
		function sendUrl() {
			if (!empty($this->url)) {
				header($this->url);
			}
		}
		
		/**
		 * request only the user name from other app
		 */
		function requestUserName() {
			$this->url="Location: http://localhost/APIDemo/FaceBookApplication/connectAPI.php?token=$this->token&openId=Linkin&information=userName";
			self::sendUrl();
		}

		/**
		 * receive the user name from other app
		 */
		function getUserName() {
			if (isset($_GET["userName"])&&!empty($_GET["userName"])) {
				$userName=$_GET["userName"];
				header("Location:newuser.php?userName=$userName");
			}
		}
		
		/**
		 * request the user profile from other app
		 */
		function requestUserProfile() {
			$this->url="Location: http://localhost/APIDemo/FaceBookApplication/connectAPI.php?token=$this->token&openId=Linkin&information=userProfile";
			self::sendUrl();
		}
		
		/**
		 * receive the user profile from other app
		 */
		function getUserProfile() {
			if (!empty($_GET["userName"])){
				$userName=$_GET["userName"];
				$password=123456;
				$age=$_GET["age"];
				$email=$_GET["email"];
				$phone=$_GET["phone"];
			
				$SimpleUsers = new SimpleUsers();
				$res = $SimpleUsers->createUser($userName, $password);
				
				if(!$res){
					$this->error = "Username already taken.";				
				}
				else
				{
					$res1 = $SimpleUsers->loginUser($userName, $password);
					header("Location: users.php");
				}
			}
			else {
				$this->error = "Username should not blank.";
			}
		}	
	}
?>