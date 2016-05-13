<html><head><title>CRUD Tutorial - Create example</title></head><body>
<?php
/*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2013 PrestaShop SA
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
* PrestaShop Webservice Library
* @package PrestaShopWebservice
*/

include_once 'libraries/authcode.php';

// Here we define constants /!\ You need to replace this parameters
define('DEBUG', false);
//define('PS_SHOP_PATH', 'http://engentive.development/channelassistredeem/');
//define('PS_WS_AUTH_KEY', 'RW5N1MMUQ2SMRCH9IBZH5Y7FWYWSC8JX');

define('PS_SHOP_PATH', 'http://engentive.development/channelassistredeem/');		// Root path of your PrestaShop store
define('PS_WS_AUTH_KEY', 'HQI22G44IE4JD8H2RGQE7N1Z6NH3Z418');	// Auth key (Get it in your Back Office)

// define('PS_SHOP_PATH', 'http://localhost/prestashop/');		// Root path of your PrestaShop store
// define('PS_WS_AUTH_KEY', 'XENTRZ971MJT4UNJ43PR7VI2U9HPBJFJ');	// Auth key (Get it in your Back Office)

require_once('./PSWebServiceLibrary.php');

// Here we use the WebService to get the schema of "customers" resource
try
{
	$webService = new PrestaShopWebservice(PS_SHOP_PATH, PS_WS_AUTH_KEY, DEBUG);
	//$opt = array('resource' => 'customers');
	
	$opt = array(
			'resource'   => 'customers',
			'filter[email]' => '[huao@gmail.com]'
	);
	
	//$xml = $webService->get($opt);
	$xml = $webService->get(array('url' => PS_SHOP_PATH.'/api/customers?schema=blank'));
	$resources = $xml->children()->children();   //get the content in xml response
// 	var_dump($resources);
// 	exit;
	
	
	foreach ($resources as $nodeKey => $node)
	{
		$_POST[$nodeKey]="";
	}
	
	$_POST["passwd"]="kkk";
	$_POST["lastname"]="kkk";
	$_POST["firstname"]="kkk";
	$_POST["email"]="kkk@gmail.com";
	$_POST["newsletter"]="1";
	$_POST["optin"]="1";
}
catch (PrestaShopWebserviceException $e)
{
	// Here we are dealing with errors
	$trace = $e->getTrace();
	if ($trace[0]['args'][0] == 404) echo 'Bad ID';
	else if ($trace[0]['args'][0] == 401) echo 'Bad auth key';
	else echo 'Other error<br />'.$e->getMessage();
}




if (count($_POST) > 0)           //user post a new record include many post variable
{
// Here we have XML before update, lets update XML
	//var_dump($_POST);
	foreach ($resources as $nodeKey => $node)
	{
		$resources->$nodeKey = $_POST[$nodeKey];
	}
	try
	{
		$opt = array('resource' => 'customers');
			$opt['postXml'] = $xml->asXML();
			//$xml = $webService->add($opt);      //need it
			echo "Successfully added.</br>";
			//header("Location: http://engentive.development/channelassistredeem/?email=john@channelassist.ca&&password=klf12345");
			
			//$str = 'email=john@channelassist.ca&password=klf12345';
			$str = 'email=huao@gmail.com&password=klf12345';
			$key = 'chast-demo';
			$urlParameters=authcode($str,'ENCODE',$key,0);
			$urlParameters=authcode($urlParameters,'ENCODE',$key,0);
			
			header("Location: http://engentive.development/channelassistredeem/?"."key=".$key."&&&".$urlParameters);
			//header("Location: http://engentive.development/channelassistrewards/?"."key=".$key."&&&".$urlParameters);
				
	}
	catch (PrestaShopWebserviceException $ex)
	{
		// Here we are dealing with errors
		$trace = $ex->getTrace();
		if ($trace[0]['args'][0] == 404) echo 'Bad ID';
		else if ($trace[0]['args'][0] == 401) echo 'Bad auth key';
		else echo 'Other error<br />'.$ex->getMessage();
	}
}



?>

