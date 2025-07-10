<?php
 

 class person 
 {
   public $name;
   public $weight;
   public $age;
   public $sex;
   public $profession;

   public function shop()
   {
    echo $this->name."is shopping <br>";
   }
   public function cook()
   {
    echo $this->name."is cooking <br>";
   }
   public function eat()
   {
    echo $this->name."is eating <br>";
   }
 }













?>