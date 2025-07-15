<?php

trait message
{
    abstract public function customMessage($msg);

    public function defaultMessage()
    {
        echo"This is default message.<br>";
    }
}

class MyClass
{
    use message;
    public function customMessage($msg)
    {
        echo "custom message:" .$msg."<br>";
    }
}

$obj = new MyClass();
$obj->customMessage("hello world");
$obj->defaultMessage("");

?>