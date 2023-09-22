<?php
// Your Firebase API key
$apiKey = 'AIzaSyByuqoOaiidBYFLN42wNNAawiYPvbG0h6k';

// Firebase Realtime Database URL
$databaseUrl = 'https://smart-grow-aea93-default-rtdb.firebaseio.com/';

// Firebase path to the data you want to retrieve
$path = 'sensor_readings';

// Construct the URL for the GET request
$url = "{$databaseUrl}/{$path}.json?auth={$apiKey}";

// Perform the GET request
$data = file_get_contents($url);

// Convert the JSON response to a PHP array
$jsonData = json_decode($data, true);

// Loop through the data and display it on the HTML page
foreach ($jsonData as $key => $value) {
    echo "<p>{$key}: {$value}</p>";
}
?>
