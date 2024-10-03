<?php
require_once '../config/connection.php';

class Comment {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCommentsByCourseId($courseId) {
        $sql = "SELECT c.comment_text, c.created_at, u.nom, u.prenom 
                FROM comments c
                JOIN users u ON c.user_id = u.id
                WHERE c.course_id = ?";
                
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('i', $courseId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function addComment($courseId, $userId, $commentText) {
        $sql = "INSERT INTO comments (course_id, user_id, comment_text, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iis', $courseId, $userId, $commentText);
        return $stmt->execute();
    }
}
