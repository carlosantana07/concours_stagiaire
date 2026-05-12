<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <div class="auth-title">Réinitialiser mot de passe</div>

        <form id="resetForm">

            <div class="input-group">
                <input type="text" name="otp" placeholder="Code OTP">
            </div>

            <div class="input-group">
                <input type="password" name="mot_de_passe" placeholder="Nouveau mot de passe">
            </div>

            <button class="btn-primary">Réinitialiser</button>

            <div class="link">
                <a href="connexion.php">Retour connexion</a>
            </div>

        </form>

    </div>
    <script type="module">
        import AuthController from "../controllers/AuthController.js";

        document.addEventListener("DOMContentLoaded", () => {
            AuthController.initResetPassword();

        });
    </script>
</body>

</html>