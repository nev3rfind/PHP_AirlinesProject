<?php
function listFlights(){
  $flights = getAllFlights(); //function from model/fligh-model.php
  include "views/browseable-list.php";
}

function details(){
  $flightId=$_GET['id'];
//  $flight = getFlightById($flightId);
  $flight = getFlightByIdDetailed($flightId);
  include "views/details.php";
}

function create(){
  $airports = getAllAirports();
  include "views/create.php";
}

function save(){
  $flight_origin_id=$_POST['origin_id'];
  $flight_destination_id=$_POST['destination_id'];
  $flight_departure_date=$_POST['departure_date'];
  $flight_departure_time=$_POST['departure_time'];
  $flight_arrival_date=$_POST['arrival_date'];
  $flight_arrival_time=$_POST['arrival_time'];
  saveFlight($flight_origin_id,$flight_destination_id,$flight_departure_date,$flight_departure_time,$flight_arrival_date,$flight_arrival_time);
  include "views/save.php";
}


?>
