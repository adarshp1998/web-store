<?php

class Database {

    private $host = null;
    private $user = null;
    private $pass = null;
    public $conn = null;

    public function __construct(
    $host = "localhost", $user = "root", $pass = "coderslab", $dbName = "OnlineShop"
    ) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->name = $dbName;
        //making a connection to a database
        try { 
            $this->conn = new PDO("mysql:host=$host;dbname=$dbName", $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (Exception $e) {
            echo "Uwaga: " . $e->getMessage() . "\n";
        }
    }
//function of changing database if required
    public function changeDB($name) {
        try {
            $this->conn->exec("use $name");
        } catch (Exception $e) {
            echo "Uwaga: " . $e->getMessage() . "\n";
            return false;
        }
        return true;
    }

}

//      CREATE DATABASE OnlineShop;