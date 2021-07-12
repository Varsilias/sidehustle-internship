<?php

declare(strict_types=1);

class Database {

    private $DB_HOST = 'localhost';
    private $DB_NAME = 'sidehustle';
    private $DB_USERNAME = 'root';
    private $DB_PASSWORD = '';
    private static $instance = null;

    public function __construct()
    {
        try {

            $conn = new PDO("mysql:host={$this->DB_HOST};dbname={$this->DB_NAME};charset=UTF8", $this->DB_USERNAME, $this->DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if($conn) {
                 echo "Connected to {$this->DB_NAME} databse successfully";

            }
        } catch (PDOException $e) {
            die("Error connecting to the Database: {$e->getMessage()}");
        }
         
    }

    public static function getInstance()
    {
        if(!isset(self::$instance)) {
            self::$instance = new Database();
        }

        return self::$instance;
    }
}