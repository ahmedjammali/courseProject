<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../config/connection.php'; // Adjust path as needed
require_once '../app/models/User.php'; // Include User model

class UserController {
    private $userModel;

    public function __construct() {
        global $conn; // Use the $conn from connection.php
        $this->userModel = new User($conn);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->registerUser($first_name, $last_name, $email, $password)) {
                echo "User registered successfully!";
                header('Location: Login.php');
            } else {
                echo "Error in registration!";
            }
        }
    }
}


?>
