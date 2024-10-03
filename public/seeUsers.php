
<?php include 'navbar.php'; ?>
<?php
session_start();
require_once '../config/connection.php';

// Ensure only admins can access this page
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: landing.php");
    exit();
}

// Fetch users with roles 'instructor' or 'user' and exclude 'admin'
$sql = "SELECT id, nom, prenom, email, spécialité, years_of_experience, role, created_at FROM users WHERE role != 'admin'";
$result = $conn->query($sql);

if (isset($_GET['delete'])) {
    $userId = $_GET['delete'];
    // Delete user from database
    $deleteSql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param('i', $userId);
    
    if ($stmt->execute()) {
        $_SESSION['user_deleted'] = "User deleted successfully!";
        header("Location: seeUsers.php"); // Refresh the page
        exit();
    } else {
        $_SESSION['user_deleted_error'] = "Error deleting user!";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - UmanCourse</title>
    <link rel="stylesheet" href="style/manageUsers.css">
</head>
<body>
<section class="message-section">
        <?php
        if (isset($_SESSION['user_deleted'])) {
            echo "<p class='success-message'>" . $_SESSION['user_deleted'] . "</p>";
            unset($_SESSION['user_deleted']);
        } elseif (isset($_SESSION['user_deleted_error'])) {
            echo "<p class='error-message'>" . $_SESSION['user_deleted_error'] . "</p>";
            unset($_SESSION['user_deleted_error']);
        }
        ?>
    </section>

    <!-- Display success or error message -->

    <!-- Users Table Section -->
    <section class="instructors-section">
    
        <div class="courses-table">
            <h2>Liste des Utilisateurs (Instructeurs et Utilisateurs)</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Spécialité</th>
                        <th>Années d'Expérience</th>
                        <th>Rôle</th>
                        <th>Date de Création</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['nom'] . "</td>";
                            echo "<td>" . $row['prenom'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['spécialité'] . "</td>";
                            echo "<td>" . $row['years_of_experience'] . "</td>";
                            echo "<td>" . $row['role'] . "</td>";
                            echo "<td>" . $row['created_at'] . "</td>";
                            echo "<td><a href='seeUsers.php?delete=" . $row['id'] . "' class='delete-btn'>Supprimer</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>Aucun utilisateur trouvé.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
