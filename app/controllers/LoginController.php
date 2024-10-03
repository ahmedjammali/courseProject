<?php
require_once '../app/models/User.php'; // Include the User model

class LoginController {
    private $userModel;

    public function __construct($dbConnection) {
        $this->userModel = new User($dbConnection);
    }

    public function login() {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
    
            // Attempt to find the user by email
            $user = $this->userModel->findUserByEmail($email);
            
            if ($user) {

                // Verify the password
                if (password_verify($password, $user['password'])) {
                    // Store user data in session
                    $_SESSION['user_id'] = $user['id']; // Store user ID in session
                    $_SESSION['email'] = $user['email']; // Store user email in session
                    $_SESSION['first_name'] = $user['prenom']; // Store first name in session
                    $_SESSION['last_name'] = $user['nom']; // Store last name in session
                    $_SESSION['role'] = $user['role']; // Store user role in session
                    
                    // Redirect to the landing page or dashboard based on the role
                    header("Location: landing.php"); // Adjust the path accordingly
                    exit();
                } else {
                    echo "Email or password is incorrect.";

                }
            } else {
                echo "Email or password is incorrect.";
            }
        }
    }
    
}

// Create an instance of the LoginController and call the login method
$loginController = new LoginController($conn);
$loginController->login();
?>
