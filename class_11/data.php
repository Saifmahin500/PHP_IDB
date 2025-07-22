<?php

$fileName = "Data.json";

$data = file_get_contents($fileName);

header("Content-Type:application/json");

echo $data;

?>