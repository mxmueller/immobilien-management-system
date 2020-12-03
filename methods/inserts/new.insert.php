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
}

