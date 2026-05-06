<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>E-Concours</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

  <!-- ===== HEADER ===== -->
  <?php include("header.php") ?>

  <!-- ===== FLAG BAR ===== -->
  <div class="flag-bar">
    <div class="red"></div>
    <div class="yellow"></div>
    <div class="green"></div>
  </div>

  <!-- ===== HERO ===== -->

  <section class="hero">
    <h1 class="title" style="color: #fff;">Bienvenue sur <span style="color:#FCD116;">E-CONCOURS</span></h1>

    <p class="subtitle" style="color: #fff;">
      Le portail officiel d'accès aux concours de la Fonction Publique
    </p>

    <p class="description">
      Inscrivez-vous, consultez les concours disponibles et <br>
      postulez facilement en ligne pour rejoindre la Fonction <br>
      Publique du Burkina Faso.
    </p>

    <div class="nav-buttons">
      <a href="liste_concours.php" class="btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Voir les concours</a>
      <a href="inscription.php" class="btn-secondary"><i class="fa-solid fa-user-plus"></i> Créer un compte</a>
    </div>


    <!-- CARTE DANS LE HERO -->
    <div class="cards-container">
      <div class="stats-card">
        <div class="icon icon-red"> <i class="fa-solid fa-chart-line"></i> </div>
        <div class="stats-text">
          <h3>Nombre de visiteurs</h3>
          <p>10000</p>
        </div>
      </div>
    </div>

  </section>

  <!-- ===== COMMENT S'INSCRIRE ===== -->
  <section style="text-align:center; padding:40px 0; color:#111827; background:#F9FAFB;">
    <h2 style="font-size:32px; margin-bottom:10px;">Comment s'inscrire ?</h2>
    <div style="width:80px; height:4px; background:#009E49; margin:10px auto;"></div>

    <div class="cards-container" style="justify-content: center;">
      <div class="card">
        <div class="icon icon-green"> <i class="fa-solid fa-user-plus"> </i></div>
        <div class="text">
          <h3 style="font-weight:bold; font-size:22px; text-align: left;">Créer un compte</h3>
          <p style="font-size:16px; font-weight:400; color:#4B5563; text-align: left;">
            Inscrivez-vous sur la plateforme avec vos informations personnelles.
          </p>
        </div>
      </div>

      <div class="card">
        <div class="icon icon-green"> <i class="fa-solid fa-magnifying-glass"> </i></div>
        <div class="text">
          <h3 style="font-weight:bold; font-size:22px; text-align: left;">Rechercher un concours</h3>
          <p style="font-size:16px; font-weight:400; color:#4B5563; text-align: left;">
            Parcourez les concours disponibles et choisissez celui qui vous correspond.
          </p>
        </div>
      </div>

      <div class="card">
        <div class="icon icon-green"> <i class="fa-solid fa-file-arrow-up"> </i></div>
        <div class="text">
          <h3 style="font-weight:bold; font-size:22px; text-align: left;">Soumettre votre dossier</h3>
          <p style="font-size:16px; font-weight:400; color:#4B5563; text-align: left;">
            Téléchargez vos documents et validez votre inscription.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== AIDE ===== -->
  <section style="display:flex; justify-content:center; align-items: center; padding:60px 0; background:#F9FAFB;">
    <div class="card" style="width:800px; height: 420px; align-items: center; justify-content: center; text-align:center; background: #F9FAFB;">
      <div class="icon icon-red"> <i class="fa-solid fa-headset"></i> </div>
      <h2 style="color:#111827;">Besoin d'aide ?</h2>
      <p style="color:#4B5563;">
        L'équipe d'assistance est disponible 7j/7 de 8h à 20h pour vous accompagner.
      </p>
      <button class="btn-primary" style="display:flex; align-items: center; background:#D62828; margin-top:20px;gap: 12px; width: 400px;">
        <i class="fa-solid fa-phone fa-2x"></i> Contacter l'assistance
      </button>
    </div>
  </section>

  <!-- ===== FOOTER ===== -->
   
  <?php include("footer.php") ?>

</body>

</html>