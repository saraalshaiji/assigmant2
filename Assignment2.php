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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light dark">
    <title> UOB Student Nationality Data </title>
    <link rel="stylesheet" href="css/pico.min.css">
    <style>
        
        /* table Styling  */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px; 
            text-align: left;
            border: 1px solid #ddd; 
        }

        table th {
            background-color: #f2f2f2; 
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9; 
        }
    </style>
</head>

<body>

<!-- Display the data in the table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> Year </th>
                <th> Semester </th>
                <th> The Programs </th>
                <th> Nationality </th>
                <th> Colleges </th>
                <th> Number of students </th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($output as $student) {
                ?>
                <tr>
                 
                 <!-- Null operator for handling the undefined data -->
                    <td><?php echo $student["year"] ?? 'N/A'; ?></td>
                    <td><?php echo $student["semester"] ?? 'N/A'; ?></td>
                    <td><?php echo $student["the_programs"] ?? 'N/A'; ?></td>
                    <td><?php echo $student["nationality"] ?? 'N/A'; ?></td>
                    <td><?php echo $student["colleges"] ?? 'N/A'; ?></td>
                    <td><?php echo $student["number_of_students"] ?? 'N/A'; ?></td>
                </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
</body>
</html>
