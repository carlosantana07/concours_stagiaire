<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

            <form class="register-form" id="registerForm">
                <div class="form-columns">
                    <!-- COLONNE GAUCHE -->
                    <div class="form-column">

                        <div class="form-group">
                            <label>Sexe <span class="required">*</span></label>
                            <select name="sexe" required>
                                <option value="">Sélectionnez votre sexe</option>
                                <option value="HOMME">Homme</option>
                                <option value="FEMME">Femme</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nom <span class="required">*</span></label>
                            <input type="text" name="nom" placeholder="Votre nom de famille" required>
                        </div>

                        <div class="form-group">
                            <label>Prénom(s) <span class="required">*</span></label>
                            <input type="text" name="prenom" placeholder="Vos prénoms" required>
                        </div>

                        <div class="form-group">
                            <label>Nom de jeune fille</label>
                            <input type="text" name="nom_jeune_fille" placeholder="Votre nom de jeune fille">
                        </div>

                        <div class="form-group">
                            <label>Lieu de naissance <span class="required">*</span></label>
                            <input type="text" name="lieu_naissance" placeholder="Votre lieu de naissance" required>
                        </div>

                        <div class="form-group">
                            <label>Numéro CNIB <span class="required">*</span></label>
                            <input type="text" name="numero_cnib" required>
                        </div>

                        <div class="form-group">
                            <label>Date de délivrance <span class="required">*</span></label>
                            <input type="date" name="date_delivrance" placeholder="Date de délivrance" required>
                        </div>

                        <div class="form-group">
                            <label>Type de concours <span class="required">*</span></label>
                            <select required name="type_concours">
                                <option value="">Sélectionnez le type de concours</option>
                                <option value="Direct">Direct</option>
                                <option value="Professionnel">Professionnel</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Matricule</label>
                            <input type="text" name="matricule" placeholder="Votre matricule">
                        </div>

                        <div class="form-group">
                            <label>Ministère</label>
                            <input type="text" name="ministere" placeholder="Votre ministère d'affectation">
                        </div>

                    </div>

                    <!-- COLONNE DROITE -->
                    <div class="form-column">

                        <div class="form-group">
                            <label>Date de naissance <span class="required">*</span></label>
                            <input type="date" name="date_naissance" placeholder="mm/dd/yyyy" required>
                        </div>

                        <div class="form-group">
                            <label>Pays de naissance <span class="required">*</span></label>
                            <input type="text" name="pays_naissance" placeholder="Votre pays de naissance" required>
                        </div>

                        <div class="form-group">
                            <label>Téléphone <span class="required">*</span></label>
                            <input type="text" name="telephone" placeholder="+226 XX XX XX XX" required>
                        </div>

                        <div class="form-group">
                            <label>Confirmer téléphone <span class="required">*</span></label>
                            <input type="text" name="telephone_confirm" placeholder="confirmez votre numéro de téléphone" required>
                        </div>

                        <div class="form-group">
                            <label>Email <span class="required">*</span></label>
                            <input type="email" name="email" placeholder="exemple@gmail.com" required>
                        </div>

                        <div class="form-group">
                            <label>Confirmer email <span class="required">*</span></label>
                            <input type="email" name="email_confirm" placeholder="confirmez votre email" required>
                        </div>

                        <div class="form-group">
                            <label>Emploi actuel</label>
                            <input type="text" name="emploi" placeholder="Votre emploi actuel">
                        </div>

                        <div class="form-group">
                            <label>Mot de passe <span class="required">*</span></label>
                            <input type="password" name="mot_de_passe" required>
                        </div>

                        <div class="form-group">
                            <label>Confirmer mot de passe <span class="required">*</span></label>
                            <input type="password" name="mot_de_passe_confirm" required>
                        </div>

                        <div class="form-group">
                            <label>Recevoir le code OTP par <span class="required">*</span></label>
                            <select name="choix" required>
                                <option value="">Choisir une option</option>
                                <option value="mail">Email</option>
                                <option value="sms">SMS</option>
                            </select>
                        </div>

                    </div>
                </div>
                <p id="formMessage" class="form-message"></p>
                <!-- BOUTON -->
                <div class="register-actions">
                    <button type="submit" class="btn-primary">Créer mon compte</button>
                </div>
            </form>

        </div>

    </section>

    <!-- ===== FOOTER ===== -->
    <?php include("footer.php") ?>
    <!-- 
    <script>
        document.getElementById("registerForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const formData = new FormData(this);

            const data = Object.fromEntries(formData.entries());

            console.log("DATA ENVOYÉE :", data);

            if (!data.sexe) {
                alert("Veuillez sélectionner votre sexe");
                return;
            }

            if (!data.numero_cnib) {
                alert("Le CNIB est requis");
                return;
            }

            if (!data.mot_de_passe || data.mot_de_passe.length < 8) {
                alert("Mot de passe trop court (min 8 caractères)");
                return;
            }

            if (data.mot_de_passe !== data.mot_de_passe_confirm) {
                alert("Les mots de passe ne correspondent pas");
                return;
            }

            fetch("http://localhost:4000/api/auth/register", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                })
                .then(res => res.json())
                .then(res => {

                    console.log("REPONSE API :", res);

                    if (res.error) {
                        alert(res.error);
                        return;
                    }

                    alert(res.message);

                    // stocke le token OTP pour la vérification
                    sessionStorage.setItem("otp_token", res.candidat.token);

                    window.location.href = "otp.php";

                })
                .catch(err => {
                    console.log(err);
                    alert("Erreur serveur");
                });

        });
    </script> -->
    <script type="module">
        import AuthController from "../controllers/AuthController.js";

        document.addEventListener("DOMContentLoaded", () => {
            AuthController.initRegister();
        });
    </script>

</body>

</html>