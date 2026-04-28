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

    <main class="page">

        <div class="page-container">

            <div class="intro-text">
                <p> Veuillez renseigner avec soin le formulaire et cliquer sur le bouton "Suivant".</p>
            </div>

            <form class="page-form" id="formInscription">

                <!-- INFORMATIONS CONCOURS -->
                <section class="page-card">
                    <div class="form-group">
                        <h2 class="section-title">Informations du concours</h2>
                        <div id="nomConcours" class="input" style="display: inline; text-align: center; align-items: center;">Chargement...</div>
                    </div>

                    <div class="form-group">
                        <label>Centre de composition <span class="required">*</span></label>
                        <select class="input" name="centre" required>
                            <option>Choisir un centre</option>
                        </select>
                    </div>
                </section>

                <!-- CNIB -->
                <section class="page-card">
                    <h2 class="section-title">CNIB</h2>

                    <div class="grid-2">
                        <div class="form-group">
                            <label>N°CNIB <span class="required">*</span></label>
                            <input type="text" class="input" name="cnib" required>
                        </div>

                        <div class="form-group">
                            <label>Date de délivrance <span class="required">*</span></label>
                            <input type="text" class="input" placeholder="jj/mm/aaaa" name="date_delivrance" required>
                        </div>
                    </div>
                </section>

                <!-- DIPLOME -->
                <section class="page-card">
                    <h2 class="section-title">Diplôme</h2>

                    <div class="form-group">
                        <label>Etablissement <span class="required">*</span></label>
                        <input type="text" class="input" name="etablissement" required>
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label>Référence diplôme</label>
                            <input type="text" class="input" name="reference_diplome">
                        </div>

                        <div class="form-group">
                            <label>Date de signature</label>
                            <input type="text" class="input" name="date_signature">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Domaine de compétence</label>
                        <input type="text" class="input" name="domaine_competence">
                    </div>

                    <div class="form-group">
                        <label>Niveau d'étude</label>
                        <input type="text" class="input" name="niveau_etude">
                    </div>

                    <div class="form-group">
                        <label>Intitulé du diplôme <span class="required">*</span></label>
                        <input type="text" class="input" name="intitule_diplome" required>
                    </div>
                </section>

                <!-- ACTIONS -->
                <div class="form-actions">
                    <a href="liste_concours.php" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Suivant</button>
                </div>

            </form>

        </div>

    </main>
    
    <script type="module">
        import InscriptionController from "../controllers/InscriptionController.js";

        InscriptionController.init();
    </script>
</body>

</html>