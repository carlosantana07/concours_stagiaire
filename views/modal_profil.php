<!-- MODAL -->
<div id="modalProfil" class="modal hidden" style="padding-top: 80px;">

    <div class="modal-content large">

        <div class="modal-header" style="color: black; display: flex; justify-content: center; align-items: center;">
            <h4>Modifier mon profil</h4>
            <span class="close-btn">&times;</span>
        </div>

        <form id="formUpdateProfil" class="modal-form">

            <h4>Informations personnelles</h4>

            <div class="form-group">
                <input name="nom" placeholder="Nom" class="input">
            </div>

            <div class="form-group">
                <input name="prenom" placeholder="Prénom" class="input">
            </div>

            <div class="form-group">
                <input name="date_naissance" placeholder="Date de naissance" class="input">
            </div>

            <div class="form-group">
                <input name="lieu_naissance" placeholder="Lieu de naissance" class="input">
            </div>

            <div class="form-group">
                <input name="telephone" placeholder="Téléphone" class="input">
            </div>

            <div class="form-group">
                <input name="email" placeholder="Email" class="input">
            </div>

            <h4>Informations professionnelles</h4>

            <div class="form-group">
                <input name="emploi" placeholder="Emploi" class="input">
            </div>

            <div class="form-group">
                <input name="ministere" placeholder="Ministère" class="input">
            </div>

            <div class="form-group">
                <input name="matricule" placeholder="Matricule" class="input">
            </div>

            <p id="profilMessage" class="form-message"></p>

            <button type="submit" class="btn-primary full">Enregistrer</button>

        </form>

    </div>
</div>

<div id="modalCandidatures" class="modal hidden">

  <div class="modal-content large">

    <div class="modal-header">
      <h4 style="color: #035629;">Mes candidatures</h4>
      <span class="close-candidatures">&times;</span>
    </div>

    <div id="candidaturesModalContainer" class="candidatures-scroll" style="color: black;">
      <!-- contenu dynamique -->
    </div>

    <div id="loading" class="loading hidden">Chargement...</div>

  </div>
</div>