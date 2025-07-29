<?php


//build connect string
$mysqli = new mysqli("localhost","root","","online_course");

if ($mysqli->connect_errno) 
{
   echo "failed to connect to the server:(".$mysqli->connect_errno.")".$mysqli->connect_error;
}

$sql = "select name, email from students";


if ($stmt = $mysqli->prepare($sql))
{
    $stmt -> execute();
    $stmt -> bind_result($name, $email);

    while($stmt -> fetch())
    {
        echo"$name,$email<br>";
    }
    $stmt -> close();
}
else{
    echo"succefully excetued"."we have:".$result->num_rows." " . "rows in this table";
}

$mysqli->close();

?>