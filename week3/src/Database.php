<?php

declare(strict_types=1);

class Database {

    private $DB_HOST = 'localhost';
    private $DB_NAME = 'sidehustle';
    private $DB_USERNAME = 'root';
    private $DB_PASSWORD = '';
    // private static $instance = null;

    public function connect()
    {
        $dsn = "mysql:host={$this->DB_HOST};dbname={$this->DB_NAME};charset=UTF8";

        try {

            $pdo = new PDO($dsn, $this->DB_USERNAME, $this->DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error connecting to the Database: {$e->getMessage()}");
        }
        return $pdo;
    }

    public function fetchTodos() {
        
        $pdo = $this->connect();
        $sql = "SELECT id, todo, completed FROM todos ORDER BY completed";
        $query = $pdo->query($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetchAll();
        return $result;
    }

    public function insertTodo($todo) {
        $pdo = $this->connect();
        $sql = "INSERT INTO todos (todo) VALUES (:todo)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':todo' => $todo
        ]);

        $status = $stmt->rowCount();
        if ($stmt->rowCount() != 1) {
            $status = 'Error: Record not deleted';
        } else {
            $status = 'One record affected';
        }
        return $status;
    }

    public function fetchSingleTodo($id) {
        $pdo = $this->connect();
        $sql = "SELECT id, todo, completed FROM todos WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC); 
        $query->execute([
            ':id' => $id
        ]);        
        $result = $query->fetch();
        return $result;

    }

    public function updateTodo($id, $todo, $completed) {
        $pdo = $this->connect();
        $sql = "UPDATE `todos` SET todo = :todo, completed = :completed WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':todo' => $todo,
            ':completed' => $completed
        ]);

        if ($stmt->rowCount() != 1) {
            $status = 'Error: Record not updated';
        } else {
            $status = 'One record affected';
        }

        return $status;
    }

    public function deleteTodo($id) {
        $pdo = $this->connect();
        $sql = "DELETE FROM `todos` WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        if ($stmt->rowCount() != 1) {
            $status = 'Error: Record not deleted';
        } else {
            $status = 'One record affected';
        }

        return $status;
    }
}