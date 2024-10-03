<?php
require_once '../config/connection.php';

class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function registerUser($first_name, $last_name, $email, $password) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT); 

        $sql = "INSERT INTO users (prenom, nom, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssss', $first_name, $last_name, $email, $password_hash);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function findUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); 
    }
    public function getUserById($userId) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); 
        } else {
            return null;
        }
    }
    
}
?>
