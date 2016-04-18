<?php
	//create by huao  sdfs
	require_once 'clientSever.class.php';
	
	$clientServer=new clientServer();
		
	//user has not send request
	if (!isset($_GET["userName"])) {
		$clientServer->setToken($_POST["token"]);
		if (isset($_POST["btnUserName"])){
			$clientServer->requestUserName();
		}
		elseif (isset($_POST["btnUserProfile"])){		
			$clientServer->requestUserProfile();
		}		
	}
	//user receive userinfo from another application
	else{
		if (isset($_GET["age"])) {           //receive all the profile
			$clientServer->getUserProfile();
		}
		else {
			$clientServer->getUserName();
		}
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
	  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	  <style type="text/css">

			* {	margin: 0px; padding: 0px; }
			body
			{
				background-color:Cyan;
				padding: 30px;
				font-family: Calibri, Verdana, "Sans Serif";
				font-size: 12px;
			}
			table
			{
				width: 800px;
				margin: 0px auto;
			}

			th, td
			{
				padding: 3px;
			}

			.right
			{
				text-align: right;
			}

	  	h1
	  	{
	  		color: #FF0000;
	  		border-bottom: 2px solid #000000;
	  		margin-bottom: 15px;
	  	}

	  	p { margin: 10px 0px; }
	  	p.faded { color: #A0A0A0; }

	  </style>
	</head>
	<body>
		<h1>Linkin Register Information</h1>		
		<?php 
			$error=$clientServer->getError();
			echo $clientServer->getError();
			if($error=="Username already taken."){?>
		<p>
			<br /><br />
			<a href="http://localhost/APIDemo/FaceBookApplication/login.php">Return to Facebook.</a>
			<a href="newuser.php">Create a new user in Linkin.</a>
		</p>
		<?php }
			elseif ($error=="Username should not blank."){ ?>
		<p>
			<br /><br />
			<a href="http://localhost/APIDemo/FaceBookApplication/login.php">Return to Facebook.</a>
			<a href="newuser.php">Create a new user in Linkin.</a>
		</p>
		<?php }?>

	</body>
</html>
