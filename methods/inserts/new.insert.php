<?php

if (isset( $_POST['submit'])) {

    include '../config/database.config.php';

$submit_raw_data = array (
    'zipcode' => $_POST['zipcode'],
    // 'city' => $_POST['city'],
    'street' => $_POST['street'],
    'street_number' => $_POST['street_number'],
    'estate_type' => $_POST['estate_type'],
    'surface_size' => $_POST['surface_size'],
    'rooms_count' => $_POST['rooms_count'],
    'bathroom_count' => $_POST['bathroom_count'],
    'price_per_square_meter' => $_POST['price_per_square_meter'],
    'additional_cost' => $_POST['additional_cost'],
);

$country_code = 'DE';

$sql_Addresses_Insert = "insert into addresses
        (Address_Street, Address_Street_Number, Address_Country_Code, ZipcodeID)
        values
        ('" . strval($submit_raw_data['street']) . "',
        '" . $submit_raw_data['street_number'] . "',
        '" . strval($country_code) . "',
        '" . intval($submit_raw_data['zipcode']) . "')";

$result_addresses = mysqli_query($connection, $sql_Addresses_Insert);
$last_record_Addresses_Insert = mysqli_insert_id($connection);
         
$sql_EstateMeta_Insert =  "insert into estate_meta
         (estate_meta_surface_size, estate_meta_rooms_count, estate_meta_bathroom_count, estate_meta_price_per_squaremeters, estate_meta_additional_costs )
         values
         (" . $submit_raw_data['surface_size']. ",
         " . $submit_raw_data['rooms_count']. ",
         " . $submit_raw_data['bathroom_count']. ",
         " . $submit_raw_data['price_per_square_meter']. ",
         " . $submit_raw_data['additional_cost']. " )";

$result_estateMeta = mysqli_query($connection, $sql_EstateMeta_Insert);
$last_record_EstateMeta_Insert = mysqli_insert_id($connection);

$sql_Estate_Insert = "insert into estates
         (estate_typeid, addressid, estate_metaid, estate_parentid)
         values
         (" .$submit_raw_data['estate_type']. " ,
         " .$last_record_Addresses_Insert . ",
         " .$last_record_EstateMeta_Insert . ",
         0 ) ";

$result_estate = mysqli_query($connection, $sql_Estate_Insert);

}