<?php

$logged_in_user = $_SESSION['user_id'];

$servername = "bngwcgyjxquzsogdpgjv-mysql.services.clever-cloud.com";
$username = "ubzcxi5aeywhopxg";
$password = "GkgWQRKJzxDrFquEIQp6";
$database = "bngwcgyjxquzsogdpgjv";
// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$sql = "SELECT * FROM landlords WHERE LandlordID = $logged_in_user";
$result = mysqli_query($connection, $sql);
$fetch = mysqli_fetch_row($result);
$glued = $fetch['1'] . ' ' . $fetch['2'];
echo $glued;
