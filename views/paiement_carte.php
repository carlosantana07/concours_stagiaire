<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-CONCOURS - Finaliser l'inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        /* CSS intégré ci-dessous */
    </style>
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
                        <a class="payment-btn" href="paiement.php">
                            <img src="../assets/image/Orange-Money.jpg" alt="Orange Money" class="payment-logo">
                        </a>

                        <a class="payment-btn" href="paiement.php">
                            <img src="../assets/image/moov.png" alt="Moov Money" class="payment-logo">
                        </a>

                        <a class="payment-btn" href="paiement_carte.php">
                            <img src="../assets/image/carte bancaire.png" alt="Carte Bancaire" class="payment-logo">
                        </a>

                        <a class="payment-btn visa-btn" href="paiement_carte.php">
                            <img src="../assets/image/Visa.png" alt="Visa" class="payment-logo">
                        </a>
                    </div>

                    <form class="payment-form">
                        <div class="form-group">
                            <label class="form-label">Nom sur la carte</label>
                            <div>
                                <input type="text" class="input-wrapper" placeholder="TAO Luc">
                            </div>

                            <label class="form-label">Numéro de la carte</label>
                            <div>
                                <input type="text" class="input-wrapper" placeholder="0000 0000 0000 0000">
                            </div>
                            <div class="row">
                                <label class="form-label">Date d'expiration</label>
                                <div>
                                    <input type="text" class="input-wrapper" placeholder="MM/AA">
                                </div>

                                <label class="form-label">CVC / CVV</label>
                                <div>
                                    <input type="text" class="input-wrapper" placeholder="123456">
                                </div>
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
</body>

</html>