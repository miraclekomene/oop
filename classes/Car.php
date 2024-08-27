<?php

// basic class
class Car{
    // visibility modifiers are: public, private, protected
    // $brand and $color are property.
    // if it's private it means that only this class called "Car" have access to the information here. 
    // e.g 
    // private $brand = "Volvo"
    // private $color = "Green"
    
    // if you want the information to be accessed by the child class that extends to this class as well, then you can add the "protected" modifiers
    // e.g
    // protected $brand = "Volvo"
    // protected $color = "Green"
    
    // if you want the informations to be accessible by any class then you can use the "public" modifier.
    // therefore most mistakes people do is to add "public" to every property and method. without having a reason to do so.
    // it is adviceable to make every thing "private" as a default.
    // so when creating a class, consider first if there is any reason to make the informations "public".
    // e.g
    // public $brand = "Volvo"
    // public $color = "Green"
 
    // if you have a property in mind like: brand, color but don't know what the values will be, then use the following steps for pre-defined class:
    // e.g
    // private $brand;
    // private $color;

    // properties / fields
    private $brand;
    private $color;
    // public $vehicleType = "car";

    // constructor
    // A constructor is a method inside a class. so basically a function that is going to run whenever you create an object based on the class it is located.
    // it's a pre-defined word in PHP that create a function that is going to run when you create an object.
    // they assign data to the empty fields. from the construct blueprint(program)
    // add "none" if you don't want to assign color each time to the "Car" class
    // public function __construct($brand, $color){
    public function __construct($brand, $color = "none"){
        $this->brand = $brand;
        $this->color = $color;
    }

    // Getter & Setter methods
    // create a method that will access and change a property. e.g the "brand" or "color" to something else.
    // (1) basic getter method - for brand
    public function getBrand(){
        return $this->brand;
    }
    // (2) basic setter method - for brand
    public function setBrand($brand){
        $this->brand = $brand;
    }

    // (1) basic getter method - for color
    public function getColor(){
        return $this->color;
    }
    // (2) basic setter method - for color
    public function setColor($color){
        // to allow a certain color to be set when the color is changed
        $allowedColors = [
            'red',
            'blue',
            'green',
            'yellow'
        ];

        // if the color given exist in the $allowedColors array 
        if(in_array($color, $allowedColors)){
            $this->color = $color;
        }
    }


    // method
    // no need for parameters cause the properties are being stated above which are: $brand and $color
    public function getCarInfo(){
        return "Brand: ". $this->brand .", Color: ". $this->color;
    }



    // Note: the reason for classes is to encapsulate data
}

// $car01 = new Car("Volvo", "green");
// // if you don't want to assign color each time to the "Car" class
// // $car02 = new Car("BMW");

// // accessing a "public" property
// echo $car01->vehicleType;

// echo "<br />";

// // accessing a "public" method
// echo $car01->getCarInfo();

// NOTE: typically these are not done within the same document. which is accessing the property or accessing the class