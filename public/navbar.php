<?php 
session_start(); // Démarrer la session
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous - UmanCourse</title>
    <link rel="stylesheet" href="style/navbar.css"> 
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <li><a href="landing.php" style = "color : white ;" > <h1>Nature Keepers</h1> </a></li>
                <ul class="navbar">
                    
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <!-- Menu pour les administrateurs -->
                        <li><a href="seeCourses.php">Voir les cours</a></li>
                        <li><a href="addInstructor.php">Ajouter un instructeur</a></li>
                        <li><a href="seeUsers.php">Voir tous les utilisateurs</a></li>
                    <?php else: ?>
                        <!-- Menu pour les utilisateurs non-admin -->
                        <li><a href="landing.php">Accueil</a></li>

                        <li><a href="seeCourses.php">Donations</a></li>
                    <?php endif; ?>

                    <!-- Vérifiez si l'utilisateur est un instructeur pour afficher le lien d'ajout de cours -->

                        <li><a href="addCourse.php">Targeted Areas</a></li>
                        <li><a href="contact.php">Contact</a></li>

                    <!-- Vérification si l'utilisateur est connecté -->

                        <!-- L'utilisateur est connecté -->
                        
                        <!-- <li><a href="logout.php">Déconnexion</a></li> Lien de déconnexion -->


                        <!-- <li><a href="Login.php">Connexion</a></li>
                        <li><a href="signUp.php">Inscription</a></li> -->

                </ul>
            </div>
        </nav>
    </header>
</body>
</html>
