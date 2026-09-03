<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Concours disponibles</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >
</head>

<body class="concours-page-body" style="padding-top: 80px;" >

    <?php include("header.php") ?>


    <!-- =====================================================
         EN-TÊTE DE PAGE
    ====================================================== -->

    <main class="concours-main">

        <div class="concours-heading">

            <div class="concours-heading-icon">
                <i class="fa-solid fa-clipboard-list"></i>
            </div>

            <div>

                <h1>
                    Concours disponibles
                </h1>

                <p>
                    Consultez les concours ouverts pour la session 2026
                    et choisissez celui qui correspond à votre profil.
                </p>

            </div>

        </div>


        <!-- =================================================
             CONTENU
        ================================================== -->

        <section class="concours-page">


            <!-- =============================================
                 LISTE DES CONCOURS
            ============================================== -->

            <div class="concours-content">

                <div class="concours-list-header">

                    <div>
                        <h2>
                            Liste des concours
                        </h2>

                        <p>
                            Découvrez les opportunités disponibles.
                        </p>
                    </div>

                </div>


                <!-- JS injecte les concours ici -->
                <div class="concours-list">
                </div>


                <!-- PAGINATION -->
                <div
                    id="pagination"
                    class="pagination"
                ></div>

            </div>


            <!-- =============================================
                 FILTRES
            ============================================== -->

            <aside class="filters">

                <div class="filters-header">

                    <div class="filters-icon">
                        <i class="fa-solid fa-filter"></i>
                    </div>

                    <div>
                        <h3>
                            Filtrer les concours
                        </h3>

                        <p>
                            Afficher par catégorie
                        </p>
                    </div>

                </div>


                <div class="filter-group">

                    <label for="categorieSelect">
                        Catégorie
                    </label>

                    <select
                        id="categorieSelect"
                        class="input"
                    >
                        <option value="">
                            Toutes les catégories
                        </option>
                    </select>

                </div>

            </aside>

        </section>

    </main>


    <?php include("footer.php") ?>


    <script type="module">

        import ConcoursController
            from "../controllers/ConcoursController.js";

        ConcoursController.init();

    </script>

</body>

</html>