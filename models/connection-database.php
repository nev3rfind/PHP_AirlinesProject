<?php
include ('C:\xampp\htdocs\assignment\config\config.php'); //if I will use location : ../config/config it can connect to databse and if login credentials are wrong, but if login correct, include from connection database is not working

function getConnection()
{
try{
  $conn=new PDO(DB_DATA_SOURCE, DB_email, DB_PASSWORD);
  $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
  echo "Oh no, there was a problem". $exception->getMessage();
}
return $conn;
}

function closeConnection($conn)
{
  $conn=null;
}
