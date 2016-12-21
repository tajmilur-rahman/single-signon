<?php
session_start();
require_once 'Customer.class.php';
require_once 'EngentiveAPI.class.php';

define('DEBUG', false);
define('PS_URL', 'http://engentive.development/cgiuk/');	// Root path of the shop
define('PS_WS_AUTH_KEY', 'HQI22G44IE4JD8H2RGQE7N1Z6NH3Z418');	// Auth key (Get it in your Back Office)
define('PS_SHOP_NAME','cgiuk');

//$customer = new Customer();
//$customer = unserialize($_SESSION["Customer"]);
$customer = new Customer();
$email = $_GET['emaiil'];
$customer->loadByEmail($email);

//$points = $_GET["points"];

$hash = $_GET['token'];
$engentiveAPI = new EngentiveAPI(PS_URL, PS_WS_AUTH_KEY, $customer, $hash, PS_SHOP_NAME, DEBUG);
$engentiveAPI->login();
