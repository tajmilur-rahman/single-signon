<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style type="text/css">
	div.div1{ width:430px ;margin :100px,auto ;padding :100px ;position :relative ;left :32% ;background-color : rgba(198, 204, 198, 0.79) ;
</style>

</head>

<body>
<div style="background:grey;height:20px;width:100%;text-align:right">
<?php
include_once 'heading.php';

?>
</div>
<div class="div1">
<form action="GoSearchCustomer.php" method="get">
<h1>Login</h1>
Email : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="email" /><br/><br/>
Password : <input type="password" name="passwd" /><br/><br/>
<input type="submit" name="submit" value="Login">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="reset" name="reset" value="Cancel"><br/>

</form>
</div>
</body>

</html>
