<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<style type="text/css">
		div.div1{ width:430px ;margin :10px,auto ;padding :100px ;position :relative ;left :32% ;background-color : rgba(198, 204, 198, 0.79)}
	  	div.container { width:98%; margin:1%;}
	  	table.center { margin-left:auto; margin-right:auto;  }
	</style>
</head>
<body style="TEXT-ALIGN: center;">
<div style="background:grey;height:20px;width:100%;text-align:right">
<?php
require_once 'dbconfig.php';
include 'heading.php';
require_once 'Customer.class.php';
require_once 'Account.class.php';
require_once 'ThirdPartyAPI.class.php';

define('DEBUG', false);
define('PS_URL', 'http://engentive.development/channelassistredeem/');		// Root path of your PrestaShop store
define('PS_WS_AUTH_KEY', 'HQI22G44IE4JD8H2RGQE7N1Z6NH3Z418');	// Auth key (Get it in your Back Office)
define('PS_SHOP_NAME','chast-demo');
?>
</div>
<div style="background: lightblue;width:100%">

<?php 
	$oneCustomer=unserialize($_SESSION["Customer"]);
	$id=$oneCustomer->getCustomerId();
	$lastName=$oneCustomer->getLastName();
	$firstName=$oneCustomer->getFirstName();
	$email=$oneCustomer->getEmail();
?>
	<div class="div1">
	<h1>User Profile</h1>
		<form action="" method="post">
			<table class="center" border="1">
				<tr>
					<th>Customer Id</th>
					<td><?php  echo $id;?></td>			
				</tr>
				<tr>
					<th>Email</th>
					<td><?php  echo $email;?></td>
				</tr>		
				<tr>
					<th>Last Name</th>
					<td><?php  echo $lastName;?></td>
				</tr>
				<tr>
					<th>First Name</th>
					<td><?php  echo $firstName;?></td>
				</tr>	
				<tr>
					<th>Points diff</th>
					<td><input type="text" name="points"/></td>
				</tr>	
				<tr>
					<th>Comment</th>
					<td><input type="text" name="comment"/></td>
				</tr>
			</table>
			
			<input type="submit" value="Save"/>
			<input type="submit" value="Reset" name="reset"/>	<br/>
			<a href="ThirdPartyLogin.php">go to channelassistredeem</a>
		</form>
	</div>

</div>
</body>
<?php 
	if (isset($_POST["points"])&&!empty($_POST["points"])) {
		$customerId=$id;
		$amount=$_POST["points"];
		$comment=$_POST["comment"];
		try {
			$conn=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
			$account=new Account($customerId, $amount, $comment);
			if($account->create($conn)){
				echo "Data has saved in chast demo database.<br/>";
				$thirdPartyAPI=new ThirdPartyAPI(PS_URL, PS_WS_AUTH_KEY,$oneCustomer,$amount,PS_SHOP_NAME,DEBUG);
				$thirdPartyAPI->synchronizeInformation();
			}
		}
		catch (PDOException $e){
			echo $e->getMessage();
		}
	}
	if (isset($_POST["reset"])) {
		header('Location: profile.php');
	}
?>
</html>
