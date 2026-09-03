<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aide - E-CONCOURS</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="help-page">

    <?php include('header.php'); ?>

    <main class="help-main">

        <div class="help-container">

            <div class="help-header">

                <div class="help-header-icon">
                    <i class="fa-solid fa-circle-question"></i>
                </div>

                <span class="help-eyebrow">
                    Centre d'aide E-CONCOURS
                </span>

                <h1 class="help-title">
                    Questions / Réponses
                </h1>

                <p class="help-subtitle">
                    Nous avons regroupé les questions les plus demandées.
                    N'hésitez pas à nous contacter si vous ne trouvez pas
                    la réponse à votre question.
                </p>

            </div>

            <div class="help-accordion-list">

                <div class="help-accordion-item">

                    <div class="help-question">

                        <span class="help-accordion-icon">
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>

                        <span class="help-accordion-text">
                            Comment créer un compte ?
                        </span>

                    </div>

                    <div class="help-answer">
                        Pour créer un compte, cliquez sur "Créer un compte"
                        en haut de la page, remplissez le formulaire avec
                        vos informations personnelles puis validez.
                        Un email de confirmation peut être requis.
                    </div>

                </div>

                <div class="help-accordion-item">

                    <div class="help-question">

                        <span class="help-accordion-icon">
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>

                        <span class="help-accordion-text">
                            Comment s'inscrire à un concours ?
                        </span>

                    </div>

                    <div class="help-answer">
                        Accédez à la page "Concours", choisissez le concours
                        souhaité, puis cliquez sur "Voir détails". Ensuite,
                        cliquez sur "S'inscrire" et suivez les étapes jusqu'au
                        paiement des frais d'inscription.
                    </div>

                </div>

                <div class="help-accordion-item">

                    <div class="help-question">

                        <span class="help-accordion-icon">
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>

                        <span class="help-accordion-text">
                            Comment vérifier mon inscription à un concours ?
                        </span>

                    </div>

                    <div class="help-answer">
                        Rendez-vous dans votre profil, section
                        "Mes candidatures". Vous y trouverez le statut
                        de chaque inscription (en attente ou validée).
                    </div>

                </div>

                <div class="help-accordion-item">

                    <div class="help-question">

                        <span class="help-accordion-icon">
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>

                        <span class="help-accordion-text">
                            NÉ(E) "VERS" OU "EN" ?
                        </span>

                    </div>

                    <div class="help-answer">
                        Utilisez "né(e) en" lorsque la date de naissance
                        est exacte. Utilisez "vers" uniquement si la date
                        est approximative ou inconnue.
                    </div>

                </div>

                <div class="help-accordion-item">

                    <div class="help-question">

                        <span class="help-accordion-icon">
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>

                        <span class="help-accordion-text">
                            Validation par Orange Money ?
                        </span>

                    </div>

                    <div class="help-answer">
                        Après avoir lancé le paiement, vous recevrez une
                        notification sur votre téléphone. Validez la
                        transaction en entrant votre code secret.
                        Une fois le paiement réussi, votre inscription
                        sera automatiquement validée.
                    </div>

                </div>

                <div class="help-accordion-item">

                    <div class="help-question">

                        <span class="help-accordion-icon">
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>

                        <span class="help-accordion-text">
                            Validation par MobiCash
                        </span>

                    </div>

                    <div class="help-answer">
                        Après avoir initié le paiement, suivez les
                        instructions envoyées sur votre téléphone.
                        Une fois la transaction confirmée, votre
                        inscription sera validée automatiquement
                        sur la plateforme.
                    </div>

                </div>

            </div>

            <div class="help-contact">

                <div class="help-contact-icon">
                    <i class="fa-solid fa-headset"></i>
                </div>

                <div class="help-contact-content">
                    <strong>
                        Vous ne trouvez pas votre réponse ?
                    </strong>

                    <span>
                        Notre équipe reste disponible pour vous accompagner.
                    </span>
                </div>

                <a href="contact.php" class="help-contact-button">
                    Nous contacter
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

            </div>

        </div>

    </main>

    <?php include('footer.php'); ?>

    <script>
        document.querySelectorAll(".help-accordion-item").forEach(item => {

            item.querySelector(".help-question").addEventListener("click", () => {

                document.querySelectorAll(".help-accordion-item").forEach(i => {
                    if (i !== item) {
                        i.classList.remove("active");
                    }
                });

                item.classList.toggle("active");

            });

        });
    </script>

</body>

</html>