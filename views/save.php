<?php
session_start();
if(!isset($_SESSION["user"]))
{
  header( "Location: login-page.php" );
};
 ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Save the flight</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
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
echo "<p>Added the details for {$flight_departure_date} - {$flight_arrival_date}.</p>";
?>
</body>
</html>
