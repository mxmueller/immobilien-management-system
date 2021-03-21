<?php

$servername = "bngwcgyjxquzsogdpgjv-mysql.services.clever-cloud.com";
$username = "ubzcxi5aeywhopxg";
$password = "GkgWQRKJzxDrFquEIQp6";
$database = "bngwcgyjxquzsogdpgjv";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);
// Check connection
if ($connection->connect_error) {
  die("Connection failed: " . $connection->connect_error);
}
