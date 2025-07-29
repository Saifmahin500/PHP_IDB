<?php

$mysqli = new mysqli("localhost","root","","online_course");

if ($mysqli->connect_errno) 
{
   echo "failed to connect to the server:(".$mysqli->connect_errno.")".$mysqli->connect_error;
}

$result = $mysqli->query("select * from students");
$row = $result->fetch_assoc();

echo ($row['name'])."<br>";
echo ($row['email']);

?>