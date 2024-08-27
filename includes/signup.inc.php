<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    require_once "../classes/Db.php";
    require_once "../classes/Signup.php";

    $signup = new Signup($username, $pwd); //extantiate object
    $signup->signupUser();
}