<?php
class Account{
	
	protected $customerId,$amount,$dateAdd,$comment;
	
	function __construct($customerId,$amount,$comment)
	{
		$this->customerId=$customerId;
		$this->amount=$amount;
		$this->dateAdd=date('Y-m-d H:i:s');
		$this->comment=$comment;
	}
	
	function getAmount(){return $this->amount;}
	function getDateAdd(){return $this->dateAdd;}
	function getComment(){return $this->comment;}
	
	function setAmount($amount){
		$this->amount=$amount;
	}
	function setComment($comment){
		$this->comment=$comment;
	}
	
	function create($conn) {
		$cid=$this->customerId;
		$amount=$this->amount;
		$date=$this->dateAdd;
		$comment=$this->comment;
		$sqlcmd="insert into account (`customer_id`, `amount`, `date_add`, `comment`) values('$cid','$amount','$date','$comment')";
		$result=$conn->exec($sqlcmd);
		return $result;
	}
	
}


?>