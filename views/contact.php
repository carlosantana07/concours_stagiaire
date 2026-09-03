<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contactez-Nous - E-CONCOURS</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="contact-page">

    <?php include('header.php'); ?>

    <main class="contact-main">

        <div class="contact-container">

            <div class="contact-header">

                <div class="contact-header-icon">
                    <i class="fa-solid fa-comments"></i>
                </div>

                <span class="contact-eyebrow">
                    Assistance E-CONCOURS
                </span>

                <h1>
                    Contactez-nous
                </h1>

                <p>
                    Une question ou besoin d'assistance ?
                    Envoyez-nous votre message et notre équipe vous répondra.
                </p>

            </div>

            <form id="contactForm" class="contact-form">

                <div class="form-group">

                    <label for="nom">
                        Nom
                        <span class="required">*</span>
                    </label>

                    <div class="contact-input-wrapper">

                        <i class="fa-solid fa-user"></i>

                        <input
                            type="text"
                            name="nom"
                            id="nom"
                            placeholder="Votre nom"
                            required
                        >

                    </div>

                </div>

                <div class="form-group">

                    <label for="email">
                        Adresse Mail
                    </label>

                    <div class="contact-input-wrapper">

                        <i class="fa-solid fa-envelope"></i>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            placeholder="votre@email.com"
                        >

                    </div>

                </div>

                <div class="form-group">

                    <label for="message">
                        Message
                    </label>

                    <div class="contact-textarea-wrapper">

                        <i class="fa-solid fa-message"></i>

                        <textarea
                            name="message"
                            id="message"
                            placeholder="Écrivez votre message..."
                        ></textarea>

                    </div>

                </div>

                <p id="formMessage" class="form-message"></p>

                <button
                    type="submit"
                    class="btn-submit">

                    <i class="fa-solid fa-paper-plane"></i>

                    <span>
                        Envoyer le message
                    </span>

                </button>

            </form>

            <div class="contact-security">

                <i class="fa-solid fa-shield-halved"></i>

                <span>
                    Vos informations sont traitées de manière confidentielle.
                </span>

            </div>

        </div>

    </main>

    <?php include('footer.php'); ?>

    <script type="module">
        import AuthController from "../controllers/AuthController.js";

        AuthController.initContact();
    </script>

</body>

</html>