<html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-Nous - E-CONCOURS</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <?php include('header.php'); ?>
    <section style="background: #F9FAFB; padding: 40px 0;">
        <main class="contact-container">
            <h1>Contactez-Nous</h1>
            <p style="text-align: center; color: #666; margin-bottom: 30px;">Envoyez un message</p>

            <form id="contactForm">

                <div class="form-group">
                    <label>Nom <span class="required">*</span></label>
                    <input type="text" name="nom" id="nom" required>
                </div>

                <div class="form-group">
                    <label>Adresse Mail</label>
                    <input type="email" name="email" id="email">
                </div>

                <!-- <div class="form-group">
                    <label>Téléphone</label>
                    <input type="tel" name="telephone" id="tel">
                </div> -->

                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" id="message"></textarea>
                </div>

                <p id="formMessage" class="form-message"></p>

                <button type="submit" class="btn-submit">Envoyer</button>

            </form>
        </main>

    </section>

    <?php include('footer.php'); ?>
    <script type="module">
        import AuthController from "../controllers/AuthController.js";

        AuthController.initContact();
    </script>

</body>

</html>