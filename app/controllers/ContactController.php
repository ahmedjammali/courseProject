<?php
require_once '../config/connection.php'; // Adjust path as needed
require_once '../app/models/contact.php'; // Include User model

class ContactController {

    private $contactModel;
    private $db;

    public function __construct() {
        global $conn; // Use the $conn from connection.php
        $this->contactModel = new Contact($conn);
    }

    public function submitForm() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Collect form data
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $formation = $_POST['formation'];

            // You can add validation here if necessary

            // Call the model to insert data into the database
            $result = $this->contactModel->insertContact($nom, $prenom, $email, $tel, $formation);

            if ($result) {
                // Redirect or show a success message
                header('Location: landing.php'); // or any other page you prefer
                exit();
            } else {
                // Show error message
                echo "There was an error submitting the form.";
            }
        }
    }

    // Method to load models
    
}
?>
