<?php

include("object.php");

$father = new person;
$father->name = "mr.mohi";
$father->age = 50;
$father->profession = "buisnessmen";

$mother = new person;
$mother->name = "rumkey";
$mother->age = 40;
$mother->profession = "housewife";


$baby = new person;
$baby->name = "saif";
$baby->age = 20;
$baby->profession = "khay are ghumai";

$father->shop();
$mother->cook();
$baby->eat();


?>