<?php
include_once "dbconfig.php";
include_once "authcode.php";

define('DEBUG', false);
define('PS_URL', 'http://engentive.development/cgiuk/');	// Root path of the shop
define('PS_WS_AUTH_KEY', 'HQI22G44IE4JD8H2RGQE7N1Z6NH3Z418');	// Auth key (Get it in your Back Office)
define('PS_SHOP_NAME','cgiuk');
?>
<h1>CGI UK Home Page</h1>
<?php
$email = "lineu@klfmedia.com";
/** Get connected to database and get user information for anyone */
try {
	$conn = mysqli_connect(_DB_SERVER_,_DB_USER_,_DB_PASSWD_,_DB_NAME_);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}else{		
			$query = "select u.email, uth.token_hash from users u, user_token_hash uth where u.email=uth.email and u.email='".$email."'";

        	$result = $conn->query($query);

        	while($row = $result->fetch_assoc()){
		    	$res[] = $row;
		    }
		    //var_dump($res);
	        //while($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
	        {
                	?>
			You are logged in as <strong><?php echo $res[0]['email']; ?></strong>
			<br />
			<?php
			//Generate the URI of the link to engentive that includes email + token_hash
			$uri = authcode("email=".$res[0]['email']."&&&hash=".$res[0]['token_hash'], 'ENCODE', 'cgiuk', 0);
			echo "http://engentive.development/cgiuk/en/?".urlencode($uri)."<br/>";
			?>
			<a href="http://engentive.development/cgiuk/en/?<?php echo urlencode($uri); ?>">Redeem Your Points</a>
			<?php
		}
	}
}
catch (PDOException $e){
        echo $e->getMessage();
}
?>
