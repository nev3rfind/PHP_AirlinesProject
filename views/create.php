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
<title>Add new flight</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
  <?php echo "<p>You are logged in as : {$_SESSION['user']}</p>";
  if($_SESSION["role"]!=2){
    echo "<p>Only admin can access this page<p>";
    echo "<p> Your role is {$_SESSION["role"]}";
    echo "<p>Click <a href='../index.php'>here</a> to open home page<p>";
    echo "</body>";
    echo"</html>";
    exit;
  }
?>
<ul>
<li><a href="index.php?action=list">View flights</a></li>
<li><a href="index.php?action=create">Add a new flight</a></li>
<li><a href="./models/logout.php">Logout</a></li>
</ul>
<h1>Add a new flight</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
<div>
<label for="airport_name">From: </label>
<select id="airport_name" name="origin_id" value="<?php echo $flight_origin_id;?>">
  <option value="error">Please select an origin airport</option>
  <?php
foreach ($airports as $airport) {
  echo "<option value='{$airport["id"]}'>{$airport["name"]}</option>";
}
   ?>
 </select>
</div>
<div>
  <label for="airport_name">To: </label>
  <select id="airport_name" name="destination_id" value="<?php echo $flight_destination_id;?>">
    <option value="error">Please select a destination airport</option>
    <?php
  foreach ($airports as $airport) {
    echo "<option value='{$airport["id"]}'>{$airport["name"]}</option>";
  }
     ?>
   </select>
</div>
<div>
<label for="departure_date">Departure Date:</label>
<input type="date" id="departure_date" name="departure_date" value="<?php echo $flight_departure_date;?>" min="2021-01-01">
</div>
<div>
<label for="departure_time">Departure Time:</label>
<input type="time" id="departure_time" name="departure_time" value="<?php echo $flight_departure_time;?>">
</div>
<div>
<label for="arrival_date">Arrival Date:</label>
<input type="date" id="arrival_date" name="arrival_date" value="<?php echo $flight_arrival_date;?>" min="2021-01-01">
</div>
<div>
<label for="arrival_time">Arrival Time:</label>
<input type="time" id="arrival_time" name="arrival_time" value="<?php echo $flight_arrival_time;?>">
</div>
<div>
<input type="submit" name="submitBtn" value="Add Flight">
</div>
</form>
</body>
</html>
