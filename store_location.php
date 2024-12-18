<?php
// store_location.php

// Get the raw POST data from the incoming request
$data = file_get_contents("php://input");

// Decode the JSON data
$locationData = json_decode($data, true);

// Check if the data is valid
if (isset($locationData['latitude']) && isset($locationData['longitude'])) {
    $latitude = $locationData['latitude'];
    $longitude = $locationData['longitude'];

    // Here we are saving the data to a file (you can change this to save to a database)
    $file = 'location_data.txt';
    $locationString = "Latitude: $latitude, Longitude: $longitude\n";

    // Write the location data to the file
    file_put_contents($file, $locationString, FILE_APPEND);

    // Respond with a success message
    echo json_encode(["message" => "Location data saved successfully!"]);
} else {
    // If data is not valid, send an error message
    echo json_encode(["message" => "Invalid location data"]);
}
?>