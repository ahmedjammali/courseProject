<?php include 'navbar.php'; ?>

<?php 
require_once '../config/connection.php';

// Ensure only admins can access this page
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: landing.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture form data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password
    $specialite = $_POST['specialite'];
    $years_of_experience = $_POST['years_of_experience'];

    // Insert the instructor into the database
    $sql = "INSERT INTO users (nom, prenom, email, password, role, spécialité, years_of_experience, created_at) 
            VALUES (?, ?, ?, ?, 'instructor', ?, ?, NOW())";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param('sssssi', $nom, $prenom, $email, $password, $specialite, $years_of_experience);

    if ($stmt->execute()) {
        // Set a session message to display success
        $_SESSION['instructor_added'] = "Instructor added successfully!";
        header("Location: addInstructor.php"); // Redirect to the same page to show the message
        exit();
    } else {
        $_SESSION['instructor_added_error'] = "Error adding instructor!";
        header("Location: addInstructor.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Instructeur - UmanCourse</title>
    <link rel="stylesheet" href="style/addIntructor.css">
</head>
<body>


    <!-- Display success or error message -->
    <section class="message-section">
        <?php
        if (isset($_SESSION['instructor_added'])) {
            echo "<p class='success-message'>" . $_SESSION['instructor_added'] . "</p>";
            unset($_SESSION['instructor_added']); // Clear the session message after displaying it
        } elseif (isset($_SESSION['instructor_added_error'])) {
            echo "<p class='error-message'>" . $_SESSION['instructor_added_error'] . "</p>";
            unset($_SESSION['instructor_added_error']); // Clear the session message after displaying it
        }
        ?>
    </section>

    <section class="contact-form-section">
        <h2>Ajouter un Instructeur</h2>
        <form method="POST">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="specialite">Spécialité</label>
                <input type="text" id="specialite" name="specialite" required>
            </div>
            <div class="form-group">
                <label for="years_of_experience">Années d'expérience</label>
                <input type="number" id="years_of_experience" name="years_of_experience" required>
            </div>
            <button type="submit" class="submit-btn">Ajouter Instructeur</button>
        </form>
    </section>
</body>
</html>
