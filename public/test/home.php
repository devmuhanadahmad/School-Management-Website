<?php
/*
$arr = [
    "1st" => 1,
    "2nd" =>2,
    "3rd" => 3
];
$sum=0;
foreach($arr as $k=>$v){
    $sum+=$v;
}
echo 'sum = '.$sum;
echo "<br>";
echo 'count = ' .count($arr);


$arr2=[1,2,5,4];
for($i=0; $i< count($arr2) ; $i++){
    echo " <br>" . $i+1 . " = " . $arr2[$i];
}

//const
//What are the various constants predefined in PHP
// _METHOD_: Represents the class name
// _CLASS_: Returns the class name
// _FUNCTION_: Denotes the function name
// _LINE_: Denotes the working line number
// _FILE_: Represents the path and the file nam


class A{
  public  const CAR = "ali";
  public static $ma=555;
   public function a(){
        return 1 . __FUNCTION__.__CLASS__;
  }
}
$m=new A();
echo $m->a();

$date = new DateTime();
echo"<br>";
echo $date->format('y-M-D H:i:s');

function a(){
    return 5;
}

echo a();

function a1($age ,...$other){
       foreach($other as $a){
        echo "<br>".$age . $a;
       }
}
echo "<br>";
echo a1(55,1,2,3);

echo "<br>";

echo A::$ma;
*/
class Home{
    protected $name;
    public $age;

public function __construct($name,$age){
    $this->name=$name;
    $this->age=$age;
}

public function get_name()
{
    return $this->name;
}
public function get_age()
{
    return $this->age;
}



}//end class
