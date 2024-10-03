<?php include 'navbar.php'; ?>
<?php

error_reporting(E_ALL);          // Report all errors
ini_set('display_errors', 1);    // Display errors on the screen
require_once '../app/controllers/CoursesController.php';

// Create the controller instance
$controller = new CourseController();

// Call the index method to display courses
$courses=$controller->index();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Course Selling</title>
    <link rel="stylesheet" href="style/landing.css"> 
</head>
<body>
    

    <section class="hero">
        <div class="container">
            <h1>Forme-toi au digital. <br> Accélère ta carrière.</h1>
            <p>Des formations pour tous les niveaux qui te forment aux métiers d’aujourd’hui et de demain, <br> auprès d’instructeurs expérimentés.</p>
            <a href="#courses" class="btn">En savoir plus</a>
        </div>
    </section>

    <section class="info">
    <div class="container">
        <h2>Rejoins la formation qui correspond à tes besoins</h2>
        <p>Que tu souhaites t’initier à un domaine, accélérer ta carrière avec une certification internationale, ou changer de carrière, nous avons la formation faite pour toi.</p>
        <div class="info-highlights">
            <div class="highlight">50 à 350 heures</div>
            <div class="highlight">Cours en direct</div>
            <div class="highlight">En présentiel ou en ligne</div>
        </div>
    </div>
    </section>

    <?php
    if (isset($courses) && count($courses) > 0): ?>
    <section id="courses" class="courses-section">
        <div class="courses-container">
            <h2 class="courses-title">Most Enrolled Courses</h2>
            <div class="courses-card-wrapper">
                <?php foreach ($courses as $course): ?>
                    <div class="course-card">
                        <img src="<?php echo htmlspecialchars($course['path']); ?>" alt="<?php echo htmlspecialchars($course['course_name']); ?>" class="course-image">
                        <h3 class="course-title"><?php echo htmlspecialchars($course['course_name']); ?></h3>
                        <p class="course-description"><?php echo htmlspecialchars($course['course_description']); ?></p>
                        <a href="course_detail.php?id=<?php echo $course['id']; ?>" class="course-details-btn">See Course Details</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php else: ?>
    <p>No courses available at the moment.</p>
<?php endif; ?>

    <!-- Additional Section at the end of the page -->
<!-- Additional Section at the end of the page -->
<div class="instructors-section">
    <div class="instructors-content">
        <h2>Apprends avec des instructeurs qualifiés</h2>
        <p>En plus d’être des experts dans leur domaine, ce sont des mentors qui se focalisent sur les besoins de chaque étudiant.</p>
        <a href="contact.php" class="contact-us-btn">Contacter Nous</a>
    </div>
    <div class="instructors-image">
        <img src="imgs/ins.avif" alt="Instructors" class="instructor-photo">
    </div>
</div>





    <footer>
        <p>&copy; 2024 Course Selling Website</p>
    </footer>
</body>
</html>
