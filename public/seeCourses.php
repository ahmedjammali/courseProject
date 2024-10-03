<?php include 'navbar.php'; ?>
<?php
session_start();
error_reporting(E_ALL); // Show all errors
ini_set('display_errors', 1); // Display errors

// Include your database connection file
require_once '../config/connection.php';

// Fetch the courses and instructor details
$query = "SELECT c.id, c.course_name, c.course_description, c.instructor_id, c.path, u.prenom AS instructor_first_name, u.nom AS instructor_last_name
          FROM courses c
          JOIN users u ON c.instructor_id = u.id";
$result = mysqli_query($conn, $query);

// Check if there are any courses
if (!$result) {
    echo "Error: " . mysqli_error($conn); // Show error if query fails
}
$courses = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Handle delete request
if (isset($_GET['delete_course_id'])) {
    $course_id = $_GET['delete_course_id'];
    $delete_query = "DELETE FROM courses WHERE id = $course_id";
    if (mysqli_query($conn, $delete_query)) {
        // Set success message in session
        $_SESSION['course_deleted'] = "Course deleted successfully.";
        header("Location: seeCourses.php"); // Redirect to the same page after deletion
        exit();
    } else {
        echo "<p>Error deleting course: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voir les Cours - UmanCourse</title>
    <link rel="stylesheet" href="style/seeCourse.css"> 
</head>
<body>
<h2 style="display: flex; align-items: center; justify-content: center; text-align: center; width: 100%;">Nos Formations</h2>

<!-- Display success message if course was deleted -->
<?php
if (isset($_SESSION['course_deleted'])) {
    echo "<p class='success-message'>" . $_SESSION['course_deleted'] . "</p>";
    unset($_SESSION['course_deleted']);
}
?>

<div class="instructors-section">
    <div class="courses-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom du Cours</th>
                    <th>Description</th>
                    <th>Instructeur</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($courses)): ?>
                    <?php foreach ($courses as $course): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($course['id']); ?></td>
                            <td><?php echo htmlspecialchars($course['course_name']); ?></td>
                            <td><?php echo htmlspecialchars($course['course_description']); ?></td>
                            <td><?php echo htmlspecialchars($course['instructor_first_name']) . ' ' . htmlspecialchars($course['instructor_last_name']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($course['path']); ?>" alt="Course Image" width="100"></td>
                            <td>
                                <a href="seeCourses.php?delete_course_id=<?php echo htmlspecialchars($course['id']); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours?');">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Aucun cours disponible.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
