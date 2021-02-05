<?php

    $frontend_zipcode = $_POST['zipcodeinsert'];

    if (strlen($frontend_zipcode) > 5) {
        $frontend_zipcode = substr_replace($frontend_zipcode, "", -1);
        $city = cityValidator($frontend_zipcode);
    } else {
        $city = cityValidator($frontend_zipcode);
    }

    print_r($city[3]);

    function cityValidator($zipcode) {
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $database = "ims_local_instance";

        // Create connection
        $connection = new mysqli($servername, $username, $password, $database);

        $sql = "SELECT * FROM zipcodes WHERE zipcode = $zipcode";
        $result = mysqli_query($connection, $sql);
        return mysqli_fetch_row($result);
    }

    function startsWith ($string, $startString) { 
    $len = strlen($startString); 
    return (substr($string, 0, $len) === $startString); 
    } 
?>