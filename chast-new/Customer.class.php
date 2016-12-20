<?php

class Customer{
	
	protected $customerId,$gender,$lang,$company,$firstName,$lastName,$email,$passwd,$newsletter,
	$optin,$birthday,$website,$maxPaymentDays,$note,$hireDate,$department,$jobTitle,$avatar;
	//it is better not to create connection by class
	
	//we can enter construct with all parameters or no parameter
	function __construct() {}
	
	function getCustomerId(){return $this->customerId;}
	function getGender(){return $this->gender;}
	function getLang(){return $this->lang;}
	function getCompany(){return $this->company;}
	function getFirstName(){return $this->firstName;}
	function getLastName(){return $this->lastName;}
	function getEmail(){return $this->email;}
	function getPasswd(){return $this->passwd;}
	function getNewsletter(){return $this->newsletter;}
	function getOptin(){return $this->optin;}
	function getBirthday(){return $this->birthday;}
	function getWebsite(){return $this->website;}
	function getMaxPaymentDays(){return $this->maxPaymentDays;}
	function getNote(){return $this->note;}
	function getHireDate(){return $this->hireDate;}
	function getDepartment(){return $this->department;}
	function getJobTitle(){return $this->jobTitle;}
	function getAvatar(){return $this->avatar;}
	
	function setEmail($email){
		$this->email=$email;
	}
	function setPasswd($passwd){
		$this->passwd=$passwd;
	}
// 	function setPhone($phone) {
// 		$this->phone=$phone;
// 	}
	
	
	//implement CRUD
	
	function getCustomerByEmail($conn) {
		$email=$this->email;
		$passwd=$this->passwd;
		$query="select * from customers where email=:email and passwd=:passwd";
		$preQuery=$conn->prepare($query);
		$preQuery->bindValue(":email",$email,PDO::PARAM_STR);
		$preQuery->bindValue(":passwd",$passwd,PDO::PARAM_STR);
		$preQuery->execute();
		$result=$preQuery->fetchAll();
		
		$tObj="";
		
		
		if (sizeof($result)>0) {
			$tObj=new Customer();
			$res=$result[0];
			//retrieve data from database
				$tObj->customerId=$res["customer_id"];
				$tObj->gender=$res["gender"];
				$tObj->lang=$res["lang"];
				$tObj->company=$res["company"];
				$tObj->firstName=$res["firstname"];
				$tObj->lastName=$res["lastname"];				
				$tObj->email=$res["email"];
				$tObj->passwd=$res["passwd"];
				$tObj->birthday=$res["birthday"];
				$tObj->newsletter=$res["newsletter"];
				$tObj->optin=$res["optin"];	
				$tObj->website=$res["website"];
				$tObj->maxPaymentDays=$res["max_payment_days"];
				$tObj->note=$res["note"];
				$tObj->hireDate=$res["hire_date"];
				$tObj->department=$res["department"];
				$tObj->jobTitle=$res["job_title"];
				$tObj->avatar=$res["avatar"];
		}
		return serialize($tObj);
	}
}

?>