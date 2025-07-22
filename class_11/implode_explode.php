<?php

//implode-convert array to string
//explode- convert srring to array 

$array = array("jamal","kamal","damal","bamal") ;
echo(implode("-", $array));

echo"<br>";

$str = "1,2,3,4,5";
$arr = explode("-", $str);

foreach($arr as $i) 
{
    echo $i ."<br>";
}

function duble ($num){
    return $num * 2;
}

$number = [1,2,3,4,5,6];

$duble_number = array_map("duble", $number);

print_r($duble_number);

?>