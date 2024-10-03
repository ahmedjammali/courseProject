<?php
// Include the model
require_once '../config/connection.php'; // Adjust path as needed
require_once '../app/models/Course.php'; // Include User model

class CourseController {

    private $courseModel;

    public function __construct() {
        global $conn; // Use the $conn from connection.php
        $this->courseModel = new Course($conn);
    }

    public function index() {
    
        $courses = $this->courseModel->getCourses();

        return $courses;

    }
}


    

