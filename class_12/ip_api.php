<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true); // decode as array

if ($result['status'] == 'success') {
    echo "Country: " . $result['country'] . '<br>';
    echo "Region: " . $result['region'] . '<br>';
    echo "City: " . $result['city'] . '<br>';
    echo "Lat: " . $result['lat'] . '<br>';
    echo "Lon: " . $result['lon'] . '<br>';
    echo "IP: " . $result['query'] . "<br>";
} else {
    echo "Could not retrieve location info.";
}

?>
