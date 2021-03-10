<?php
session_start();
if(!isset($_SESSION["user"]))
{
	//user tried to access the page without logging in
  //redirect them to the login page
	header( "Location: login-page.php" );
};
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Flight details</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<link href="./css/main.css" media="all" rel="stylesheet">
</head>
<body>
  <?php echo "<p>You are logged in as : {$_SESSION['user']}</p>"; ?>
  <ul>
    <li><a href="index.php?action=list">View flights</a></li>
    <?php include "./models/authorisation.php";
		 checkifAdmin();?>
    <li><a href="./models/logout.php">Logout</a></li>
  </ul>
<?php
if($flight){
  echo "<h1> Flight {$flight['id']} </h1>";
  echo "<ul>";
  echo "<li>Origin:  {$flight['origin_airport']} ({$flight['origin_location']})</li>";
  echo "<li>Destination:  {$flight['destination_airport']} ({$flight['destination_location']}) </li>";
  echo "<li>Departure:  {$flight['departure_date']} {$flight['departure_time']}</li>";
  echo "<li>Arrival:  {$flight['arrival_date']} {$flight['arrival_time']}</li>";
  echo "</ul>";
}

else {
	echo "ERROR from database";
}
?>
</body>
</html>
