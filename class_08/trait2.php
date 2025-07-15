<?php

trait Subscriber
{
    function SubscriberLogin(){
    echo "you are logged as subscriber";
}
}
trait Author
{
    function AuthorLogin(){
    echo "you are logged as Author";
}
}
trait Administrator
{
    function AdministratorLogin(){
    echo "you are logged as Administrator";
}
}

class Member
{
    use Subscriber,Author,Administrator;

    public function run(){
        $this->SubscriberLogin();
        $this->AdministratorLogin();
        $this->AuthorLogin();

        echo"all member login done!";

    }
}

$myLogin = new Member();
$myLogin->run();



?>