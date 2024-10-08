<?php include 'navbar.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make a Donation</title>
    <link rel="stylesheet" href="style/contact.css">
</head>
<body>

    <!-- Donation Form Section -->
    <div class="contact-form-section">
        <h2>Make a Donation</h2>
        <p>Fill out the form below to support our cause and make a donation.</p>
        <form action="" method="POST">
            <div class="form-group">
                <label for="nom">Full Name:</label>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="tel">Phone Number (Tunisia +216):</label>
                <input type="tel" id="tel" name="tel" placeholder="+216" pattern="[0-9]{8}" required>
            </div>

            <div class="form-group">
                <label for="montant">Donation Amount (in TND):</label>
                <input type="number" id="montant" name="montant" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="mode_paiement">Payment Method:</label>
                <select id="mode_paiement" name="mode_paiement" required>
                    <option value="carte_bancaire">Credit Card</option>
                    <option value="virement_bancaire">Bank Transfer</option>
                    <option value="pay_pal">PayPal</option>
                    <option value="especes">Cash</option>
                </select>
            </div>

            <!-- Textarea for Donation Message -->
            <div class="form-group">
                <label for="message">Message or Comment (Optional):</label>
                <textarea id="message" name="message" rows="4" style = "width : 100%"></textarea>
            </div>

            <button type="submit" class="submit-btn">Make a Donation</button>
        </form>
    </div>

</body>
</html>

