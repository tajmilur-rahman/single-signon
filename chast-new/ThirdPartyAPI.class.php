<?php
require_once 'Customer.class.php';
include_once 'libraries/authcode.php';
require_once('PSWebServiceLibrary.php');

class ThirdPartyAPI
{
	/** @var string Shop URL */
	protected $url;
	
	/** @var string Authentification key */
	protected $key;
	
	/** @var boolean is debug activated */
	protected $debug;
	protected $customer;
	protected $shopName;
	
	function __construct($url, $key, $customer,$shopName,$debug) {
		$this->url = $url;
		$this->key = $key;
		$this->customer=$customer;
		$this->shopName=$shopName;
		$this->debug = $debug;
	}
	
	function login()
	{
		try
		{
			$webService = new PrestaShopWebservice($this->url, $this->key, $this->debug);
			$email=$this->customer->getEmail();
			$passwd=$this->customer->getPasswd();
		
			$opt = array(
					'resource'   => 'customers',
					'filter[email]' => $email
			);
		
			$xml = $webService->get($opt);
			//$xml = $webService->get(array('url' => $this->url.'/api/customers?schema=blank'));
			$resources = $xml->children()->children();   //get the content in xml response

			if ($resources->customer[0]['id']==null)        //have not this email, should add a new email
			{
				$xml = $webService->get(array('url' => $this->url.'/api/customers?schema=blank'));
				$resources = $xml->children()->children();
				$this->fillPostData($resources, $this->customer);

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
						$xml = $webService->add($opt);      //need it
						echo "Successfully added.</br>";
						//header("Location: http://engentive.development/channelassistredeem/?email=john@channelassist.ca&&password=klf12345");
				
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
			}
			$this->sendInformation($email, $passwd);
			
		

		}
		catch (PrestaShopWebserviceException $e)
		{
			// Here we are dealing with errors
			$trace = $e->getTrace();
			if ($trace[0]['args'][0] == 404) echo 'Bad ID';
			else if ($trace[0]['args'][0] == 401) echo 'Bad auth key';
			else echo 'Other error<br />'.$e->getMessage();
		}
		

	}
	
	/**
	 * This function is used to send encoded email and password informations to the url.
	 * @param string $email
	 * @param string $passwd
	 */
	function sendInformation($email,$passwd)
	{
		$str = 'email='.$email.'&password='.$passwd;
		$key = $this->shopName;
		$urlParameters=authcode($str,'ENCODE',$key,0);
		$urlParameters=authcode($urlParameters,'ENCODE',$key,0);			
		header("Location: ".$this->url."?key=".$key."&&&".$urlParameters);				
	}
	

	function fillPostData($resources,$customer)
	{		
		foreach ($resources as $nodeKey => $node)
		{
			$_POST[$nodeKey]="";
		}
		
		$_POST["passwd"]=$customer->getPasswd();
		$_POST["lastname"]=$customer->getLastName();
		$_POST["firstname"]=$customer->getFirstName();
		$_POST["email"]=$customer->getEmail();
		$_POST["active"]=1;
		$_POST["newsletter"]="1";
		$_POST["optin"]="1";
		$_POST["id_gender"]=($customer->getGender()=="man")?1:0;
		

	}
}


?>