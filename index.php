<?php
include "models/flight-model.php";
include "controllers/flight-controller.php";

if(isset($_GET["action"])){
  $action = $_GET['action'];
} else{
  $action="list";
}

if ($action==="list"){
  listFlights();
} else if ($action==="details" && isset($_GET['id'])) {
  details();
} else if ($action==="create") {
  create();
} else if ($action==="save") {
  save();
}
 ?>
