<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification OTP</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <?php include("header.php") ?>

    <div class="otp-page">

        <div class="otp-card">

            <h2>Vérification du compte</h2>
            <p>Entrez le code reçu par email ou SMS</p>

            <form id="otpForm">

                <input type="hidden" name="email" id="email">

                <div class="otp-box">
                    <input type="text" maxlength="1" class="otp-input">
                    <input type="text" maxlength="1" class="otp-input">
                    <input type="text" maxlength="1" class="otp-input">
                    <input type="text" maxlength="1" class="otp-input">
                    <input type="text" maxlength="1" class="otp-input">
                    <input type="text" maxlength="1" class="otp-input">
                </div>

                <input type="hidden" name="otp" id="otp">
                <p id="formMessage" class="form-message"></p>

                <button type="submit" class="otp-btn-primary">Vérifier</button>
                <div class="otp-resend">
                    <a id="resendBtn" class="btn-secondary">Renvoyer le code</a>
                    <p id="resendTimer" class="timer-text"></p>
                </div>

            </form>

        </div>

    </div>
    <?php include("footer.php") ?>

    
    <script type="module">
        import OtpController from "../controllers/AuthController.js";

        document.addEventListener("DOMContentLoaded", () => {
            OtpController.initOtp();
            OtpController.initResendOtp();
        });
    </script>

</body>

</html>