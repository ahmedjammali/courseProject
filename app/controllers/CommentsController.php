<?php
require_once '../app/models/comment.php';
require_once '../config/connection.php'; 

class CommentController {
    private $commentModel;

    public function __construct() {
        global $conn; // Assuming $conn is initialized in connection.php
        $this->commentModel = new Comment($conn);
    }

    public function getCommentsForCourse() {

        if (isset($_GET['id'])) {
            $courseId = $_GET['id'];
            return $this->commentModel->getCommentsByCourseId($courseId);
    } else {
        echo "Course ID not provided.";
    }
    }

    public function addComment() {

        if (isset($_GET['id'])) {
            
            $courseId = isset($_GET['id']) ? $_GET['id'] : null;
            $userId = $_SESSION['user_id']; // Assuming user is logged in and ID is in session
            $commentText = $_POST['comment_text'];

            echo "Course ID: $courseId<br>";
            echo "User ID: $userId<br>";
            echo "Comment: $commentText<br>";

            if (!empty($commentText)) {
                $this->commentModel->addComment($courseId, $userId, $commentText);
                // Redirect back to the course page after comment is added
                header("Location: course_detail.php?id=$courseId");
                exit();
            } else {
                echo "Comment cannot be empty.";
            }
    } else {
        echo "Course ID not provided.";
    }
        }
    }
