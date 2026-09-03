<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>E-CONCOURS - Portail officiel des concours</title>

  <link rel="stylesheet" href="../assets/css/style.css">

  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="home-page">

  <!-- =====================================================
         HEADER
    ====================================================== -->
  <?php include("header.php") ?>


  <!-- =====================================================
         BARRE COULEURS
    ====================================================== -->
  <div class="flag-bar">
    <div class="yellow"></div>
    <div class="yellow"></div>
    <div class="yellow"></div>
  </div>


  <!-- =====================================================
         HERO
    ====================================================== -->
  <main>

    <section class="hero">

      <div class="hero-overlay"></div>

      <div class="hero-content">

        <span class="hero-badge">
          <i class="fa-solid fa-building-columns"></i>
          Portail officiel
        </span>

        <h1 class="hero-title">
          Bienvenue sur <span>E-CONCOURS</span>
        </h1>

        <p class="hero-subtitle">
          Le portail officiel d'accès aux concours
          de la Fonction Publique
        </p>

        <p class="hero-description">
          Inscrivez-vous, consultez les concours disponibles
          et postulez facilement en ligne pour rejoindre
          la Fonction Publique de la République du Mali.
        </p>


        <!-- BOUTONS -->
        <div class="hero-actions">

          <!-- Toujours visible -->
          <a href="liste_concours.php"
            class="btn-primary hero-btn">

            <i class="fa-solid fa-magnifying-glass"></i>

            <span>Voir les concours</span>

          </a>


          <!-- Non connecté -->
          <a href="inscription.php" id="btnInscription" class="btn-secondary"> 
            <i class="fa-solid fa-user-plus"></i> 
            <span>Créer un compte</span> 
          </a>


          <!-- Connecté -->
          <a href="resultat.php"
            id="btnResultat"
            class="btn-secondary"
            style="display: none;">

            <i class="fa-solid fa-chart-bar"></i>

            <span>Mes résultats</span>

          </a>

        </div>

      </div>


      <!-- =================================================
                 STATISTIQUE
            ================================================== -->
      <!-- <div class="hero-stats">

                <div class="stat-card">

                    <div class="stat-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>

                    <div class="stat-content">

                        <span class="stat-label">
                            Nombre de visiteurs
                        </span>

                        <strong class="stat-value">
                            10 000
                        </strong>

                    </div>

                </div>

            </div> -->

    </section>


    <!-- =====================================================
             COMMENT S'INSCRIRE
        ====================================================== -->
    <section class="registration-section">

      <div class="section-header">

        <span class="section-eyebrow">
          <i class="fa-solid fa-circle-info"></i>
          Comment ça fonctionne ?
        </span>

        <h2>
          Comment s'inscrire ?
        </h2>

        <p>
          Suivez ces quelques étapes pour déposer
          votre candidature en ligne.
        </p>

      </div>


      <div class="steps-container">

        <!-- ÉTAPE 1 -->
        <article class="step-card">

          <div class="step-number">
            01
          </div>

          <div class="step-icon">
            <i class="fa-solid fa-user-plus"></i>
          </div>

          <div class="step-content">

            <h3>
              Créer un compte
            </h3>

            <p>
              Inscrivez-vous sur la plateforme
              avec vos informations personnelles.
            </p>

          </div>

        </article>


        <!-- ÉTAPE 2 -->
        <article class="step-card">

          <div class="step-number">
            02
          </div>

          <div class="step-icon">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>

          <div class="step-content">

            <h3>
              Rechercher un concours
            </h3>

            <p>
              Consultez les concours disponibles
              et choisissez celui qui vous correspond.
            </p>

          </div>

        </article>


        <!-- ÉTAPE 3 -->
        <article class="step-card">

          <div class="step-number">
            03
          </div>

          <div class="step-icon">
            <i class="fa-solid fa-file-arrow-up"></i>
          </div>

          <div class="step-content">

            <h3>
              Soumettre votre dossier
            </h3>

            <p>
              Téléchargez vos documents et
              validez votre candidature en ligne.
            </p>

          </div>

        </article>

      </div>

    </section>


    <!-- =====================================================
             ASSISTANCE
        ====================================================== -->
    <section class="support-section">

      <div class="support-card">

        <div class="support-icon">
          <i class="fa-solid fa-headset"></i>
        </div>


        <div class="support-content">

          <span class="section-eyebrow">
            <i class="fa-solid fa-circle-question"></i>
            Assistance
          </span>

          <h2>
            Besoin d'aide ?
          </h2>

          <p>
            Notre équipe d'assistance est disponible
            pour vous accompagner dans vos démarches
            et répondre à vos questions.
          </p>

          <div class="support-hours">

            <span>
              <i class="fa-regular fa-clock"></i>
              Disponible 7j/7
            </span>

            <span>
              <i class="fa-solid fa-calendar-days"></i>
              De 8h à 20h
            </span>

          </div>

          <button class="btn-support">

            <i class="fa-solid fa-phone"></i>

            <span>
              Contacter l'assistance
            </span>

          </button>

        </div>

      </div>

    </section>

  </main>


  <!-- =====================================================
         FOOTER
    ====================================================== -->
  <?php include("footer.php") ?>


  <!-- =====================================================
         JAVASCRIPT
    ====================================================== -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {

      const token = localStorage.getItem("token");

      const btnConnexion =
        document.getElementById("btnInscription");

      const btnResultat =
        document.getElementById("btnResultat");


      if (token) {

        // Utilisateur connecté
        if (btnConnexion) {
          btnConnexion.style.display = "none";
        }

        if (btnResultat) {
          btnResultat.style.display = "inline-flex";
        }

      } else {

        // Utilisateur non connecté
        if (btnConnexion) {
          btnConnexion.style.display = "inline-flex";
        }

        if (btnResultat) {
          btnResultat.style.display = "none";
        }

      }

    });
  </script>

</body>

</html>