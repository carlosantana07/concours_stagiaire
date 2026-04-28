<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Paiement confirmé</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>

    <?php include("header.php"); ?>

    <div class="success-container">

        <div class="success-card">

            <div class="icon-success">
                <i class="fa-solid fa-circle-check"></i>
            </div>

            <div class="title">Paiement réussi</div>

            <p class="subtitle">
                Votre inscription a été validée avec succès.
            </p>

            <div class="summary-box">

                <h3 id="concoursNom">Chargement...</h3>

                <div class="summary-item">
                    <span>Montant payé</span>
                    <strong id="montant">-</strong>
                </div>

                <div class="summary-item">
                    <span>Date</span>
                    <strong id="datePaiement">-</strong>
                </div>

            </div>

            <div class="btn-group">

                <button id="downloadReceipt" class="btn-download">
                    <i class="fa-solid fa-download"></i>
                    Télécharger reçu
                </button>

                <a href="liste_concours.php" class="btn-primary">
                    Voir concours
                </a>

            </div>

        </div>

    </div>

    <?php include("footer.php"); ?>

    <script type="module">
        import PaymentConfirmController from "../controllers/PaymentConfirmController.js";

        PaymentConfirmController.init();
    </script>

</body>

</html>