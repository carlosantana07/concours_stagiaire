<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des concours</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body style="margin: 0;
    font-family: Segoe UI, Roboto, Arial, sans-serif;
    background: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;">
    <div class="auth-card">

        <div class="auth-title">Mot de passe oublié</div>

        <form id="forgotForm">

            <!-- choix -->
            <div class="input-group">
                <select name="choix" id="choix">
                    <option value="">Choisir une méthode</option>
                    <option value="mail">Recevoir par Email</option>
                    <option value="sms">Recevoir par SMS</option>
                </select>
            </div>

            <!-- EMAIL -->
            <div class="input-group" id="emailGroup" style="display:none;">
                <input type="email" name="email" placeholder="Votre email">
            </div>

            <!-- TELEPHONE -->
            <div class="input-group" id="telGroup" style="display:none;">
                <input type="text" name="telephone" placeholder="Votre téléphone">
            </div>

            <button class="btn-primary">Envoyer le code</button>

            <div class="link">
                <a href="connexion.php">Retour connexion</a>
            </div>

        </form>

    </div>
    <script>
        const choix = document.getElementById("choix");
            const emailGroup = document.getElementById("emailGroup");
            const telGroup = document.getElementById("telGroup");

            // afficher champ selon choix
            choix.addEventListener("change", () => {

                if (choix.value === "mail") {
                    emailGroup.style.display = "block";
                    telGroup.style.display = "none";
                }

                else if (choix.value === "sms") {
                    emailGroup.style.display = "none";
                    telGroup.style.display = "block";
                }

                else {
                    emailGroup.style.display = "none";
                    telGroup.style.display = "none";
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