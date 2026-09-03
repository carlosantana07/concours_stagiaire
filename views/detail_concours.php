<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Détail concours</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body style="padding-top: 80px;">

  <?php include("header.php"); ?>

  <main class="detail-page">

    <div class="detail-card">

      <!-- EN-TÊTE -->
      <div class="detail-header">

        <div class="detail-header-icon">
          <i class="fa-solid fa-clipboard-list"></i>
        </div>

        <div class="detail-header-content">

          <span class="detail-eyebrow">
            Détails du concours
          </span>

          <h1 id="titreConcours"></h1>

        </div>

      </div>


      <!-- DESCRIPTION -->
      <section class="description-section">

        <div class="info-header">

          <div class="info-icon">
            <i class="fa-solid fa-circle-info"></i>
          </div>

          <strong>
            Description du concours
          </strong>

        </div>

        <div class="description-content">

          <p id="desc1"></p>

          <p>
            Les candidats admis suivront une formation initiale
            avant leur intégration définitive. Sont autorisés à se
            présenter les citoyens remplissant les conditions
            générales d'accès aux emplois publics et titulaires
            des diplômes requis pour chaque spécialité.
          </p>

        </div>

      </section>


      <!-- INFORMATIONS -->
      <section class="meta-grid">

        <!-- FRAIS -->
        <div class="meta-item">

          <div class="meta-icon">
            <i class="fa-solid fa-file-invoice-dollar"></i>
          </div>

          <div class="meta-content">

            <span class="label">
              Frais d'inscription
            </span>

            <span
              class="value"
              id="frais"></span>

          </div>

        </div>


        <!-- DATE DÉBUT -->
        <div class="meta-item">

          <div class="meta-icon">
            <i class="fa-solid fa-calendar-days"></i>
          </div>

          <div class="meta-content">

            <span class="label">
              Date de début
            </span>

            <span
              class="value"
              id="dateDebut"></span>

          </div>

        </div>


        <!-- DATE FIN -->
        <div class="meta-item">

          <div class="meta-icon">
            <i class="fa-solid fa-calendar-check"></i>
          </div>

          <div class="meta-content">

            <span class="label">
              Date de fin
            </span>

            <span
              class="value"
              id="dateFin"></span>

          </div>

        </div>


        <!-- STATUT -->
        <div class="meta-item">

          <div class="meta-icon status-icon">
            <i class="fa-solid fa-circle-check"></i>
          </div>

          <div class="meta-content">

            <span class="label">
              Statut
            </span>

            <span
              class="status-badge"
              id="statut"></span>

          </div>

        </div>

      </section>


      <!-- BAS DE CARTE -->
      <div class="detail-footer">

        <div class="types-candidature">

          <span class="section-title">
            Types de candidature acceptés
          </span>

          <div
            class="tag-group"
            id="type"></div>

        </div>


        <a
          id="btnNext"
          class="btn-next">
          <span>Suivant</span>
          <i class="fa-solid fa-arrow-right"></i>
        </a>

      </div>

    </div>

  </main>

  <?php include("footer.php"); ?>


  <script type="module">
    import ConcoursController from "../controllers/ConcoursController.js";

    ConcoursController.initDetail();
  </script>

</body>

</html>