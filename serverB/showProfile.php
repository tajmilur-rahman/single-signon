<?php 
if (isset($_GET["age"])) {
	$userName=$_GET["userName"];
	$password=123456;
	$age=$_GET["age"];
	$email=$_GET["email"];
	$phone=$_GET["phone"];
}
?>

<html>

<head></head>

<body>
	<div>
		<table>
			<tr><td>UserName:</td><td><?= $userName?></td></tr>
			<tr><td>Password:</td><td><?= $password?></td></tr>
			<tr><td>Age:</td><td><?= $age?></td></tr>
			<tr><td>Email:</td><td><?= $email?></td></tr>
			<tr><td>Phone:</td><td><?= $phone?></td></tr>
		</table>	
	</div>
	
</body>
</html>