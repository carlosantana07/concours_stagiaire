<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Réinitialisation du mot de passe | E-CONCOURS</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="reset-page">

    <main class="reset-container">


        <div class="reset-header">

            <div class="reset-icon">
                <i class="fas fa-lock"></i>
            </div>

            <span class="reset-eyebrow">
                SÉCURITÉ DU COMPTE
            </span>

            <h1>Réinitialiser le mot de passe</h1>

            <p>
                Entrez le code de vérification reçu puis choisissez
                un nouveau mot de passe pour sécuriser votre compte.
            </p>

        </div>


        <!-- ==============================
             FORMULAIRE
        =============================== -->

        <form id="resetForm" class="reset-form">

            <!-- Code OTP -->
            <div class="form-group">

                <label for="otp">
                    Code de vérification
                </label>

                <div class="input-wrapper">

                    <i class="fas fa-shield-halved input-icon"></i>

                    <input
                        type="text"
                        id="otp"
                        name="otp"
                        placeholder="Entrez votre code OTP"
                        inputmode="numeric"
                        autocomplete="one-time-code"
                        required
                    >

                </div>

                <span class="field-help">
                    Saisissez le code reçu par SMS ou par email.
                </span>

            </div>


            <!-- Nouveau mot de passe -->
            <div class="form-group">

                <label for="newPassword">
                    Nouveau mot de passe
                </label>

                <div class="input-wrapper">

                    <i class="fas fa-lock input-icon"></i>

                    <input
                        type="password"
                        id="newPassword"
                        name="mot_de_passe"
                        placeholder="Choisissez un nouveau mot de passe"
                        autocomplete="new-password"
                        required
                    >

                    <button
                        type="button"
                        class="toggle-password"
                        onclick="toggleResetPassword()"
                        aria-label="Afficher le mot de passe"
                    >
                        <i class="fas fa-eye"></i>
                    </button>

                </div>

                <span class="field-help">
                    Utilisez un mot de passe suffisamment long et difficile à deviner.
                </span>

            </div>


            <!-- Message -->
            <p id="formMessage" class="form-message"></p>


            <!-- Bouton -->
            <button
                type="submit"
                class="btn-primary reset-submit">

                <span>Réinitialiser le mot de passe</span>

                <i class="fas fa-check"></i>

            </button>


            <!-- Retour -->
            <div class="back-login">

                <a href="connexion.php">

                    <i class="fas fa-arrow-left"></i>

                    Retour à la connexion

                </a>

            </div>

        </form>


        <!-- ==============================
             NOTE DE SÉCURITÉ
        =============================== -->

        <div class="security-note">

            <i class="fas fa-shield-halved"></i>

            <span>
                Votre nouveau mot de passe sera protégé de manière sécurisée
            </span>

        </div>

    </main>


    <script>

        function toggleResetPassword() {

            const password =
                document.getElementById("newPassword");

            const icon =
                document.querySelector(".toggle-password i");

            if (password.type === "password") {

                password.type = "text";

                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");

            } else {

                password.type = "password";

                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");

            }

        }

    </script>


    <!-- ==============================
         CONTROLLER
    =============================== -->

    <script type="module">

        import AuthController from "../controllers/AuthController.js";

        document.addEventListener("DOMContentLoaded", () => {

            AuthController.initResetPassword();

        });

    </script>

</body>

</html>
