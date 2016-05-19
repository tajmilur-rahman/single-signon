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
include 'heading.php';
require_once 'Customer.class.php';
?>
</div>
<div style="background: lightblue;width:100%">

<?php 
	$oneCustomer=unserialize($_SESSION["Customer"]);
	$id=$oneCustomer->getCustomerId();
	$lastName=$oneCustomer->getLastName();
	$firstName=$oneCustomer->getFirstName();
	$email=$oneCustomer->getEmail();
	$points=1000;
?>
	<div class="div1">
	<h1>User Profile</h1>
		<form action="ThirdPartyLogin.php" method="get">
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
			</table>
			<a href="" onclick="document.forms[0].submit();return false;">go to channelassistredeem</a>
		</form>
	</div>

</div>
</body>

</html>