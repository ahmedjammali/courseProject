<?php
require_once '../config/connection.php'; // Adjust path as needed
require_once '../app/models/Course.php'; // Include User model
require_once '../app/models/User.php'; // Include User model
class CourseDController {

private $courseModel;
private $userModel;

public function __construct() {
    global $conn;
    $this->courseModel = new Course($conn);
    $this->userModel = new User($conn); // Assuming you have a User model
}

public function courseDetail() {
    if (isset($_GET['id'])) {
        $courseId = $_GET['id'];
        
        // Fetch the course data
        $course = $this->courseModel->getCourseById($courseId);
        
        // Fetch the instructor data
        if ($course) {
            $instructorId = $course['instructor_id'];
            $instructor = $this->userModel->getUserById($instructorId);
            return ['course' => $course, 'instructor' => $instructor];
        }
        
        // Pass data to the view
        
    } else {
        echo "Course ID not provided.";
    }
}
}
?>