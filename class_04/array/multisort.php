<?php

$result = array (
                    array("country"=>"bangladesh","capital"=>"dhaka"),
                    array("country"=>"india","capital"=>"pindi"),
                    array("country"=>"canada","capital"=>"nowyakali"),
                    array("country"=>"usa","capital"=>"feni"),
                    array("country"=>"japan","capital"=>"khulna") 
);
$capitals = array();

foreach($result as $key => $value)
{
    $capitals[$key] = $value['country'];
}

array_multisort($capitals,SORT_DESC,$result);
print_r("modified array are : <br>");
echo "<pre>";
print_r($result);
echo "</pre>";




























?>
