<?php

// Task1: data retrieval
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// Fetch the API response as a JSON string 
$response = file_get_contents($url);

// Decode the JSON response into an associative array.
$data_output = json_decode($response, true);

// Check if the response is valid and contains the 'results' key.
if (!$data_output || !isset($data_output["results"])) {

    // error message if data is missing or invalid.
    die("Something went wrong, Output (data) not found");
}

// Extract 'results' data from the decoded response.
$output = $data_output["results"];

?> 
