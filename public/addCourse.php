<?php include 'navbar.php'; ?>

<?php
session_start();


if ($_SESSION['role'] !== 'instructor') {
    echo "Vous devez être un instructeur pour ajouter un cours.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once '../config/connection.php';


    $courseName = $_POST['course_name'];
    $courseDescription = $_POST['course_description'];
    $instructorId = $_SESSION['user_id'];

    $targetDir = "imgs/";
    $imageFileName = basename($_FILES["course_image"]["name"]);
    $targetFilePath = $targetDir . $imageFileName;


    if (move_uploaded_file($_FILES["course_image"]["tmp_name"], $targetFilePath)) {

        $sql = "INSERT INTO courses (course_name, course_description, instructor_id, path) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssis', $courseName, $courseDescription, $instructorId, $targetFilePath);
        
        if ($stmt->execute()) {
            header("Location: landing.php");
        } else {
            echo "Erreur lors de l'ajout du cours : " . $stmt->error;
        }
    } else {
        echo "Erreur lors du téléchargement de l'image.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un cours</title>
    <link rel="stylesheet" href="style/addCourse.css"> 
</head>
<body>
    <div class="contact-form-section">
        <h2>Ajouter un cours</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="course_name">Nom du cours</label>
                <input type="text" name="course_name" id="course_name" required>
            </div>
            
            <div class="form-group">
                <label for="course_description">Description du cours</label>
                <textarea name="course_description" id="course_description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="course_image">Image du cours</label>
                <input type="file" name="course_image" id="course_image" accept="image/*" required>
            </div>
            
            <button type="submit" class="submit-btn">Ajouter le cours</button>
        </form>
    </div>
</body>
</html>
