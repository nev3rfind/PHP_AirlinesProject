<?php
session_start();
if(!isset($_SESSION["user"]))
{
  header( "Location: views/login-page.php" );
};
 ?>
<!DOCTYPE HTML>
<html>
<head>
  <title>List the flights</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <style>
  <?php include "./css/main.css" ?>
  </style>
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
  foreach ($flights as $flight) {
    echo "<p>";
    echo "<a href='index.php?action=details&id=".$flight["id"]."'>";
    echo "Flight: {$flight["id"]} | {$flight["departure_date"]} - {$flight["arrival_date"]}";
    echo "</a>";
    echo "</p>";
  }
   ?>
</body>
</html>
