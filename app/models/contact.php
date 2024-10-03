<?php
require_once '../config/connection.php';

class Contact {

    private $db;

    // Declare $conn property explicitly
    private $conn;

    // Constructor to initialize the connection
    public function __construct($db) {
        $this->conn = $db;  // Initialize the connection here
    }

    public function insertContact($nom, $prenom, $email, $tel, $formation) {
        // Prepare the SQL query
        $sql = "INSERT INTO contact_messages (nom, prenom, email, tel, formation,  submitted_at	) VALUES (?, ?, ?, ?, ?, NOW())";

        // Prepare the statement
        $stmt = $this->conn->prepare($sql);

        // Bind parameters
        $stmt->bind_param('sssss', $nom, $prenom, $email, $tel, $formation);

        // Execute the query and return the result
        return $stmt->execute();
    }
}
?>
