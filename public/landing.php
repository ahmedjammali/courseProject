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
            <h1>Act for the planet.<br> Preserve nature.</h1>
            <p>Be part of an engaged community, rewarded for its efforts, and guided by passionate mentors for a cleaner, greener world. <br>Join real-world actions to clean natural spaces and make a difference today.</p>
            <a href="#courses" class="btn">En savoir plus</a>
        </div>
    </section>

    <section class="info">
    <div class="container">
        <h2>Join the movement that fits your passion.</h2>
        <p>Whether you want to start making a difference, earn rewards for your environmental efforts, or take your sustainability actions to the next level, we have the perfect opportunity for you.

</p>
        <div class="info-highlights">
            <div class="highlight">Over 100+ places cleaned</div>
            <div class="highlight">Impact-driven actions</div>
            <div class="highlight">Join our 500+ members</div>
        </div>
    </div>
    </section>

    <?php
    if (isset($courses) && count($courses) > 0): ?>
    <section id="courses" class="courses-section">
        <div class="courses-container">
            <h2 class="courses-title">Recent Achievements</h2>
            <div class="courses-card-wrapper">
                <?php foreach ($courses as $course): ?>
                    <div class="course-card">
                        <img src="<?php echo htmlspecialchars($course['path']); ?>" alt="<?php echo htmlspecialchars($course['course_name']); ?>" class="course-image">
                        <h3 class="course-title"><?php echo htmlspecialchars($course['course_name']); ?></h3>
                        <p class="course-description"><?php echo htmlspecialchars($course['course_description']); ?></p>
                        <a href="course_detail.php?id=<?php echo $course['id']; ?>" class="course-details-btn">See Details</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php else: ?>

<?php endif; ?>

    <!-- Additional Section at the end of the page -->
    <!-- Additional Section at the end of the page -->
    <div class="instructors-section">
    <div class="instructors-content">
        <h2>Get In Touch with Us</h2>
        <p>If you have any questions, suggestions, or would like to collaborate in cleaning up natural spaces, we’re here to help! Let’s work together to create a cleaner and greener environment.</p>
        <a href="contact.php" class="contact-us-btn">Contact Us</a>
    </div>
    <div class="instructors-image">
        <img src="imgs/cleaning.png" alt="Nature Keepers" class="instructor-photo">
    </div>
</div>







    <footer>
        <p>GAIA &copy; 2024 </p>
    </footer>
</body>
</html>
