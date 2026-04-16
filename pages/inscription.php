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

    <section class="register-page">

        <div class="register-container">
            <h1>Créer un compte</h1>

            <form class="register-form">

                <!-- COLONNE GAUCHE -->
                <div class="form-column">

                    <div class="form-group">
                        <label>Sexe <span class="required">*</span></label>
                        <select required>
                            <option>Sélectionnez votre sexe</option>
                            <option>Homme</option>
                            <option>Femme</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nom <span class="required">*</span></label>
                        <input type="text" placeholder="Votre nom de famille" required>
                    </div>

                    <div class="form-group">
                        <label>Prénom(s) <span class="required">*</span></label>
                        <input type="text" placeholder="Vos prénoms" required>
                    </div>

                    <div class="form-group">
                        <label>Nom de jeune fille</label>
                        <input type="text" placeholder="Votre nom de jeune fille">
                    </div>

                    <div class="form-group">
                        <label>Type de concours <span class="required">*</span></label>
                        <select required>
                            <option>Sélectionnez le type de concours</option>
                            <option>Direct</option>
                            <option>Professionnel</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Matricule</label>
                        <input type="text" placeholder="Votre matricule">
                    </div>

                    <div class="form-group">
                        <label>Ministère</label>
                        <input type="text" placeholder="Votre ministère d'affectation">
                    </div>

                </div>

                <!-- COLONNE DROITE -->
                <div class="form-column">

                    <div class="form-group">
                        <label>Date de naissance <span class="required">*</span></label>
                        <input type="date" placeholder="mm/dd/yyyy" required>
                    </div>

                    <div class="form-group">
                        <label>Lieu de naissance <span class="required">*</span></label>
                        <input type="text" placeholder="Votre lieu de naissance" required>
                    </div>

                    <div class="form-group">
                        <label>Téléphone <span class="required">*</span></label>
                        <input type="text" placeholder="+226 XX XX XX XX" required>
                    </div>

                    <div class="form-group">
                        <label>Confirmer téléphone <span class="required">*</span></label>
                        <input type="text" placeholder="confirmez votre numéro de téléphone" required>
                    </div>

                    <div class="form-group">
                        <label>Email <span class="required">*</span></label>
                        <input type="email" placeholder="exemple@gmail.com" required>
                    </div>

                    <div class="form-group">
                        <label>Confirmer email <span class="required">*</span></label>
                        <input type="email" placeholder="confirmez votre email" required>
                    </div>

                    <div class="form-group">
                        <label>Emploi actuel</label>
                        <input type="text" placeholder="Votre emploi actuel">
                    </div>

                </div>

            </form>

            <!-- BOUTON -->
            <div class="register-actions">
                <button class="btn-primary">Créer mon compte</button>
            </div>

        </div>

    </section>

    <!-- ===== FOOTER ===== -->
    <?php include("footer.php") ?>

</body>

</html>