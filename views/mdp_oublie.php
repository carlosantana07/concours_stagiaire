<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mot de passe oublié | E-CONCOURS</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="forgot-page">

    <main class="forgot-container">

        <!-- ==============================
             EN-TÊTE
        =============================== -->

        <div class="forgot-header">

            <div class="forgot-icon">
                <i class="fas fa-key"></i>
            </div>

            <span class="forgot-eyebrow">
                RÉCUPÉRATION DU COMPTE
            </span>

            <h1>Mot de passe oublié ?</h1>

            <p>
                Pas d'inquiétude. Choisissez votre méthode de récupération
                pour recevoir un code de vérification.
            </p>

        </div>


        <!-- ==============================
             FORMULAIRE
        =============================== -->

        <form id="forgotForm" class="forgot-form">

            <!-- Méthode de récupération -->
            <div class="form-group">

                <label for="choix">
                    Méthode de récupération
                </label>

                <div class="input-wrapper">

                    <i class="fas fa-paper-plane input-icon"></i>

                    <select name="choix" id="choix">

                        <option value="">
                            Choisir une méthode
                        </option>

                        <option value="mail">
                            Recevoir par Email
                        </option>

                        <option value="sms">
                            Recevoir par SMS
                        </option>

                    </select>

                    <i class="fas fa-chevron-down select-icon"></i>

                </div>

            </div>


            <!-- ==============================
                 EMAIL
            =============================== -->

            <div class="form-group dynamic-field"
                id="emailGroup"
                style="display: none;">

                <label for="email">
                    Adresse email
                </label>

                <div class="input-wrapper">

                    <i class="fas fa-envelope input-icon"></i>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="exemple@email.com"
                        autocomplete="email"
                    >

                </div>

                <span class="field-help">
                    Un code de vérification sera envoyé à cette adresse.
                </span>

            </div>


            <!-- ==============================
                 TELEPHONE
            =============================== -->

            <div class="form-group dynamic-field"
                id="telGroup"
                style="display: none;">

                <label for="telephone">
                    Numéro de téléphone
                </label>

                <div class="input-wrapper">

                    <i class="fas fa-phone input-icon"></i>

                    <input
                        type="text"
                        id="telephone"
                        name="telephone"
                        placeholder="01 23 45 67 89"
                        autocomplete="tel"
                    >

                </div>

                <span class="field-help">
                    Un code de vérification sera envoyé par SMS.
                </span>

            </div>


            <!-- Message -->
            <p id="formMessage" class="form-message"></p>


            <!-- ==============================
                 BOUTON
            =============================== -->

            <button
                type="submit"
                class="btn-primary forgot-submit">

                <span>Envoyer le code</span>

                <i class="fas fa-arrow-right"></i>

            </button>


            <!-- ==============================
                 RETOUR
            =============================== -->

            <div class="back-login">

                <a href="connexion.php">

                    <i class="fas fa-arrow-left"></i>

                    Retour à la connexion

                </a>

            </div>

        </form>


        <div class="security-note">

            <i class="fas fa-shield-halved"></i>

            <span>
                Vos informations sont traitées de manière sécurisée
            </span>

        </div>

    </main>

    <script>

        const choix = document.getElementById("choix");

        const emailGroup = document.getElementById("emailGroup");

        const telGroup = document.getElementById("telGroup");


        choix.addEventListener("change", () => {

            emailGroup.style.display = "none";
            telGroup.style.display = "none";


            if (choix.value === "mail") {

                emailGroup.style.display = "flex";

            }

            else if (choix.value === "sms") {

                telGroup.style.display = "flex";

            }

        });

    </script>

    <script type="module">

        import AuthController from "../controllers/AuthController.js";

        document.addEventListener("DOMContentLoaded", () => {

            AuthController.initForgotPassword();

        });

    </script>

</body>

</html>
