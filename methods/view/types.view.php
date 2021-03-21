<?php

function TypeData() {

    $servername = "bngwcgyjxquzsogdpgjv-mysql.services.clever-cloud.com";
    $username = "ubzcxi5aeywhopxg";
    $password = "GkgWQRKJzxDrFquEIQp6";
    $database = "bngwcgyjxquzsogdpgjv";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "SELECT * FROM estate_types";
    $result = mysqli_query($connection, $sql);
 

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $new_array[] = $row;   
        }
    }
    return $new_array;
}
