<?php
// public/signUp.php
require_once '../app/controllers/SignupController.php'; // Adjust path

$controller = new UserController();
$controller->register();
?>
<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Course Selling</title>
    <link rel="stylesheet" href="style/signUp.css">
</head>
<body>


    <main>
        <form action="" method="post">
        <h1>Créer un nouveau compte</h1>
            <div>
                <label for="first_name">Prénom:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div>
                <label for="last_name">Nom:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <button type="submit">S'inscrire</button>
            </div>
        </form>
        <p>Vous avez déjà un compte ? <a href="Login.php">Connectez-vous ici</a></p>
    </main>

    <footer>
        <p>&copy; 2024 Course Selling Website</p>
    </footer>
</body>
</html>
