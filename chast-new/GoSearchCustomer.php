<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<body>
<div style="background:grey;height:20px;width:100%;text-align:right">
<?php
require_once 'heading.php';

?>
</div>
<div style="background: yellow;height:400px;width:100%">
<?php 

	if ((!empty($_GET["email"]))&&(!empty($_GET["passwd"]))) {

		if (empty($_SESSION["ID"]))           //first connection
		{
			include "findCustomer.php";
			if ($_SESSION["EXIST"]=="Y") {
				header("Location: profile.php");

				//header("Location: ThirdPartyLogin.php");
			}
			else {
				header("Location: FileError.php?error="."Customer doesn't exist");
			}
		}
		else {
			header("Location: FileError.php?error="."Session already open");
		}
	}
?>
</div>
</body>

</html>