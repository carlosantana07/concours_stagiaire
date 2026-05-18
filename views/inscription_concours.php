<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-CONCOURS - Inscription</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <?php include("header.php") ?>

    <main class="page">
        <div class="page-container">

            <div class="intro-text">
                <p>Veuillez renseigner avec soin le formulaire et cliquer sur le bouton "Suivant".</p>
            </div>

            <form class="page-form" id="formInscription">

                <!-- INFORMATIONS CONCOURS -->
                <section class="page-card">
                    <h2 class="section-title">Informations du concours</h2>
                    <div class="form-group">
                        <div id="nomConcours" class="concours-name-display">Chargement...</div>
                    </div>
                    <div class="form-group">
                        <label>Centre de composition <span class="required">(obligatoire)</span></label>
                        <select class="input" name="centre" required>
                            <option value="">Choisir un centre</option>
                        </select>
                    </div>
                </section>

                <!-- DIPLOME -->
                <section class="page-card">
                    <h2 class="section-title">Diplôme</h2>

                    <div class="form-group">
                        <label>Etablissement <span class="required">(obligatoire)</span></label>
                        <input type="text" class="input" name="etablissement" placeholder="Nom de l'établissement" required>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label>Référence diplôme</label>
                            <input type="text" class="input" name="reference_diplome" placeholder="Référence">
                        </div>
                        <div class="form-group">
                            <label>Année d'obtention</label>
                            <input type="number" class="input" name="annee_obtention" min="1900" max="2100" placeholder="ex: 2020">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Niveau d'étude</label>
                        <input type="text" class="input" name="niveau_etude" placeholder="ex: Licence, Master...">
                    </div>

                    <div class="form-group">
                        <label>Copie du diplôme <span class="required">(obligatoire)</span></label>
                        <div class="upload-zone" id="upload-diplome">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <p>Glissez votre fichier ici ou <span>cliquez pour parcourir</span></p>
                            <small>PDF, JPG, PNG — max 2 Mo</small>
                            <input type="file" name="diplome_file" accept=".pdf,.jpg,.jpeg,.png" hidden>
                        </div>
                    </div>

                </section>

                <p id="inscriptionMessage" class="form-message"></p>

                <!-- ACTIONS -->
                <div class="form-actions">
                    <a href="liste_concours.php" class="btn btn-secondary1">Annuler</a>
                    <button type="submit" class="btn btn-primary">Suivant</button>
                </div>

            </form>
        </div>
    </main>

    <script>
        document.querySelectorAll(".upload-zone").forEach(zone => {
            zone.addEventListener("click", () => {
                zone.querySelector("input[type='file']").click();
            });

            zone.querySelector("input[type='file']").addEventListener("change", (e) => {
                const file = e.target.files[0];
                if (file) {
                    zone.classList.add("uploaded");
                    zone.querySelector("p").innerHTML = `<i class="fa-solid fa-file" style="margin-right:6px;"></i><strong>${file.name}</strong>`;
                    zone.querySelector("i.fa-cloud-arrow-up") && (zone.querySelector("i").className = "fa-solid fa-circle-check");
                }
            });

            zone.addEventListener("dragover", (e) => {
                e.preventDefault();
                zone.classList.add("drag-over");
            });

            zone.addEventListener("dragleave", () => {
                zone.classList.remove("drag-over");
            });

            zone.addEventListener("drop", (e) => {
                e.preventDefault();
                zone.classList.remove("drag-over");
                const file = e.dataTransfer.files[0];
                if (file) {
                    zone.classList.add("uploaded");
                    zone.querySelector("p").innerHTML = `<strong>${file.name}</strong>`;
                }
            });
        });
    </script>

    <script type="module">
        import InscriptionController from "../controllers/InscriptionController.js";
        InscriptionController.init();

    </script>
</body>
</html>