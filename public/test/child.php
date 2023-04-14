<?php
include "home.php";
include "v.php";

class Child extends Home
{
    use v;
    public $gpt;
    public function __construct($gpt,$name,$age)
    {
        $this->$gpt = $gpt;
        $this->name=$name;
        $this->age=$age;

    }



    public function get_gpt()
    {
        return $this->gpt;
    }
    public function get_age()
    {
        return $this->name;
    }
}
