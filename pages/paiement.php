<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-CONCOURS - Finaliser l'inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        /* CSS intégré ci-dessous */
    </style>
</head>

<body>
    <div class="container">
        <?php include("header.php") ?>

        <main class="main-content">
            <div class="payment-section">

                <div class="section-header">
                    <h1 class="title">Finaliser l'inscription</h1>
                    <p class="subtitle">Choisissez votre méthode de paiement sécurisée</p>
                </div>

                <div class="payment-card">
                    <div class="payment-header">
                        <i class="fa-solid fa-shield-halved" style="color: #07b544;"></i>
                        <h2 class="payment-title">Moyen de paiement</h2>
                    </div>

                    <div class="payment-methods">
                        <button class="payment-btn">
                            <img src="../assets/image/Orange-Money.jpg" alt="Orange Money" class="payment-logo">
                        </button>

                        <button class="payment-btn">
                            <img src="../assets/image/moov.png" alt="Moov Money" class="payment-logo">
                        </button>

                        <button class="payment-btn">
                            <img src="../assets/image/carte bancaire.png" alt="Carte Bancaire" class="payment-logo">
                        </button>

                        <button class="payment-btn visa-btn">
                            <img src="../assets/image/Visa.png" alt="Visa" class="payment-logo">
                        </button>
                    </div>

                    <div class="security-badge">
                        <img src="https://cdn-icons-png.flaticon.com/512/2913/2913133.png" alt="sécurité" class="badge-icon">
                        <span>Paiement 100% sécurisé et chiffré</span>
                    </div>

                    <form class="payment-form">
                        <div class="form-group">
                            <label class="form-label">Numéro de téléphone</label>
                            <div class="input-wrapper">
                                <span class="phone-placeholder">+226 xx xx xx xx</span>
                            </div>
                            <p class="form-hint">Composez le code suivant sur votre numéro Orange Money
                                pour recevoir un OTP par SMS</p>
                            <p class="form-hint" style="font-weight: bold; text-align: center; color: black;">*144*4*6*800#</p>

                        </div>

                        <div class="otp-section">
    
                            <div class="otp-inputs">
                                <p class="otp-info">Saisissez le code à 6 chiffres reçu par SMS</p>
                                <input type="text" maxlength="1" class="otp-input">
                                <input type="text" maxlength="1" class="otp-input">
                                <input type="text" maxlength="1" class="otp-input">
                                <input type="text" maxlength="1" class="otp-input">
                                <input type="text" maxlength="1" class="otp-input">
                                <input type="text" maxlength="1" class="otp-input">
                            </div>

                            
                        </div>

                        <button type="submit" class="btn-pay">
                            <i class="fa-solid fa-lock"></i>
                            <span>Payer 800 FCFA</span>
                        </button>

                        <div class="security-badge">
                            <i class="fa-solid fa-lock"></i>
                            <span>Paiement 100% sécurisé et chiffré</span>
                        </div>
                    </form>
                </div>

                <!-- Récapitulatif -->
                <div class="summary-card">
                    <h2 class="summary-title">Récapitulatif du concours</h2>

                    <div class="summary-content">
                        <div class="summary-item">
                            <h3 class="concours-name">
                                <span class="label">Concours:</span>
                                Inspecteur des douanes
                            </h3>
                            <p class="concours-fee">
                                <span class="label">Frais du concours:</span>
                                800 FCFA
                            </p>
                        </div>

                        <div class="total-row">
                            <span class="total-label">Total</span>
                            <span class="divider"></span>
                        </div>
                        <span class="total-amount">800 FCFA</span>
                    </div>

                    <div class="security-info">
                        <i class="fa-solid fa-shield-halved"></i>
                        <p class="security-text">
                            Vos informations de paiement sont traitées de manière sécurisée.
                            Nous ne stockons pas les détails de votre carte ou compte.
                        </p>
                    </div>
                </div>
            </div>
        </main>
        <?php include("footer.php") ?>
    </div>
</body>

</html>