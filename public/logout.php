<?php
session_start(); // Start the session
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session
header("Location: landing.php"); // Redirect to landing page after logout
exit();
?>