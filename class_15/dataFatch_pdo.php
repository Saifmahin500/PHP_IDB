<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=online_course", "root", "");

    $statment = $pdo->prepare("SELECT * FROM students");
    $statment->execute(); // এটা দরকার

    $row = $statment->fetch(PDO::FETCH_ASSOC);

    echo ($row['name']) . "<br>";
    echo ($row['email']);

} catch (PDOException $e) {
    echo "Error database connection: " . $e->getMessage();
}

?>
