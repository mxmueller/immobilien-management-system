<?php


if (isset( $_POST['submit'])) {

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

$sql = "insert into addresses
        (address_street, address_street_number, address_country_code, address_zipcodeId)
        values
        ($submit_raw_data['street'],
         $submit_raw_data['street_number'],
         $country_code,
         $submit_raw_data['zipcode'])
         
         insert into estate_meta
         (estate_meta_surface_size, estate_meta_rooms_count, estate_meta_bathroom_count, estate_meta_price_per_squaremeters, estate_meta_additional_costs )
         values
         ($submit_raw_data['surface_size'],
         $submit_raw_data['rooms_count'],
         $submit_raw_data['bathroom_count'],
         $submit_raw_data['price_per_square_meter'],
         $submit_raw_data['additional_cost'] )

         insert into estates
         (estate_typeid, addressid, estate_metaid)";



}