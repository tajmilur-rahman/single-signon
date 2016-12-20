<?php
session_start();
require_once 'Customer.class.php';
require_once 'ThirdPartyAPI.class.php';

define('DEBUG', false);
define('PS_URL', 'http://engentive.development/cgiuk/');	// Root path of the shop
define('PS_WS_AUTH_KEY', 'HQI22G44IE4JD8H2RGQE7N1Z6NH3Z418');	// Auth key (Get it in your Back Office)
define('PS_SHOP_NAME','cgiuk');

$oneCustomer = new Customer();
$oneCustomer = unserialize($_SESSION["Customer"]);
$points = $_GET["points"];
$thirdPartyAPI = new ThirdPartyAPI(PS_URL, PS_WS_AUTH_KEY,$oneCustomer,$points,PS_SHOP_NAME,DEBUG);
$thirdPartyAPI->login();

?>
