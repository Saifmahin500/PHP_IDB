<?php

$student = array(
    array(
        "name" => "Saif uddin",
        "id" => 1,
        "address" => "mirpur"
    ),
    array(
        "name" => "kamal",
        "id" => 2,
        "address" => "mirpur 2"
    ),
    array(
        "name" => "jamal",
        "id" => 3,
        "address" => "mirpur 10"
    ),
    array(
        "name" => "mahin",
        "id" => 4,
        "address" => "kazipara"
    ),
    array(
        "name" => "ohin",
        "id" => 5,
        "address" => "uttora"
    )
);

foreach ($student as $value) {
    foreach ($value as $key => $val) {
        print "$key: $val<br>";
    }
    print "<br>";
}

?>
