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
        <p>Support our cause by filling out the form below and making a donation. Your contribution will help make a difference.</p>

        <!-- Display success message if the form was submitted -->
        <?php if (isset($_POST['submit'])): ?>
            <div class="success-message">
                Thank you for your generous donation!
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <!-- Full Name -->
            <div class="form-group">
                <label for="nom">Full Name:</label>
                <input type="text" id="nom" name="nom" placeholder="Enter your full name" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required>
            </div>

            <!-- Phone Number -->
            <div class="form-group">
                <label for="tel">Phone Number (Tunisia +216):</label>
                <input type="tel" id="tel" name="tel" placeholder="+216" pattern="[0-9]{8}" required>
                <small>Phone number should be 8 digits long.</small>
            </div>

            <!-- Donation Amount -->
            <div class="form-group">
                <label for="montant">Donation Amount (in TND):</label>
                <input type="number" id="montant" name="montant" step="0.01" placeholder="Enter donation amount" required>
            </div>

            <!-- Recurring Donation Option -->
            <div class="form-group">
                <label for="recurring">Recurring Donation:</label>
                <select id="recurring" name="recurring">
                    <option value="one_time">One-Time Donation</option>
                    <option value="monthly">Monthly Donation</option>
                    <option value="yearly">Yearly Donation</option>
                </select>
            </div>

            <!-- Payment Method -->
            <div class="form-group">
                <label for="mode_paiement">Payment Method:</label>
                <select id="mode_paiement" name="mode_paiement" required>
                    <option value="carte_bancaire">Credit Card</option>
                    <option value="virement_bancaire">Bank Transfer</option>
                    <option value="pay_pal">PayPal</option>
                    <option value="especes">Cash</option>
                </select>
            </div>

            <!-- Message or Comment -->
            <div class="form-group">
                <label for="message">Message or Comment (Optional):</label>
                <textarea id="message" name="message" rows="4" placeholder="Leave a message or comment"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" name="submit" class="submit-btn">Make a Donation</button>
        </form>
    </div>

</body>
</html>
