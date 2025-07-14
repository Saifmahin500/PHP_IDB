<?php

abstract class Car 
{
    protected $tankVolum;

    public function setTankVolum($volum){
        $this->tankVolum = $volum;
    }
    abstract public function getTankVolum();
}

class Honda extends Car{
    public function getTankVolum(){
        $miles = $this->tankVolum*30;
        return $miles;

}
}

class Toyota extends Car{
    public function getTankVolum(){
        $miles = $this->tankVolum*33;
        return $miles;
    }
    public function getClr(){
        return "blue";
    }

}

$toyota = new Toyota();
$toyota->setTankVolum(10);
echo $toyota->getTankVolum()."<br>";
echo $toyota->getClr();

$honda = new Honda();
$honda->setTankVolum(10);
echo $honda->getTankVolum()."<br>";



?>