<?php
include_once "dbconfig.php";
include_once "authcode.php";

$valid = false;

if(isset($_GET['p']) && trim($_GET['p'] != ''))
{       
	$paramString = $_GET['p'];

	$uri = authcode($paramString, 'DECODE', 'cgiuk', 0);
	//Check in database if the email and hash combination is good
	$conn = mysqli_connect(_DB_SERVER_,_DB_USER_,_DB_PASSWD_,_DB_NAME_);
        if (!$conn) {
                die('Could not connect: ' . mysql_error());
        }else{  		
		$tmp = explode ('&&&', $uri);

                //check if have two parameter
                if(sizeof($tmp) == 2)
                {
                	$tmpEmail = $tmp[0];
                        $tmpHash = $tmp[1];
                        $tmp = explode ('=', $tmpEmail);
                        $email = $tmp[1];
                        $tmp = explode('=', $tmpHash);
                        $hash = $tmp[1];
		}

                $query = "select u.email, uth.token_hash from users u, user_token_hash uth where u.email=uth.email and u.email='".$email."' and token_hash='".$hash."'";

                $result = $conn->query($query);

                $rowcount=mysqli_num_rows($result);

                if($rowcount != 0) {
			$valid = true;
		}
	}
}

$result = array(
	'valid' => $valid,
);

header('Content-type: application/json');
exit (json_encode($result));
