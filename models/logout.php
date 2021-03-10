<?php
session_start();
if(!isset($_SESSION["user"]))
{
	//user tried to access the page without logging in
  //redirect them to the login page
	header( "Location: ./login-page.php" );
};
?>
<!DOCTYPE html>
<html>
<head>
<title>Logout</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>

<body>
<?php
session_destroy();
echo "<p>You've been logged out</p>";
echo "<p><a href='../views/login-page.php'>Login again</a></p>";
?>
</body>
</html>
