<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<body style="TEXT-ALIGN: center;">
<div style="background:grey;height:20px;width:100%;text-align:right">
<?php
include 'heading.php';
require_once 'Customer.class.php';
?>
</div>
<div style="background: yellow;height:400px;width:100%">
<form action="#" method="get">
<?php 
	$oneCustomer=unserialize($_SESSION["Customer"]);
	$id=$oneCustomer->getCustomerId();
	$lastName=$oneCustomer->getLastName();
	$firstName=$oneCustomer->getFirstName();
	$email=$oneCustomer->getEmail();
	$pssswd=$oneCustomer->getPasswd();
?>
Customer id : <input type="text" name="id" value="<?php  echo $id;?>"/><br/>
Last Name: <input type="text" name="id" value="<?php  echo $lastName;?>"/><br/>

</form>
	<div style="margin-right:auto;MARGIN-LEFT: auto;">
	<table border='1'>
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
			<th>Password</th>
			<td><?php  echo $pssswd;?></td>
		</tr>	
	</table>
	</div>
	<a href="TestCreate.php">go to channelassistredeem</a></br>
	<a href="ThirdPartyLogin.php">go to channelassistredeem</a>
</div>
</body>

</html>