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
	protected $points;
	
	function __construct($url, $key, $customer,$points,$shopName,$debug) {
		$this->url = $url;
		$this->key = $key;
		$this->customer=$customer;
		$this->points=$points;
		$this->shopName=$shopName;
		$this->debug = $debug;
	}
	
	public function login()
	{
		try
		{
			$webService = new PrestaShopWebservice($this->url, $this->key, $this->debug);		
			$customerId=$this->customerExist($webService,$this->customer);
			
			if ($customerId==null)        //engentive have not this email information, should add a new customer
			{
				$this->addNewCustomer($webService,$this->customer);
			}			
			else 
			{
				//add new points for exist customer
				$points=$this->points;
				if ($points!=0) {
					$this->addNewPoints($webService,$customerId,$points);
				}			
			}
			
			//login to engentive with email and password
			$email=$this->customer->getEmail();
			$passwd=$this->customer->getPasswd();
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
	protected function sendInformation($email,$passwd)
	{
		$str = 'email='.$email.'&password='.$passwd;
		$key = $this->shopName;
		$urlParameters=authcode($str,'ENCODE',$key,0);
		$urlParameters=authcode($urlParameters,'ENCODE',$key,0);			
		header("Location: ".$this->url."?key=".$key."&&&".$urlParameters);				
	}
	
	/**
	 * This function is used to fill the post data fileds to engentive
	 * @param object $resources
	 * @param object $customer
	 */
	protected function fillPostData($resources,$customer)
	{		
		foreach ($resources as $nodeKey => $node)
		{
			$_POST[$nodeKey]="";
		}
		//important post part
		$_POST["passwd"]=$customer->getPasswd();
		$_POST["lastname"]=$customer->getLastName();
		$_POST["firstname"]=$customer->getFirstName();
		$_POST["email"]=$customer->getEmail();
		$_POST["active"]=1;   //should post this field that allow this customer can login
		//normal part
		$_POST["newsletter"]=($customer->getNewsletter()=="Yes")?1:0;  //yes:1 ,no:0
		$_POST["optin"]=($customer->getOptin()=="Yes")?1:0;  //yes:1 ,no:0
		$_POST["id_gender"]=($customer->getGender()=="man")?1:2;   //id_man:1 ,id_woman :2
		$_POST["id_lang"]=($customer->getLang()=="English")?1:2;   //English:1 ,French :2
		$_POST["company"]=$customer->getCompany();
		$_POST["birthday"]=$customer->getBirthday();
		$_POST["website"]=$customer->getWebsite();
		$_POST["max_payment_days"]=$customer->getMaxPaymentDays();
		$_POST["website"]=$customer->getWebsite();
		$_POST["note"]=$customer->getNote();
		$_POST["hire_date"]=$customer->getHireDate();
		$_POST["department"]=$customer->getDepartment();
		$_POST["job_title"]=$customer->getJobTitle();
		$_POST["avatar"]=$customer->getAvatar();
	}
	
	protected function addNewCustomer($webService,$customer) 
	{
		$xml = $webService->get ( array ('url' => $this->url . '/api/customers?schema=blank' ) );
		$resources = $xml->children ()->children ();
		$this->fillPostData ( $resources, $customer );
		if (count ( $_POST ) > 0) // user post a new record include many post variable
		{
			// Here we have XML before update, lets update XML
			foreach ( $resources as $nodeKey => $node ) {
				$resources->$nodeKey = $_POST [$nodeKey];
			}
			try {
				$opt = array ('resource' => 'customers');
				$opt ['postXml'] = $xml->asXML ();
				$xml = $webService->add ( $opt );
				echo "Successfully added.</br>";
				//add points for this new customer
				$customerId=$this->customerExist($webService, $customer);
				if ($customerId!=null) {
					$points=$this->points;
					$this->addNewPoints($webService,$customerId,$points);
				}
			} 
			catch ( PrestaShopWebserviceException $ex ) {
				// Here we are dealing with errors
				$trace = $ex->getTrace ();
				if ($trace [0] ['args'] [0] == 404)
					echo 'Bad ID';
				else if ($trace [0] ['args'] [0] == 401)
					echo 'Bad auth key';
				else
					echo 'Other error<br />' . $ex->getMessage ();
			}
		}
	}
	protected function addNewPoints($webService,$customerId,$points) {
		$xmlAccounts = $webService->get(array('url' => $this->url.'/api/customer_account?schema=blank'));
		$resources = $xmlAccounts->children()->children();
		
		//$_POST['id']="";
		$_POST['id_customer']=$customerId;
		$_POST['amount']=$points;
		$_POST['date_add']=date('Y-m-d H:i:s');
		$_POST['comment']="add from chest demo";
		foreach ($resources as $nodeKey => $node)
		{
			$resources->$nodeKey = $_POST[$nodeKey];
		}
		try
		{
			$optAccounts = array('resource' => 'customer_account');
			$optAccounts['postXml'] = $xmlAccounts->asXML();
			$xmlAccounts = $webService->add($optAccounts);
		
			echo "customer account Successfully added.</br>";
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
	
	/**
	 * This function is used to check if the customer exist in this shop 
	 * @param object $webService
	 * @param object $customer
	 * @return $customerId or null
	 */	
	protected function customerExist($webService,$customer)
	{
		$email=$customer->getEmail();
		$opt = array (
				'resource' => 'customers',
				'filter[email]' => $email 
		);
		$xml = $webService->get ( $opt );
		$resources = $xml->children ()->children (); // get the content in xml response
		$customerId = $resources->customer [0] ['id'];
		return $customerId;
	}

}


?>