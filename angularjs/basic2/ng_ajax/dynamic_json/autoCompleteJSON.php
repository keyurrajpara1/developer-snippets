<?php

// include database.php file
require_once './Database.php';

// SET Header
header("Content-Type: application/json; charset=UTF-8");

// create object from database class
$db = new Databse();

// get connection
$db->getConnection();

// Validate Request Data
if (!empty($_GET['q']) && isset($_GET['q'])) {

    // Sanitize
    $q = htmlentities(strip_tags($_GET['q']));

    // Create SQL Query to Read Fruits Data
    $sql = "SELECT * FROM questions WHERE title LIKE '%{$q}%'";

    // Execute query
    $result = $db->executeRead($sql);

    // create empty array which stores json data
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $temp = array(
            "id" => $row["id"],
            "title" => $row["title"]
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
        "message" => "GET variable empty."
    ));
}


