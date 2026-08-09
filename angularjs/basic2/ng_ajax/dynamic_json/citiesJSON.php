<?php

// include database.php file
require_once './Database.php';

// SET Header
header("Content-Type: application/json; charset=UTF-8");

// create object from database class
$db = new Databse();

// get connection
$db->getConnection();

// get posted data
$data = json_decode(file_get_contents("php://input"));

// Validate Request Data
if (!empty($data->city) && isset($data->city)) {

    // Sanitize
    $city = htmlentities(strip_tags($data->city));

    // Create SQL Query to Read Fruits Data
    $sql = "SELECT * FROM cities WHERE name LIKE '%{$city}%'";

    // Execute query
    $result = $db->executeRead($sql);
    
    // create empty array which stores json data
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $temp = array(
            "id" => $row["id"],
            "name" => $row["name"],
            "country" => $row["country"]
        );

        // add temp array to data array
        array_push($data, $temp);
    }

    // close database connection
    $db->closeConnection();

    // Output JSON
    echo json_encode(array(
        "records" => $data,
        "status" => true,
        "message" => "OK"
    ));
} else {
    // close database connection
    $db->closeConnection();

    // Output JSON if get variable not provided
    echo json_encode(array(
        "records" => [],
        "status" => false,
        "message" => "POST variable empty."
    ));
}