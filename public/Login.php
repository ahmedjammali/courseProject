<?php include 'navbar.php'; ?>
<?php 
    require_once '../app/controllers/LoginController.php'; 

    // Instantiate the controller
    $loginController = new LoginController($conn);

    // Handle form submission and get potential error message
    $errorMessage = $loginController->login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Course Selling</title>
    <link rel="stylesheet" href="style/login.css">
</head>
<body>
    <main>
        <form action="" method="post">
            <h1>Login to Your Account</h1>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <!-- Display error message if login fails -->
            <?php if (!empty($errorMessage)): ?>
                <p style="color: red;"><?php echo $errorMessage; ?></p>
            <?php endif; ?>
            
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
        <p>Don't have an account? <a href="signUp.php">Sign up here</a></p>
    </main>

    <footer>
        <p>&copy; 2024 Course Selling Website</p>
    </footer>
</body>
</html>
