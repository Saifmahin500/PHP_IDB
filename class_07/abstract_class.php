<?php

abstract class Base{
    abstract function printData();

    function pr(){
        echo "base class";
    }
}

class Derived extends Base{
    function printData()
    {
         echo"Derived class";
    }

    }

    $obj = new Derived;
    $obj->printData();
?>