<?php
// inheritance 
// by add "extends" means the "Dbh" class is the parent class and the "Signup" class is the child class of the "Dbh" class.
// this now means that any sort of protected methods in the "Dbh" class can be accessed cause the "Signup" class is now a child class.
// therefore the connect method can be used to connect to the database.
class Signup extends Dbh{
    // create "private" property cause these are sensitive informations
    private $username;
    private $pwd;

    // create a constructor because we need to assign some data to the $username and $pwd property cause right now nothing is assigned to them
    public function __construct($username, $pwd){
        $this->username = $username;
        $this->pwd = $pwd;
    }

    // if you create another method "connect()" it will priotize it over the parent method "connect()" in the "Dbh" class cause they have the same method.
    // to resolve this use "parent::" so as to avoid error
    // private function connect(){

    // }

    // private function insertUser(){
    //     $query = "INSERT INTO users (`username`, `pwd`) VALUES (:username, :pwd);";// the ":username" and ":pwd" are placeholders
    //     // create a prepared statement
    //     // this refers to the parent method in the parent class "Dbh"
    //     $stmt = parent::connect()->prepare($query);
    //     // or
    //     // $stmt = $this->connect()->prepare($query);
    //     // or 
    //     // $stmt = $pdo->prepare($query);
    //     $stmt->bindParam(":username", $this->username);
    //     $stmt->bindParam(":pwd", $this->pwd);
    //     $stmt->execute();
    // }
    private function insertUser(){
        $hashedPwd = password_hash($this->pwd, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (`username`, `pwd`) VALUES (:username, :pwd);";// the ":username" and ":pwd" are placeholders
        // create a prepared statement
        // this refers to the parent method in the parent class "Dbh"
        $stmt = parent::connect()->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":pwd", $hashedPwd);
        $stmt->execute();
    }

    // To check for empty input fields
    private function isEmptySubmit(){
        if (isset($this->username) && isset($this->pwd)) {
            return false;
        }else{
            return true;
        }
    }

    // private function verifyPwd($pwd, $hashedPwd){
    //     return password_verify($pwd, $hashedPwd);
    // }
    
    // To check for errors in input 
    // therefore in order to access the "signupUser()" method in the "signup.inc.php" file
    // the "signupUser()" method needs to be made public.
    public function signupUser(){
        // Error Handlers
        if ($this->isEmptySubmit()) { //if there is an error and it's returning as true 
            // redirect to root folder
            header("Location: " . $_SERVER['DOCUMENT_ROOT'] . '/index.php');
            die(); // then kill the script that is going on.
        }

        // if no errors, signup user
        $this->insertUser();
    }
}