<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

  <main class="profile-page">
    <div class="profile-container">

      <!-- ===== HEADER PROFIL ===== -->
      <h1 class="profile-title">Mon Profil</h1>
      <div class="profil-grid">
        <section class="profile-card profile-header-card">
          <div class="profile-header">
            <div class="profile-avatar">
              <i class="fa-solid fa-user"></i>
            </div>
            <div class="profile-name"></div>
          </div>
        </section>
      </div>

      <!-- ===== INFOS PERSONNELLES ===== -->
      <section class="profile-card">
        <div class="profile-card-header">
          <h3>Informations personnelles</h3>
          <a class="profile-btn-outline" href="#">Modifier</a>
        </div>

        <div class="profile-grid">
          <div><strong>Nom</strong><br></div>
          <div><strong>Prénom</strong><br></div>
          <div><strong>Date de naissance</strong><br></div>
          <div><strong>Lieu de naissance</strong><br></div>
          <div><strong>Téléphone</strong><br></div>
          <div><strong>Email</strong><br></div>
        </div>
      </section>

      <!-- ===== INFOS PROFESSIONNELLES ===== -->
      <section class="profile-card">
        <div class="profile-card-header">
          <h3>Informations professionnelles</h3>
          <a class="profile-btn-outline" href="#">Modifier</a>
        </div>

        <div class="profile-grid">
          <div><strong>Matricule</strong><br>MI-03272</div>
          <div><strong>Ministère</strong><br>Transition digitale</div>
          <div><strong>Emploi actuel</strong><br>Développeur</div>
        </div>
      </section>

      <!-- ===== MES CANDIDATURES ===== -->
      <section class="profile-card">
        <div class="profile-card-header">
          <h3>Mes candidatures</h3>
          <a class="profile-btn-outline" href="#">Voir tout</a>
        </div>

        <div class="profile-table">
          <div class="profile-row header">
            <span>Concours</span>
            <span>Statut</span>
          </div>

          <div class="profile-row">
            <span>Santé</span>
            <span class="status paid">Payé</span>
          </div>

          <div class="profile-row">
            <span>Education</span>
            <span class="status unpaid">Pas payé</span>
          </div>

          <div class="profile-row">
            <span>Douanes</span>
            <span class="status paid">Payé</span>
          </div>
        </div>
      </section>

    </div>
  </main>
  
  <script type="module">
    import CandidatController from "../controllers/CandidatController.js";

    document.addEventListener("DOMContentLoaded", () => {
      CandidatController.loadProfil();
    });
  </script>

</body>

</html>