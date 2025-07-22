<?php

session_start();


$_SESSION["userName"] = "saif";

printf("your user name is %s", $_SESSION["userName"]);

?>