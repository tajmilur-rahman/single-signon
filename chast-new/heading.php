<?php
session_start();
if (!empty($_SESSION["ID"]))   //
{
	echo "Welcome :".$_SESSION["LastName"];
	echo "<a href='endsession.php'> Log Out </a>";
}
else 
	echo "Not Connected";

?>