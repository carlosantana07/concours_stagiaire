<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Détail concours</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

  <?php include("header.php"); ?>

  <main>

    <main>
      <div class="detail-card">
        <h1 style="color: #16A34A;" id="titreConcours"></h1>

        <div class="description-section">
          <div class="info-header">
            <span class="info-icon" style="color: #16A34A"> <strong>ⓘ</strong></span>
            <strong style="color: #16A34A">Description du concours</strong>
          </div>
          <p id="desc1"></p>
          <p>
            Les candidats admis suivront une formation initiale avant leur
            intégration définitive. Sont autorisés à se présenter les citoyens
            remplissant les conditions générales d'accès aux emplois publics
            et titulaires des diplômes requis pour chaque spécialité.
          </p>
        </div>

        <div class="meta-grid">
          <div class="meta-item">
            <div class="label-with-icon">
              <span class="icon-placeholder" style="color: #16A34A;"><i class="fas fa-file-invoice-dollar"></i></span>

              <span class="label">Frais d'inscription</span>
            </div>
            <span class="value" id="frais"></span>

          </div>
          <div class="meta-item">
            <div class="label-with-icon">
              <span class="icon-placeholder" style="color: #16A34A;"><i class="fas fa-calendar-alt"></i></span>
              <span class="label">Date de début</span>
            </div>
            <span class="value" id="dateDebut"></span>
          </div>
          <div class="meta-item">
            <div class="label-with-icon">
              <span class="icon-placeholder" style="color: #16A34A;"><i class="fas fa-calendar-check"></i></span>
              <span class="label">Date de fin</span>
            </div>
            <span class="value" id="dateFin"></span>
          </div>
          <div class="meta-item">
            <span class="label">Statut</span>
            <span class="status-badge" id="statut"></span>
          </div>
        </div>

        <div class="footer">
          <div class="types-candidature">
            <span class="section-title">Types de candidature acceptés :</span>
            <div class="tag-group" id="type"></div>
          </div>
          <a id="btnNext" class="btn-next">Suivant &rarr;</a>
        </div>
      </div>
    </main>

  </main>

  <?php include("footer.php"); ?>


  <script type="module">
    import ConcoursController from "../controllers/ConcoursController.js";

    ConcoursController.initDetail();
  </script>

</body>

</html>