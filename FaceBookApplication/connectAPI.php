<?php
session_start ();
require_once (dirname ( __FILE__ ) . "/simpleusers/su.inc.php");
require_once (dirname ( __FILE__ ) . "/simpleusers/AuthServer.class.php");
// check token
// check openId
if (isset ( $_GET ["token"] )) {
	// echo $_GET ["name"];
	// echo $_GET ["openId"];
	if (($_GET ["token"] == $_SESSION ["token"])) {
		$AuthServer = new AuthServer ();
		if ($AuthServer->checkOpenId ( $_GET ["openId"] )) {
			// provide profile to client
			// get user info
			$SimpleUsers = new SimpleUsers ();
			$user = $SimpleUsers->getSingleUser ();
			
			$userName = $user ["uUsername"];
			$age=$user["uAge"] ;
			$email=$user["uEmail"];
			$phone=$user["uPhone"];
			if (isset ( $_GET ["information"] )) {
				if ($_GET ["information"] == "userName") {
					$url=$AuthServer::link;
					header ( "Location:".$url."userName=$userName" );
				}
				elseif ($_GET ["information"] == "userProfile"){
					$url=$AuthServer::link;
					header ( "Location:".$url."userName=$userName&&age=$age&&email=$email&&phone=$phone" );					
				}
			}
		}
	}
}
function send() {
	echo "send";
}
?>