<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mon Profil - E-CONCOURS</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

  <?php include("header.php") ?>

  <main class="profil-page">
    <div class="profil-wrap">

      <!-- HERO CARD -->
      <div class="profil-hero-card">
        <div class="profil-banner"></div>
        <div class="profil-hero-body">
          <div class="profil-hero-left">
            <div class="profil-avatar" id="profileAvatar"></div>
            <div class="profil-hero-info">
              <p class="profil-name"></p>
              <p class="profil-email"></p>
            </div>
          </div>
          <button class="profil-btn-modifier btn-edit" id="btnEditProfilPerso">
            <i class="fa-solid fa-pen-to-square"></i> Modifier
          </button>
        </div>
      </div>

      <!-- TABS -->
      <div class="profil-tabs-card">
        <div class="profil-tabs-nav">
          <button class="profil-tab active" data-tab="informations">
            <i class="fa-solid fa-user"></i> Informations
          </button>
          <button class="profil-tab" data-tab="securite">
            <i class="fa-solid fa-shield"></i> Sécurité
          </button>
          <button class="profil-tab" data-tab="candidatures">
            <i class="fa-solid fa-file-lines"></i> Mes candidatures
          </button>
        </div>
      </div>

      <!-- TAB INFORMATIONS -->
      <div class="profil-tab-content active1" id="tab-informations">
        <div class="profil-two-col">

          <div class="profil-card">
            <div class="profil-card-title">
              <i class="fa-solid fa-user" style="color:#9ca3af"></i>
              <span>Identité</span>
            </div>
            <div class="profil-divider"></div>
            <div class="profil-fields">
              <div class="profil-field">
                <p class="profil-label">NOM</p>
                <p class="profil-value" id="infoNom">-</p>
              </div>
              <div class="profil-field">
                <p class="profil-label">PRÉNOM(S)</p>
                <p class="profil-value" id="infoPrenom">-</p>
              </div>
              
              <div class="profil-field">
                <p class="profil-label">
                  <i class="fa-regular fa-calendar" style="color:#9ca3af; margin-right:4px;"></i>
                  DATE DE NAISSANCE
                </p>
                <p class="profil-value" id="infoDateNaissance">-</p>
              </div>
              <div class="profil-field">
                <p class="profil-label">LIEU DE NAISSANCE</p>
                <p class="profil-value" id="infoLieuNaissance">-</p>
              </div>

              <div class="profil-field">
                <p class="profil-label">MINISTÈRE</p>
                <p class="profil-value" id="infoMinistere">-</p>
              </div>

              <div class="profil-field">
                <p class="profil-label">EMPLOI</p>
                <p class="profil-value" id="infoEmploi">-</p> 
              </div>

            <div class="profil-field">
                <p class="profil-label">MATRICULE</p>
                <p class="profil-value" id="infoMatricule">-</p>
              </div>

            </div>
          </div>

          <div class="profil-card">
            <div class="profil-card-title">
              <i class="fa-solid fa-location-dot" style="color:#9ca3af"></i>
              <span>Contact &amp; Adresse</span>
            </div>
            <div class="profil-divider"></div>
            <div class="profil-fields">
              <div class="profil-field">
                <p class="profil-label">
                  <i class="fa-regular fa-envelope" style="color:#9ca3af; margin-right:4px;"></i>
                  EMAIL
                </p>
                <p class="profil-value" id="infoEmail">-</p>
              </div>
              <div class="profil-field">
                <p class="profil-label">
                  <i class="fa-solid fa-phone" style="color:#9ca3af; margin-right:4px;"></i>
                  TÉLÉPHONE
                </p>
                <p class="profil-value" id="infoTelephone">-</p>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- TAB SECURITE -->
      <div class="profil-tab-content" id="tab-securite">
        <div class="profil-card" style="max-width:560px;">
          <div class="profil-card-title">
            <i class="fa-solid fa-shield" style="color:#9ca3af"></i>
            <span>Sécurité du compte</span>
          </div>
          <div class="profil-divider"></div>
          <div class="profil-fields">
            <div class="profil-field">
              <p class="profil-label">MOT DE PASSE ACTUEL</p>
              <input type="password" class="profil-input" placeholder="••••••••">
            </div>
            <div class="profil-field">
              <p class="profil-label">NOUVEAU MOT DE PASSE</p>
              <input type="password" class="profil-input" placeholder="••••••••">
              <small style="color:#9ca3af;font-size:12px;margin-top:4px;">Minimum 8 caractères, avec au moins une majuscule et un chiffre.</small>
            </div>
            <div class="profil-field">
              <p class="profil-label">CONFIRMER LE MOT DE PASSE</p>
              <input type="password" class="profil-input" placeholder="••••••••">
            </div>
            <button class="profil-btn-save">
              <i class="fa-solid fa-lock"></i> Changer le mot de passe
            </button>
          </div>
        </div>
      </div>

      <!-- TAB CANDIDATURES -->
      <div class="profil-tab-content" id="tab-candidatures">
        <div class="profil-card">
          <div class="profil-cand-header">
            <div class="profil-card-title" style="margin:0;border:none;padding:0;">
              <i class="fa-solid fa-file-lines" style="color:#9ca3af"></i>
              <span>Mes candidatures</span>
            </div>
            <a class="profil-voir-tout" id="btnVoirCandidatures">
              Voir toutes <i class="fa-solid fa-chevron-right"></i>
            </a>
          </div>
          <div class="profil-divider"></div>
          <div id="candidaturesContainer" class="profil-cand-list">
            <div class="profil-cand-row header">
              <span>Concours</span>
              <span>Statut</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>

  <script>
    document.querySelectorAll(".profil-tab").forEach(tab => {
      tab.addEventListener("click", () => {
        document.querySelectorAll(".profil-tab").forEach(t => t.classList.remove("active"));
        document.querySelectorAll(".profil-tab-content").forEach(c => c.classList.remove("active"));
        tab.classList.add("active");
        document.getElementById("tab-" + tab.dataset.tab).classList.add("active");
      });
    });
  </script>

  <script type="module">
    import CandidatController from "../controllers/CandidatController.js";
    document.addEventListener("DOMContentLoaded", () => {
      CandidatController.loadProfil();
      CandidatController.initModal();
      CandidatController.initUpdateForm();
      CandidatController.initCandidaturesModal();
      CandidatController.loadMoreCandidatures();
    });
  </script>

  <?php include("../views/modal_profil.php"); ?>

</body>
</html>