<?PHP

class MyClass {
    public $name;
    public$pin;

    public function showinfo(){
        echo"pincode is :" .$this->pin."name is:".$this->name;
    }

    public function setPIn($mypin)
    {
        $this ->pin = $mypin;
    }

}


?>