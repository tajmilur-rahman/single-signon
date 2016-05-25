<?php
require_once 'dbconfig.php';
require_once 'Customer.class.php';

$email=$_GET["email"];
$passwd=$_GET["passwd"];
try {
	$conn=new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);	
	$oneCustomer=new Customer();
	$oneCustomer->setEmail($email);
	$oneCustomer->setPasswd($passwd);

	$oneCustomer=unserialize($oneCustomer->getCustomerByEmail($conn));

	
	if (!empty($oneCustomer)) {
		$_SESSION["ID"]=$oneCustomer->getCustomerId();
		$_SESSION["LastName"]=$oneCustomer->getLastName();
		$_SESSION["Customer"]=serialize($oneCustomer);
		$_SESSION["EXIST"]="Y";
		
	}
	else {
		$_SESSION["EXIST"]="N";
	}
}
catch (PDOException $e){
	echo $e->getMessage();
}


?>