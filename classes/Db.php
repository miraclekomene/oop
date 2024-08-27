<?php
class Dbh{
    // in database conection, you put them in as property.
    private $host = "localhost";
    // private $dbname = "myfirstdatabase";
    private $dbname = "oop";
    private $dbusername = "root";
    private $dbpassword = "";

    // protect the database connection using the "protected" visibility modifier cause it's a very sensitive part.
    protected function connect(){
        try {
            $pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->dbusername, $this->dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Make sure to return the $pdo
            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }

        // try {
        //     $conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
        //     // set the PDO error mode to exception
        //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     echo "Connected successfully";
        // } catch(PDOException $e) {
        //     echo "Connection failed: " . $e->getMessage();
        // }
    }
}