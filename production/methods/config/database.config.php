<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "ims_local_instance";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);
// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}


