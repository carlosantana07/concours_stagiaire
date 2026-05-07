<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-CONCOURS - Finaliser l'inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body style="background: #fff">
    <?php include("header.php") ?>
    <div class="container">

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
                        <a class="payment-btn" id="orange-btn">
                            <img src="../assets/image/Orange-Money.jpg" alt="Orange Money" class="payment-logo">
                        </a>

                        <a class="payment-btn" id="moov-btn">
                            <img src="../assets/image/moov.png" alt="Moov Money" class="payment-logo">
                        </a>
                    </div>

                    <form class="payment-form">
                        <div class="form-group">
                            <label class="form-label">Numéro de téléphone</label>
                            <div>
                                <input class="input-wrapper" placeholder="+226 xx xx xx xx">
                            </div>
                            <p class="form-hint" id="hint-text">Composez le code suivant sur votre numéro Orange Money
                                pour recevoir un OTP par SMS</p>
                            <p id="code-text" class="form-hint" style="font-weight: bold; text-align: center; color: black;">*144*4*6*800#</p>

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
                                <span id="concoursNom">Chargement...</span>
                            </h3>
                            <p class="concours-fee">
                                <span class="label">Frais du concours:</span>
                                <span id="concoursFrais">-</span>
                            </p>
                        </div>

                        <div class="total-row">
                            <span class="total-label">Total</span>
                            <span class="divider"></span>
                        </div>
                        <span class="total-amount" id="totalAmount">-</span>
                    </div>

                    <div class="security-info">
                        <p>
                            <i class="fa-solid fa-shield-halved"></i>
                            Vos informations de paiement sont traitées de manière sécurisée.
                            Nous ne stockons pas les détails de votre carte ou compte.
                        </p>
                    </div>
                </div>
            </div>
        </main>

    </div>
    <?php include("footer.php") ?>
    <script type="module">
        import PaymentController from "../controllers/PaymentController.js";
        PaymentController.init();
    </script>
</body>

</html>