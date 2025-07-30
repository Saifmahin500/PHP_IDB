<?php

$mysqli = new mysqli("localhost","root","","online_course");

if ($mysqli->connect_errno) 
{
   echo "failed to connect to the server:(".$mysqli->connect_errno.")".$mysqli->connect_error;
}

$sql = "insert into students(id,)";

?>