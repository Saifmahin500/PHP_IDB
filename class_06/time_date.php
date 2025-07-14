<?php
echo"<h1>Time&Date</h1>";
date_default_timezone_set("asia/dhaka");

echo date("y-m-d");
echo ("<br>");
echo date ("d/m/Y");
echo ("<br>");
echo date("1,F,j,Y");
echo ("<br>");

echo date("h:i:s A");
echo ("<br>");
echo date ("h,i,s");
echo ("<br>");     

echo "Year" .date ("Y");  
echo ("<br>");
echo "Month" .date ("F");     
echo ("<br>");

$date = new DateTime();
$date->modify("+1 Month");
echo "NEXT MONTH :" .$date->format("M");
echo ("<br>");



$time1 = new DateTime("2025-07-13 10:30:00");
$time2 = new DateTime("2025-07-13 14:45:30");

$diff = $time1->diff($time2);
echo "Difference: " . $diff->format("%d days, %h hours, %i minutes, %s seconds");

?>




