<html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MES RESULTATS</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link
        rel="stylesheet"
        href="https://cdjns.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body style="background: #fff;">

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
            <tbody>
                <tr>
                    <td rowspan="3" class="nom-concours">Santé</td>
                    <td>Culture générale</td>
                    <td>Ecrit</td>
                    <td>2</td>
                    <td>En attente</td>
                    <td rowspan="3">En attente</td>
                </tr>
                <tr>
                    <td>SVT</td>
                    <td>Ecrit</td>
                    <td>3</td>
                    <td>En attente</td>
                </tr>
                <tr class="separateur-bloc">
                    <td>Mathématiques</td>
                    <td>Ecrit</td>
                    <td>3</td>
                    <td>En attente</td>
                </tr>

                <tr>
                    <td rowspan="3" class="nom-concours">Education</td>
                    <td>Culture générale</td>
                    <td>Ecrit</td>
                    <td>2</td>
                    <td>En attente</td>
                    <td rowspan="3">En attente</td>
                </tr>
                <tr>
                    <td>SVT</td>
                    <td>Ecrit</td>
                    <td>3</td>
                    <td>En attente</td>
                </tr>
                <tr class="separateur-bloc">
                    <td>Mathématiques</td>
                    <td>Ecrit</td>
                    <td>3</td>
                    <td>En attente</td>
                </tr>

                <tr>
                    <td rowspan="3" class="nom-concours">Douanes</td>
                    <td>Culture générale</td>
                    <td>Ecrit</td>
                    <td>2</td>
                    <td>En attente</td>
                    <td rowspan="3">En attente</td>
                </tr>
                <tr>
                    <td>SVT</td>
                    <td>Ecrit</td>
                    <td>3</td>
                    <td>En attente</td>
                </tr>
                <tr class="separateur-bloc">
                    <td>Mathématiques</td>
                    <td>Ecrit</td>
                    <td>3</td>
                    <td>En attente</td>
                </tr>
            </tbody>
        </table>
        <div class="pagination">
            <button class="btn-suivant">
                Suivant <span class="fleche">→</span>
            </button>
        </div>
    </div>
    <!-- ===== FOOTER ===== -->
    <?php include("footer.php") ?>


</body>

</html>