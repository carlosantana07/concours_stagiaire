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

    <section class="concours-page" style="background:#F9FAFB;">

        <!-- COLONNE GAUCHE (2/3) -->
        <div class="concours-list">

            <!-- CARTE CONCOURS -->
            <div class="concours-card">
                <h2 id="nom"></h2>

                <div class="concours-footer">
                    <div class="infos">
                        <span id="date_debut"><i class="fa-solid fa-calendar-days"></i></span>
                        <span id="nombre_postes"><i class="fa-solid fa-users"></i></span>
                    </div>

                    <a href="detail_concours.php" class="btn-primary">Voir détails</a>
                </div>
            </div>

            <div class="concours-card">
                <h2>Enseignants du secondaire</h2>

                <div class="concours-footer">
                    <div class="infos">
                        <span><i class="fa-solid fa-calendar-days"></i> : 20 Novembre 2026</span>
                        <span><i class="fa-solid fa-users"></i> : 300 postes</span>
                    </div>

                    <button class="btn-primary">Voir détails</button>
                </div>
            </div>

            <div class="concours-card">
                <h2>Police Nationale</h2>

                <div class="concours-footer">
                    <div class="infos">
                        <span><i class="fa-solid fa-calendar-days"></i> : 12 Octobre 2026</span>
                        <span><i class="fa-solid fa-users"></i> : 150 postes</span>
                    </div>

                    <button class="btn-primary">Voir détails</button>
                </div>
            </div>

            <div class="concours-card">
                <h2>Gendarmerie Nationale</h2>

                <div class="concours-footer">
                    <div class="infos">
                        <span><i class="fa-solid fa-calendar-days"></i> : 20 Novembre 2026</span>
                        <span><i class="fa-solid fa-users"></i> : 300 postes</span>
                    </div>

                    <button class="btn-primary">Voir détails</button>
                </div>
            </div>

            <div class="concours-card">
                <h2>Agents des eaux et forêts</h2>

                <div class="concours-footer">
                    <div class="infos">
                        <span><i class="fa-solid fa-calendar-days"></i> : 12 Octobre 2026</span>
                        <span><i class="fa-solid fa-users"></i> : 150 postes</span>
                    </div>

                    <button class="btn-primary">Voir détails</button>
                </div>
            </div>

            <div class="concours-card">
                <h2>Assistants de direction</h2>

                <div class="concours-footer">
                    <div class="infos">
                        <span><i class="fa-solid fa-calendar-days" style="color: #0c0a93"></i> : 20 Novembre 2026</span>
                        <span><i class="fa-solid fa-users"></i> : 300 postes</span>
                    </div>

                    <button class="btn-primary">Voir détails</button>
                </div>
            </div>

        </div>

        <!-- COLONNE DROITE (1/3) -->
        <aside class="filters" style="width: 25%;">

            <h3>Rechercher</h3>
            <input type="text" placeholder="Nom du concours..." class="input">

            <h3>Ministère / Institution</h3>
            <select class="input">
                <option>Choisir...</option>
                <option>Santé</option>
                <option>Education</option>
            </select>

            <h3>Niveau académique</h3>
            <div class="checkbox-group">
                <label><input type="checkbox"> BEPC</label>
                <label><input type="checkbox"> BAC</label>
                <label><input type="checkbox"> Licence</label>
                <label><input type="checkbox"> Master</label>
            </div>

            <button class="btn-primary" style="width: 50%;">Rechercher</button>

        </aside>

    </section>x

    <!-- ===== FOOTER ===== -->
    <?php include("footer.php") ?>

</body>
<script>
    fetch("http://localhost:4000/api/concours")
        .then(res => res.json())
        .then(data => {

            const concours = data; // si tableau
            console.log(concours);

            document.getElementById("nom").innerText = concours.nom;
            document.getElementById("date_debut").innerText = concours.date_debut;
            document.getElementById("nombre_postes").innerText = concours.nombre_postes + " postes";

        })
        .catch(err => console.log(err));
</script>

</html>