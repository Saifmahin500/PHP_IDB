<?php
class Catagory 
{
    public $catagoryName;

    public function __construct($catagoryName)
    {
        $this->catagoryName = $catagoryName;
    }

    public function getcatagory()
    {
        return "Catagory: " . $this->catagoryName;
    }
}
class Electronices extends Catagory
{
    public $brand;

    public function __construct($catagoryName, $brand)
    {
        parent::__construct($catagoryName);
        $this->brand = $brand;
    }
    public function getProductDetails(){
        return $this->getcatagory().", brand:".$this->brand;
    }
}
class Cothing extends Catagory{
    public $size;
    public function __construct($catagoryName,$size){
        parent::__construct($catagoryName);
        $this->size = $size;
    }

    public function getProductDetails(){

        return $this->getcatagory().", Size:".$this->size;
}
}

$mobile = new Electronices("electronis","Samsung");
$tshirt = new Cothing("Cothing","Medium");

echo $mobile->getProductDetails()."<br>";
echo $tshirt->getProductDetails()."<br>";


?>

