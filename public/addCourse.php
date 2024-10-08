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
     
</head>
<body>
    
<div style = "display : flex ; justify-content : center ;  ">

<section id="courses" class="courses-section" style = "width : 80%" >
    <div class="courses-container" style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 20px; padding: 0 20px;">
        <h2 class="courses-title" style="width: 100%; text-align: center; margin-top: 40px ; margin-botton : 30px ">Targeted Areas</h2>

        <div class="courses-card-wrapper" style="flex: 1 1 30%; max-width: 30%; display: flex; justify-content: center;">
            <div class="course-card" style="border: 1px solid #ddd; padding: 15px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                <img src="imgs/dirty.jpg" alt="" class="course-image" style="width: 100%; border-radius: 5px; height: auto;">
                <h3 class="course-title" style="text-align: center; margin: 15px 0; font-size: 1.2rem;">KRAM</h3>
                <p class="course-description" style="text-align: center; font-size: 1rem; color: #555;">The ground is strewn with remnants of industrial waste, including plastic debris, discarded machinery parts, and hazardous materials that have accumulated over time.</p>
            </div>
        </div>

        <div class="courses-card-wrapper" style="flex: 1 1 30%; max-width: 30%; display: flex; justify-content: center;">
            <div class="course-card" style="border: 1px solid #ddd; padding: 15px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                <img src="imgs/dirty2.avif" alt="" class="course-image" style="width: 100%; border-radius: 5px; height: auto;">
                <h3 class="course-title" style="text-align: center; margin: 15px 0; font-size: 1.2rem;">Chat Mariem</h3>
                <p class="course-description" style="text-align: center; font-size: 1rem; color: #555;">The ground is strewn with remnants of industrial waste, including plastic debris, discarded machinery parts, and hazardous materials that have accumulated over time.</p>
            </div>
        </div>

        <div class="courses-card-wrapper" style="flex: 1 1 30%; max-width: 30%; display: flex; justify-content: center;">
            <div class="course-card" style="border: 1px solid #ddd; padding: 15px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                <img src="imgs/dirty3.jpg" alt="" class="course-image" style="width: 100%; border-radius: 5px; height: auto;">
                <h3 class="course-title" style="text-align: center; margin: 15px 0; font-size: 1.2rem;">Mount Nahli</h3>
                <p class="course-description" style="text-align: center; font-size: 1rem; color: #555;">The ground is strewn with remnants of industrial waste, including plastic debris, discarded machinery parts, and hazardous materials that have accumulated over time.</p>
            </div>
        </div>

        <div class="courses-card-wrapper" style="flex: 1 1 30%; max-width: 30%; display: flex; justify-content: center; margin-top : 30px">
            <div class="course-card" style="border: 1px solid #ddd; padding: 15px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                <img src="imgs/dirty4.webp" alt="" class="course-image" style="width: 100%; border-radius: 5px; height: auto;">
                <h3 class="course-title" style="text-align: center; margin: 15px 0; font-size: 1.2rem;">Raoued</h3>
                <p class="course-description" style="text-align: center; font-size: 1rem; color: #555;">The ground is strewn with remnants of industrial waste, including plastic debris, discarded machinery parts, and hazardous materials that have accumulated over time.</p>
            </div>
        </div>
    </div>
</section>


</div>
 







<div style = "display : flex ; justify-content : center ;  ">
    <footer style = "margin-top : 60px" >
            <p>&copy; 2024 </p>
        </footer>
    </div>
    
</body>
</html>

