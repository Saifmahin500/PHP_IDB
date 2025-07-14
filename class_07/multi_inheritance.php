<?php

interface my_print 
{
    public function printData();
}
interface select 
{
    public function getdata();
}
interface myInterface extends my_print, select
{
    public function addData();
}

class MyClass implements myInterface
{
    public function printData(){
        echo "This is prindata <br>";

    }
    public function getData(){
        echo "This is getData";

    }
    public function addData(){
        echo "This is addData";

    }
}

class MyClass2 extends MyClass
{

}

$obj = new MyClass2();
$obj->printData();
$obj->getData();





?>