<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=online_course", "root", "");
} 
catch (PDOException $e) {
    echo "Error database connection". $e->getMessage();
}

$stmt = $pdo->prepare("select * from students");
$stmt->execute();
echo"number of rows in this table are :".$stmt->rowCount();

?>