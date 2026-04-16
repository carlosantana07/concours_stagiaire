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

            <form>
                <div class="form-group">
                    <label for="nom">Nom <span class="required">*</span></label>
                    <input type="text" id="nom" placeholder="Votre nom complet" required>
                </div>

                <div class="form-group">
                    <label for="email">Adresse Mail</label>
                    <input type="email" id="email" placeholder="votre.email@exemple.com">
                </div>

                <div class="form-group">
                    <label for="tel">Téléphone</label>
                    <input type="tel" id="tel" placeholder="01 23 45 67 89">
                </div>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" placeholder="Décrivez votre demande ou question..."></textarea>
                </div>

                <button type="submit" class="btn-submit">Envoyer</button>
            </form>
        </main>

    </section>

    <?php include ('footer.php'); ?>

</body>

</html>