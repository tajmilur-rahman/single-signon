<?php
require_once (dirname ( __FILE__ ) . "/simpleusers/AuthServer.class.php");
// check token
// check openId
if (isset ( $_GET ["token"] )) {
	echo $_GET ["name"];
	echo $_GET ["openId"];
	if (($_GET ["token"] == $_SESSION ["token"])) {
		$AuthServer = new AuthServer ();
		if ($AuthServer->checkOpenId ( $_GET ["openId"] )) {
			//provide profile to client
			
			header("Location");
		}
	}
}
function send() {
	echo "send";
}
?>