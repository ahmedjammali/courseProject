<?php
require_once '../config/connection.php';

class Course {

    private $db;

    // Declare $conn property explicitly
    private $conn;

    // Constructor to initialize the connection
    public function __construct($db) {
        $this->conn = $db;  // Initialize the connection here
    }

    public function getCourses() {
        // Check if the connection is set
        if ($this->conn == null) {
            echo "Database connection not initialized.<br>";
            return [];
        }
    
        // Prepare the SQL query
        $sql = "SELECT * FROM courses";
        $result = $this->conn->query($sql);
    
        // Debug: Check if the query was successful
        if ($result === false) {
            echo "Error in query: " . $this->conn->error . "<br>";
            return [];
        }
    
        // Check if there are any courses
        if ($result->num_rows > 0) {
            // Fetch all courses and return them
            $courses = $result->fetch_all(MYSQLI_ASSOC);

            return $courses;
        } else {
            echo "No courses found in the database.<br>";
            return [];
        }
    }

    public function getCourseById($courseId) {
        $sql = "SELECT * FROM courses WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $courseId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Return a single course
        } else {
            return null;
        }
    }
} 