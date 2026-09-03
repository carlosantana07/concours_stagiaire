<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-CONCOURS - Inscription</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="inscription-concours-page">

    <?php include("header.php") ?>

    <main class="inscription-main">

        <div class="inscription-container">

            <!-- EN-TÊTE -->
            <div class="inscription-heading">

                <div class="inscription-heading-icon">
                    <i class="fa-solid fa-file-signature"></i>
                </div>

                <div>
                    <span class="inscription-eyebrow">
                        Candidature au concours
                    </span>

                    <h1>
                        Inscription au concours
                    </h1>

                    <p>
                        Veuillez renseigner soigneusement les informations
                        demandées puis cliquer sur « Suivant ».
                    </p>
                </div>

            </div>


            <form class="inscription-form" id="formInscription">

                <!-- ============================= -->
                <!-- INFORMATIONS CONCOURS -->
                <!-- ============================= -->

                <section class="inscription-card">

                    <div class="inscription-card-header">

                        <div class="card-section-icon">
                            <i class="fa-solid fa-clipboard-list"></i>
                        </div>

                        <div>
                            <h2>Informations du concours</h2>
                            <p>
                                Vérifiez le concours choisi et sélectionnez
                                votre centre de composition.
                            </p>
                        </div>

                    </div>


                    <div class="inscription-card-body">

                        <div class="form-group">

                            <label>
                                Concours sélectionné
                            </label>

                            <div id="nomConcours"
                                class="concours-name-display">
                                Chargement...
                            </div>

                        </div>


                        <div class="form-group">

                            <label>
                                Centre de composition
                                <span class="required">(obligatoire)</span>
                            </label>

                            <div class="input-with-icon">

                                <i class="fa-solid fa-location-dot"></i>

                                <select class="input"
                                    name="centre"
                                    required>

                                    <option value="">
                                        Choisir un centre
                                    </option>

                                </select>

                            </div>

                        </div>

                    </div>

                </section>


                <!-- ============================= -->
                <!-- DIPLOME -->
                <!-- ============================= -->

                <section class="inscription-card">

                    <div class="inscription-card-header">

                        <div class="card-section-icon">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>

                        <div>
                            <h2>Diplôme</h2>
                            <p>
                                Renseignez les informations relatives à votre
                                diplôme.
                            </p>
                        </div>

                    </div>


                    <div class="inscription-card-body">

                        <div class="form-group">

                            <label>
                                Établissement
                                <span class="required">(obligatoire)</span>
                            </label>

                            <div class="input-with-icon">

                                <i class="fa-solid fa-building-columns"></i>

                                <input
                                    type="text"
                                    class="input"
                                    name="etablissement"
                                    placeholder="Nom de l'établissement"
                                    required>

                            </div>

                        </div>


                        <div class="grid-2">

                            <div class="form-group">

                                <label>
                                    Référence diplôme
                                </label>

                                <input
                                    type="text"
                                    class="input"
                                    name="reference_diplome"
                                    placeholder="Référence du diplôme">

                            </div>


                            <div class="form-group">

                                <label>
                                    Année d'obtention
                                </label>

                                <input
                                    type="number"
                                    class="input"
                                    name="annee_obtention"
                                    min="1900"
                                    max="2100"
                                    placeholder="Ex : 2020">

                            </div>

                        </div>


                        <div class="form-group">

                            <label>
                                Niveau d'étude
                            </label>

                            <input
                                type="text"
                                class="input"
                                name="niveau_etude"
                                placeholder="Ex : Licence, Master...">

                        </div>


                        <!-- UPLOAD -->
                        <div class="form-group">

                            <label>
                                Copie du diplôme
                                <span class="required">(obligatoire)</span>
                            </label>

                            <div class="upload-zone"
                                id="upload-diplome">

                                <i class="fa-solid fa-cloud-arrow-up"></i>

                                <p>
                                    Glissez votre fichier ici ou
                                    <span>
                                        cliquez pour parcourir
                                    </span>
                                </p>

                                <small>
                                    PDF, JPG, PNG — taille maximale : 2 Mo
                                </small>

                                <input
                                    type="file"
                                    name="diplome_file"
                                    accept=".pdf,.jpg,.jpeg,.png"
                                    hidden>

                            </div>

                        </div>

                    </div>

                </section>


                <!-- MESSAGE -->
                <p id="inscriptionMessage"
                    class="form-message">
                </p>


                <!-- ACTIONS -->
                <div class="form-actions">

                    <a href="liste_concours.php"
                        class="btn btn-cancel">

                        <i class="fa-solid fa-arrow-left"></i>

                        <span>Annuler</span>

                    </a>


                    <button
                        type="submit"
                        class="btn btn-next">

                        <span>Suivant</span>

                        <i class="fa-solid fa-arrow-right"></i>

                    </button>

                </div>

            </form>

        </div>

    </main>


    <!-- UPLOAD -->
    <script>
        document.querySelectorAll(".upload-zone").forEach(zone => {

            const input = zone.querySelector("input[type='file']");

            zone.addEventListener("click", () => {
                input.click();
            });


            input.addEventListener("change", (e) => {

                const file = e.target.files[0];

                if (file) {

                    zone.classList.add("uploaded");

                    zone.querySelector("p").innerHTML = `
                        <i class="fa-solid fa-file"
                           style="margin-right:6px;">
                        </i>
                        <strong>${file.name}</strong>
                    `;

                    const icon = zone.querySelector("i");

                    if (icon) {
                        icon.className = "fa-solid fa-circle-check";
                    }
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

                    zone.querySelector("p").innerHTML = `
                        <i class="fa-solid fa-file"
                           style="margin-right:6px;">
                        </i>
                        <strong>${file.name}</strong>
                    `;

                    const icon = zone.querySelector("i");

                    if (icon) {
                        icon.className = "fa-solid fa-circle-check";
                    }
                }

            });

        });
    </script>


    <script type="module">
        import InscriptionController
        from "../controllers/InscriptionController.js";

        InscriptionController.init();
    </script>

</body>

</html>