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

            <form class="page-form">

                <!-- INFORMATIONS CONCOURS -->
                <section class="page-card">
                    <div class="form-group">
                        <h2 class="section-title">Informations du concours</h2>
                        <div class="input" style="display: inline; text-align: center; align-items: center;">Concours : AUDITEURS DE JUSTICE</div>
                    </div>

                    <div class="form-group">
                        <label>Centre de composition <span class="required">*</span></label>
                        <select class="input">
                            <option>Choisir un centre</option>
                        </select>
                    </div>
                </section>

                <!-- DONNÉES PERSONNELLES -->
                <!-- <section class="page-card">
                    <h2 class="section-title">Données personnelles</h2>

                    <div class="grid-2">
                        <div class="form-group">
                            <label>Nom <span class="required">*</span></label>
                            <input type="text" class="input">
                        </div>

                        <div class="form-group">
                            <label>Prénom(s) <span class="required">*</span></label>
                            <input type="text" class="input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Lieu de naissance</label>
                        <input type="text" class="input">
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label>Sexe <span class="required">*</span></label>
                            <select class="input">
                                <option>Choisir</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Date de naissance <span class="required">*</span></label>
                            <input type="text" class="input" placeholder="jj/mm/aaaa">
                        </div>
                    </div>

                    <div class="grid-3">
                        <div class="form-group">
                            <label>Tél. portable <span class="required">*</span></label>
                            <input type="text" class="input">
                        </div>

                        <div class="form-group">
                            <label>Tél. secondaire</label>
                            <input type="text" class="input">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="input">
                        </div>
                    </div>
                </section> -->

                <!-- CNIB -->
                <section class="page-card">
                    <h2 class="section-title">CNIB</h2>

                    <div class="grid-2">
                        <div class="form-group">
                            <label>N°CNIB <span class="required">*</span></label>
                            <input type="text" class="input">
                        </div>

                        <div class="form-group">
                            <label>Date de délivrance <span class="required">*</span></label>
                            <input type="text" class="input" placeholder="jj/mm/aaaa">
                        </div>
                    </div>
                </section>

                <!-- DIPLOME -->
                <section class="page-card">
                    <h2 class="section-title">Diplôme</h2>

                    <div class="form-group">
                        <label>Etablissement <span class="required">*</span></label>
                        <input type="text" class="input">
                    </div>

                    <div class="grid-2">
                        <div class="form-group">
                            <label>Référence diplôme</label>
                            <input type="text" class="input">
                        </div>

                        <div class="form-group">
                            <label>Date de signature</label>
                            <input type="text" class="input">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Domaine de compétence</label>
                        <select class="input"></select>
                    </div>

                    <div class="form-group">
                        <label>Niveau d'étude</label>
                        <select class="input"></select>
                    </div>

                    <div class="form-group">
                        <label>Intitulé du diplôme <span class="required">*</span></label>
                        <input type="text" class="input">
                    </div>
                </section>

                <!-- ACTIONS -->
                <div class="form-actions">
                    <a href="liste_concours.php" class="btn btn-secondary">Annuler</a>
                    <a href="confirm_inscription.php" class="btn btn-primary">Suivant</a>
                </div>

            </form>

        </div>

    </main>

</body>

</html>