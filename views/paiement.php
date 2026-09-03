<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-CONCOURS - Finaliser l'inscription</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet"
        href="../assets/css/style.css">
</head>

<body class="payment-page">

    <?php include("header.php") ?>


    <main class="payment-main">

        <div class="payment-container">

            <!-- ========================= -->
            <!-- EN-TÊTE -->
            <!-- ========================= -->

            <div class="payment-heading">

                <div class="payment-heading-icon">
                    <i class="fa-solid fa-credit-card"></i>
                </div>

                <div>
                    <span class="payment-eyebrow">
                        Dernière étape
                    </span>


                    <p>
                        Choisissez votre méthode de paiement pour finaliser
                        votre inscription au concours.
                    </p>
                </div>

            </div>


            <!-- ========================= -->
            <!-- CONTENU -->
            <!-- ========================= -->

            <div class="payment-layout">


                <!-- ========================= -->
                <!-- PAIEMENT -->
                <!-- ========================= -->

                <section class="payment-card">

                    <div class="payment-card-header">

                        <div class="payment-section-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>

                        <div>
                            <h2>
                                Moyen de paiement
                            </h2>

                            <p>
                                Sélectionnez votre opérateur mobile.
                            </p>
                        </div>

                    </div>


                    <!-- MOYENS DE PAIEMENT -->

                    <div class="payment-methods">

                        <a class="payment-btn"
                            id="orange-btn">

                            <img
                                src="../assets/image/Orange-Money.jpg"
                                alt="Orange Money"
                                class="payment-logo">

                        </a>


                        <a class="payment-btn"
                            id="moov-btn">

                            <img
                                src="../assets/image/moov.png"
                                alt="Moov Money"
                                class="payment-logo">

                        </a>

                    </div>


                    <!-- FORMULAIRE -->

                    <form class="payment-form">

                        <div class="form-group">

                            <label class="form-label">
                                Numéro de téléphone
                            </label>

                            <div class="phone-input">

                                <i class="fa-solid fa-mobile-screen-button"></i>

                                <input
                                    class="input-wrapper"
                                    placeholder="+226 xx xx xx xx">

                            </div>


                            <p class="form-hint"
                                id="hint-text">

                                Composez le code suivant sur votre numéro
                                Orange Money pour recevoir un OTP par SMS

                            </p>


                            <p id="code-text"
                                class="payment-code">

                                *144*4*6*800#

                            </p>

                        </div>


                        <!-- OTP -->

                        <div class="otp-section">

                            <p class="otp-info">
                                Saisissez le code à 6 chiffres reçu par SMS
                            </p>


                            <div class="otp-inputs">

                                <input
                                    type="text"
                                    maxlength="1"
                                    class="otp-input">

                                <input
                                    type="text"
                                    maxlength="1"
                                    class="otp-input">

                                <input
                                    type="text"
                                    maxlength="1"
                                    class="otp-input">

                                <input
                                    type="text"
                                    maxlength="1"
                                    class="otp-input">

                                <input
                                    type="text"
                                    maxlength="1"
                                    class="otp-input">

                                <input
                                    type="text"
                                    maxlength="1"
                                    class="otp-input">

                            </div>

                        </div>


                        <p id="paymentMessage"
                            class="form-message">
                        </p>


                        <!-- BOUTON PAIEMENT -->

                        <button
                            type="submit"
                            class="btn-pay">

                            <i class="fa-solid fa-lock"></i>

                            <span>
                                Payer 800 FCFA
                            </span>

                            <i class="fa-solid fa-arrow-right"></i>

                        </button>


                        <div class="security-badge">

                            <i class="fa-solid fa-shield-check"></i>

                            <span>
                                Paiement 100% sécurisé et chiffré
                            </span>

                        </div>

                    </form>

                </section>


                <!-- ========================= -->
                <!-- RÉCAPITULATIF -->
                <!-- ========================= -->

                <aside class="summary-card">

                    <div class="summary-header">

                        <div class="summary-icon">
                            <i class="fa-solid fa-receipt"></i>
                        </div>

                        <div>
                            <h2>
                                Récapitulatif
                            </h2>

                            <p>
                                Votre inscription
                            </p>
                        </div>

                    </div>


                    <div class="summary-content">

                        <div class="summary-item">

                            <span class="summary-label">
                                Concours
                            </span>

                            <strong
                                class="summary-value concours-name"
                                id="concoursNom">

                                Chargement...

                            </strong>

                        </div>


                        <div class="summary-item">

                            <span class="summary-label">
                                Frais du concours
                            </span>

                            <strong
                                class="summary-value"
                                id="concoursFrais">

                                -

                            </strong>

                        </div>


                        <div class="summary-total">

                            <span>
                                Total à payer
                            </span>

                            <strong id="totalAmount">
                                -
                            </strong>

                        </div>

                    </div>


                    <div class="security-info">

                        <i class="fa-solid fa-shield-halved"></i>

                        <p>
                            Vos informations de paiement sont traitées
                            de manière sécurisée. Nous ne stockons pas
                            les détails de votre compte.
                        </p>

                    </div>

                </aside>

            </div>

        </div>

    </main>


    <?php include("footer.php") ?>


    <script type="module">
        import PaymentController
        from "../controllers/PaymentController.js";

        PaymentController.init();
    </script>

</body>

</html>