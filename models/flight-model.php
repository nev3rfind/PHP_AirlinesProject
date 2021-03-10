<?php
include "connection-database.php"; //connecting to database

function getAllFlights()
{
  $conn = getConnection();
  $query = "SELECT * FROM flights";
  $resultset = $conn->query($query);
  $flights = $resultset->fetchAll();
  closeConnection($conn);
  return $flights;
}

function getFlightById($flightId){ //SIMPLE
  $conn = getConnection();
  $stmt = $conn->prepare("SELECT * FROM flights WHERE flights.id = :id");
  $stmt->bindValue(':id', $flightId);
  $stmt->execute();
  $flights=$stmt->fetch();
  closeConnection($conn);
  return $flights;
}

function getFlightByIdDetailed($flightId){ //UPDATED
  $conn = getConnection();
  $stmt = $conn->prepare("SELECT FLIGHTS.id, ORG.name AS origin_airport, DES.name AS destination_airport, ORG.location as origin_location, DES.location AS destination_location, departure_date, departure_time, arrival_date, arrival_time FROM flights FLIGHTS INNER JOIN airports ORG ON ORG.id = FLIGHTS.origin_id INNER JOIN airports DES ON DES.id = flights.destination_id WHERE flights.id = :id");
  $stmt->bindValue(':id', $flightId);
  $stmt->execute();
  $flights=$stmt->fetch();
  closeConnection($conn);
  return $flights;
}

function getAllAirports(){
  $conn = getConnection();
  $query = "SELECT * FROM airports";
  $resultset = $conn->query($query);
  $airports = $resultset->fetchAll();
  closeConnection($conn);
  return $airports;
}



function saveFlight($flight_origin_id,$flight_destination_id,$flight_departure_date,$flight_departure_time,$flight_arrival_date,$flight_arrival_time){
  $conn = getConnection();
  $query="INSERT INTO flights (id, origin_id, destination_id, departure_date, departure_time, arrival_date, arrival_time) VALUES (NULL, :flight_origin_id, :flight_destination_id, :flight_departure_date, :flight_departure_time, :flight_arrival_date, :flight_arrival_time)";
  $stmt=$conn->prepare($query);
  $stmt->bindValue(':flight_origin_id', $flight_origin_id);
  $stmt->bindValue(':flight_destination_id', $flight_destination_id);
  $stmt->bindValue(':flight_departure_date', $flight_departure_date);
  $stmt->bindValue(':flight_departure_time', $flight_departure_time);
  $stmt->bindValue(':flight_arrival_date', $flight_arrival_date);
  $stmt->bindValue(':flight_arrival_time', $flight_arrival_time);
  $stmt->execute();
  closeConnection($conn);
}

?>
