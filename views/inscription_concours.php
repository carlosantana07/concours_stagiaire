<?php

$encodedId = $_GET['id'] ?? '';

if (empty($encodedId)) {
    die("Concours invalide");
}

$base64 = strtr(
    $encodedId,
    '-_',
    '+/'
);

$padding = strlen($base64) % 4;

if ($padding !== 0) {
    $base64 .= str_repeat('=', 4 - $padding);
}

$decoded = base64_decode($base64, true);

if ($decoded === false) {
    die("Concours invalide");
}

$parts = explode('|', $decoded);

if (count($parts) !== 4) {
    die("Concours invalide");
}

$secret = $parts[0];
$id_Concours = $parts[1];
$signature = $parts[3];

if ($secret !== "E_CONCOURS_2026_X7K9") {
    die("Concours invalide");
}

if ($signature !== "ECO2026") {
    die("Concours invalide");
}

if (!ctype_digit($id_Concours)) {
    die("Concours invalide");
}

$id_Concours = (int) $id_Concours;
?>
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
                                    name="ref_diplome"
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

                            <div class="upload-zone" id="upload-diplome">
                                <i class="fa-solid fa-cloud-arrow-up"></i>

                                <p>
                                    Glissez votre fichier ici ou
                                    <span>cliquez pour parcourir</span>
                                </p>

                                <small>
                                    PDF, JPG, PNG - taille maximale : 2 Mo
                                </small>

                                <input
                                    type="file"
                                    name="diplome"
                                    id="diplome"
                                    accept=".pdf,.jpg,.jpeg,.png"
                                    hidden>
                            </div>

                            <div id="diplome-preview" class="diplome-preview" style="display: none;">
                                <div class="diplome-preview-header">
                                    <span id="diplome-nom"></span>

                                    <button
                                        type="button"
                                        id="supprimer-diplome"
                                        class="btn-supprimer-diplome"
                                        title="Supprimer le fichier">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>

                                <div id="diplome-apercu-contenu"></div>
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
        document.addEventListener("DOMContentLoaded", function() {
            const input = document.getElementById("diplome");
            const zone = document.getElementById("upload-diplome");
            const preview = document.getElementById("diplome-preview");
            const nomFichier = document.getElementById("diplome-nom");
            const contenuApercu = document.getElementById("diplome-apercu-contenu");
            const boutonSupprimer = document.getElementById("supprimer-diplome");

            if (!input || !zone || !preview || !nomFichier || !contenuApercu || !boutonSupprimer) {
                return;
            }

            let urlApercu = null;

            zone.addEventListener("click", function(event) {
                if (event.target !== input) {
                    input.click();
                }
            });

            input.addEventListener("change", function() {
                afficherApercu(this.files[0]);
            });

            zone.addEventListener("dragover", function(event) {
                event.preventDefault();
                zone.classList.add("drag-over");
            });

            zone.addEventListener("dragleave", function() {
                zone.classList.remove("drag-over");
            });

            zone.addEventListener("drop", function(event) {
                event.preventDefault();
                zone.classList.remove("drag-over");

                const fichier = event.dataTransfer.files[0];

                if (!fichier) return;

                try {
                    const transfert = new DataTransfer();
                    transfert.items.add(fichier);
                    input.files = transfert.files;
                } catch (error) {
                    console.error("Impossible de sélectionner le fichier déposé :", error);
                    alert("Impossible de sélectionner ce fichier. Veuillez utiliser le bouton de sélection.");
                    return;
                }

                afficherApercu(fichier);
            });

            function afficherApercu(fichier) {
                nettoyerApercu();

                if (!fichier) return;

                const extension = fichier.name.split(".").pop().toLowerCase();
                const extensionsAutorisees = ["pdf", "jpg", "jpeg", "png"];
                const typesAutorises = ["application/pdf", "image/jpeg", "image/png"];

                if (
                    !extensionsAutorisees.includes(extension) ||
                    !typesAutorises.includes(fichier.type)
                ) {
                    input.value = "";

                    alert("Format invalide. Veuillez sélectionner un PDF, un JPG ou un PNG.");
                    return;
                }

                if (fichier.size > 2 * 1024 * 1024) {
                    input.value = "";

                    alert("Le fichier dépasse la taille maximale autorisée de 2 Mo.");
                    return;
                }

                nomFichier.textContent = fichier.name;
                urlApercu = URL.createObjectURL(fichier);

                if (fichier.type === "application/pdf") {
                    const iframe = document.createElement("iframe");
                    iframe.src = urlApercu;
                    iframe.title = "Aperçu du diplôme";
                    contenuApercu.appendChild(iframe);
                } else {
                    const image = document.createElement("img");
                    image.src = urlApercu;
                    image.alt = "Aperçu du diplôme";
                    contenuApercu.appendChild(image);
                }

                preview.style.display = "block";
            }

            function nettoyerApercu() {
                if (urlApercu) {
                    URL.revokeObjectURL(urlApercu);
                    urlApercu = null;
                }

                contenuApercu.replaceChildren();
                preview.style.display = "none";
                nomFichier.textContent = "";
            }

            boutonSupprimer.addEventListener("click", function() {
                input.value = "";
                nettoyerApercu();
            });
        });
    </script>


    <script type="module">
        import InscriptionController
        from "../controllers/inscriptionController.js";

        InscriptionController.init();
    </script>

</body>

</html>