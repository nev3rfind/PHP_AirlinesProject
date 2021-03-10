<?php
session_start();
 ?>

 <!DOCTYPE HTML>
 <html lang = "en">
 <head>
   <title>Login Process</title>
   <meta http-equiv="content-type" content="text/html;charset=utf-8">
 </head>

 <body>

   <?php
   date_default_timezone_set('Europe/London');
   $errors = 0;

   $error_message = [];
if ($_POST['origin_id']=="error"){
  array_push($error_message, "Please select origin airport");
  $errors++;
}

if ($_POST['destination_id']=="error"){
  array_push($error_message, "Please select destination airport");
  $errors++;
}

if((strtotime($_POST['departure_date']) < strtotime('now')) && ((strtotime($_POST['departure_time'])) < strtotime(date("H:i")))) {
  array_push($error_message, "Departure date and time cannot be in the past!");
$errors++;
}

if((strtotime($_POST['arrival_date']) < strtotime('now')) && ((strtotime($_POST['arrival_time'])) < strtotime(date("H:i")))) {
  array_push($error_message, "Arrival date and time cannot be in the past!");
$errors++;
}

if((strtotime($_POST['departure_date']) > strtotime($_POST['arrival_date'])) || ((strtotime($_POST['departure_time'])) > strtotime($_POST['arrival_time']))) {
  array_push($error_message, "The departure date and time must be before the arrival date and time!");
$errors++;
}

if($errors==0){
//action="../index.php?action=save";

}
else if ($errors>0) {
  foreach ($error_message as $error)
  {
    echo "<p> {$error} </p>";
  }
}

   ?>

 </body>
 </html>
