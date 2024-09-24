<?php
class Database {
    private $conn;

    public function getConnection() {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=enrollment_db', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $exception) {
            die("Connection error: " . $exception->getMessage());
        }
        return $this->conn;
    }
}

class Student {
    private $conn;
    private $table = 'students';
    
    public $first_name;
    public $middle_name;
    public $last_name;
    public $birthdate;
    public $address;
    public $course;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $stmt = $this->conn->prepare("INSERT INTO $this->table 
            (first_name, middle_name, last_name, birthdate, address, course) 
            VALUES (:first_name, :middle_name, :last_name, :birthdate, :address, :course)");
        
        return $stmt->execute([
            ':first_name' => $this->first_name,
            ':middle_name' => $this->middle_name,
            ':last_name' => $this->last_name,
            ':birthdate' => $this->birthdate,
            ':address' => $this->address,
            ':course' => $this->course
        ]);
    }
}
?>
