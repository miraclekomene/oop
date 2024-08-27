<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Object Oriented PHP - OOP</title>
</head>
<body>
  
<form action="includes/signup.inc.php" method="post">
  <input type="text" name="username">
  <input type="password" name="pwd" id="">
  <button>Signup</button>
</form>
<?php
// $brand = "volvo";
// $color = "Green";

// function getCarInfo($brand, $color){
//   return "Brand: ".$brand.", Color: ".$color;
// }

// echo getCarInfo($brand, $color);

  require_once 'classes/Car.php';
  $car01 = new car("BMW", "green");
  echo $car01->setBrand("Volvo"); // this line is changing the value of the brand
  echo $car01->getBrand();
  echo "<br>";
  $car01->setColor("white"); // this line is changing the value of the color
  echo $car01->getColor(); // this line is changing the value of the color

?>
</body>
</html>