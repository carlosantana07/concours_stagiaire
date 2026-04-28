<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des concours</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <!-- ===== HEADER ===== -->
    <?php include("header.php") ?>
    <h1 style="margin: 40px; font-family: Arial, sans-serif;"><strong>Liste des concours session 2026</strong></h1>
    <section class="concours-page" style="background:#F9FAFB; display:flex; gap:20px; padding:20px;">
        

        <!-- COLONNE GAUCHE (DYNAMIQUE) -->
        <div class="concours-list">
            <!-- JS va injecter les concours ici -->
        </div>


        <!-- COLONNE DROITE (STATIQUE) -->
        <aside class="filters">

            <h3>Afficher par catégorie</h3>
            <select id="categorieSelect" class="input" style="width: 100%;">
                <option value="">Toutes les catégories</option>
            </select>

        </aside>


    </section>
    <div id="pagination" class="pagination"></div>

    <!-- ===== FOOTER ===== -->
    <?php include("footer.php") ?>
    <script type="module">
        import ConcoursController from "../controllers/ConcoursController.js";

        ConcoursController.init();
    </script>

</body>

</html>