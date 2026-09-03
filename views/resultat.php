<html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MES RESULTATS</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="resultat-page">

    <!-- ===== HEADER ===== -->
    <?php include("header.php") ?>

    <div class="resultat-card">
        <h3 class="titre-page">Mes résultats</h3>

        <table>
            <thead>
                <tr>
                    <th>CONCOURS</th>
                    <th>EPREUVES</th>
                    <th>TYPE DE COMPOSITION</th>
                    <th>COEFFICIENTS</th>
                    <th>NOTES</th>
                    <th>STATUT</th>
                </tr>
            </thead>
            <tbody id="resultatsBody">
                
            </tbody>
        </table>
        <div class="pagination">
            <button class="btn-prev">← Précédent</button>
            <button class="btn-suivant">Suivant →</button>
        </div>
    </div>
    <!-- ===== FOOTER ===== -->
    <?php include("footer.php") ?>
    <script type="module">
        import CandidatController from "../controllers/CandidatController.js";

        document.addEventListener("DOMContentLoaded", () => {
            CandidatController.loadResultats();
            CandidatController.initPaginationResultats();
        });
    </script>


</body>

</html>