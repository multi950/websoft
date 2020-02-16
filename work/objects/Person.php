<?php
Class Person{
    
    $name;

public function __construct(){

}

public function setName(String $name = null) : void{
    $this->name = $name;
}
public function getName() : String{
    return $name;
}
}