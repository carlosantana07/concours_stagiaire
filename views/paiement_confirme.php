<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-CONCOURS - Paiement confirmé</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="payment-confirm-page">

    <?php include("header.php"); ?>

    <main class="payment-confirm-main">

        <div class="payment-confirm-container">

            <section class="payment-confirm-card">

                <div class="payment-confirm-icon">
                    <i class="fa-solid fa-circle-check"></i>
                </div>

                <span class="payment-confirm-eyebrow">
                    Confirmation de paiement
                </span>

                <h1 class="payment-confirm-title">
                    Paiement réussi
                </h1>

                <p class="payment-confirm-subtitle">
                    Votre inscription a été validée avec succès.
                </p>

                <div class="payment-confirm-summary">

                    <div class="payment-confirm-summary-header">
                        <div class="payment-confirm-summary-icon">
                            <i class="fa-solid fa-receipt"></i>
                        </div>

                        <div>
                            <span>
                                Récapitulatif
                            </span>

                            <strong id="concoursNom">
                                Chargement...
                            </strong>
                        </div>
                    </div>

                    <div class="payment-confirm-summary-content">

                        <div class="payment-confirm-item">
                            <span>
                                Montant payé
                            </span>

                            <strong id="montant">
                                -
                            </strong>
                        </div>

                        <div class="payment-confirm-item">
                            <span>
                                Date
                            </span>

                            <strong id="datePaiement">
                                -
                            </strong>
                        </div>

                    </div>

                </div>

                <p id="paymentMessage"
                   class="payment-confirm-message">
                </p>

                <div class="payment-confirm-actions">

                    <button
                        id="downloadReceipt"
                        class="payment-confirm-download"
                        type="button">

                        <i class="fa-solid fa-download"></i>

                        <span>
                            Télécharger le reçu
                        </span>

                    </button>

                    <a
                        href="liste_concours.php"
                        class="payment-confirm-concours">

                        <span>
                            Voir les concours
                        </span>

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

                <div class="payment-confirm-security">

                    <i class="fa-solid fa-shield-halved"></i>

                    <span>
                        Votre paiement a été traité de manière sécurisée.
                    </span>

                </div>

            </section>

        </div>

    </main>

    <?php include("footer.php"); ?>

    <script type="module">
        import PaymentConfirmController
            from "../controllers/PaymentConfirmController.js";

        PaymentConfirmController.init();
    </script>

</body>

</html>