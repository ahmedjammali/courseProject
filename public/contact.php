<?php include 'navbar.php'; ?>
<?php 
    require_once '../app/controllers/ContactController.php'; 

    // Instantiate the controller
    $contactController = new ContactController();

    // Handle form submission and get potential error message
    $errorMessage = $contactController->submitForm();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacter Nous</title>
    <link rel="stylesheet" href="style/contact.css">
</head>
<body>

    <!-- Contact Form Section -->
    <div class="contact-form-section">
        <h2>Contactez-nous</h2>
        <p>Remplissez le formulaire ci-dessous pour plus d'informations sur nos formations.</p>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="tel">Téléphone (Tunisie +216):</label>
                <input type="tel" id="tel" name="tel" placeholder="+216" pattern="[0-9]{8}" required>
            </div>

            <div class="form-group">
                <label for="formation">Formation Intéressée:</label>
                <select id="formation" name="formation" required>
                    <option value="web-dev">Développeur Web Full Stack</option>
                    <option value="data-science">Data Science</option>
                    <option value="cyber-security">Cyber Sécurité</option>
                    <option value="ai">Intelligence Artificielle</option>
                    <option value="ui-ux">Design UI/UX</option>
                </select>
            </div>

            <button type="submit" class="submit-btn">Envoyer</button>
        </form>
    </div>

</body>
</html>
