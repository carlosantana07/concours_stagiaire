<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Créer un compte - E-CONCOURS</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body class="register-page">

    <?php include("header.php"); ?>

    <main class="register-main">

        <div class="register-layout">

            <aside class="register-presentation">
                <div class="presentation-content">
                    <span class="presentation-eyebrow" style="color: #FFD700;">
                        <i class="fa-solid fa-graduation-cap"></i>
                        PLATEFORME E-CONCOURS
                    </span>

                    <h1>Votre avenir professionnel commence ici !</h1>

                    <p class="presentation-description">
                        Rejoignez E-CONCOURS et simplifiez vos démarches pour accéder aux
                        concours directs et professionnels. Suivez les étapes ci-dessous
                        pour créer votre compte et accéder à votre espace candidat.
                    </p>

                    <div class="presentation-steps">

                        <div class="presentation-step">
                            <span class="step-number">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <div>
                                <h3>1. Informations personnelles</h3>
                                <p>
                                    Renseignez votre identité et vos coordonnées pour
                                    créer votre profil candidat.
                                </p>
                            </div>
                        </div>

                        <div class="presentation-step">
                            <span class="step-number">
                                <i class="fa-solid fa-briefcase"></i>
                            </span>
                            <div>
                                <h3>2. Informations professionnelles</h3>
                                <p>
                                    Complétez les informations relatives à votre situation
                                    professionnelle pour constituer votre dossier.
                                </p>
                            </div>
                        </div>

                        <div class="presentation-step">
                            <span class="step-number">
                                <i class="fa-solid fa-mobile-screen-button"></i>
                            </span>
                            <div>
                                <h3>3. Choix du mode de réception</h3>
                                <p>
                                    Choisissez de recevoir votre code de vérification
                                    (OTP) par SMS ou par e-mail.
                                </p>
                            </div>
                        </div>

                        <div class="presentation-step">
                            <span class="step-number">
                                <i class="fa-solid fa-shield-halved"></i>
                            </span>
                            <div>
                                <h3>4. Vérification du code OTP</h3>
                                <p>
                                    Saisissez le code reçu pour vérifier vos coordonnées
                                    et sécuriser la création de votre compte.
                                </p>
                            </div>
                        </div>

                        <div class="presentation-step">
                            <span class="step-number">
                                <i class="fa-solid fa-right-to-bracket"></i>
                            </span>
                            <div>
                                <h3>5. Connexion à votre compte</h3>
                                <p>
                                    Connectez-vous à l'aide de vos identifiants pour
                                    accéder à votre espace candidat.
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="presentation-footer">
                        <i class="fa-solid fa-rocket"></i>
                        <p>
                            <strong>Prêt à vous lancer ?</strong><br>
                            Votre parcours vers les opportunités professionnelles
                            commence dès maintenant avec E-CONCOURS !
                        </p>
                    </div>
                </div>
            </aside>

            <section class="register-form-panel">

                <div class="register-header">

                    <div class="register-header-icon">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>

                    <div>
                        <span class="register-form-eyebrow">
                            ESPACE CANDIDAT
                        </span>

                        <h2>Créer un compte</h2>

                        <p>
                            Renseignez les informations ci-dessous
                            pour créer votre compte.
                        </p>
                    </div>

                </div>

                <form class="register-form" id="registerForm">

                    <div class="register-section">

                        <div class="section-title">

                            <div class="section-icon">
                                <i class="fa-solid fa-user"></i>
                            </div>

                            <div>
                                <h3>Informations personnelles</h3>
                                <p>Renseignez vos informations d'identité.</p>
                            </div>

                        </div>

                        <div class="form-columns">

                            <div class="form-column">

                                <div class="form-group">
                                    <label>Sexe <span class="required">*</span></label>

                                    <select name="sexe" required>
                                        <option value="">Sélectionnez votre sexe</option>
                                        <option value="HOMME">Homme</option>
                                        <option value="FEMME">Femme</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nom <span class="required">*</span></label>

                                    <input type="text" name="nom"
                                        placeholder="Votre nom de famille" required>
                                </div>

                                <div class="form-group">
                                    <label>Prénom(s) <span class="required">*</span></label>

                                    <input type="text" name="prenom"
                                        placeholder="Vos prénoms" required>
                                </div>

                                <div class="form-group">
                                    <label>Nom de jeune fille</label>

                                    <input type="text" name="nom_jeune_fille"
                                        placeholder="Votre nom de jeune fille">
                                </div>

                                <div class="form-group">
                                    <label>Lieu de naissance <span class="required">*</span></label>

                                    <input type="text" name="lieu_naissance"
                                        placeholder="Votre lieu de naissance" required>
                                </div>

                            </div>

                            <div class="form-column">

                                <div class="form-group">
                                    <label>Date de naissance <span class="required">*</span></label>

                                    <input type="date" name="date_naissance" required>
                                </div>

                                <div class="form-group">
                                    <label>Pays de naissance <span class="required">*</span></label>

                                    <input type="text" name="pays_naissance"
                                        placeholder="Votre pays de naissance" required>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="register-section">

                        <div class="section-title">

                            <div class="section-icon">
                                <i class="fa-solid fa-id-card"></i>
                            </div>

                            <div>
                                <h3>Identité et concours</h3>
                                <p>Informations relatives à votre identité et votre concours.</p>
                            </div>

                        </div>

                        <div class="form-columns">

                            <div class="form-column">

                                <div class="form-group">
                                    <label>Numéro NINA <span class="required">*</span></label>

                                    <input type="text" name="numero_cnib"
                                        placeholder="Numéro de votre NINA" required>
                                </div>

                                <div class="form-group">
                                    <label>Date de délivrance <span class="required">*</span></label>

                                    <input type="date" name="date_delivrance" required>
                                </div>

                                <div class="form-group">
                                    <label>Type de concours <span class="required">*</span></label>

                                    <select name="type_concours" required>
                                        <option value="">Sélectionnez le type de concours</option>
                                        <option value="Direct">Direct</option>
                                        <option value="Professionnel">Professionnel</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-column">

                                <div class="form-group">
                                    <label>Matricule</label>

                                    <input type="text" name="matricule"
                                        placeholder="Votre matricule">
                                </div>

                                <div class="form-group">
                                    <label>Ministère</label>

                                    <input type="text" name="ministere"
                                        placeholder="Votre ministère d'affectation">
                                </div>

                                <div class="form-group">
                                    <label>Emploi actuel</label>

                                    <input type="text" name="emploi"
                                        placeholder="Votre emploi actuel">
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="register-section register-documents-section">

                        <div class="section-title">
                            <div class="section-icon">
                                <i class="fa-solid fa-folder-open"></i>
                            </div>

                            <div>
                                <h3>Documents à fournir</h3>
                                <p>
                                    Ajoutez les documents nécessaires à la constitution de votre dossier.
                                </p>
                            </div>
                        </div>

                        <div class="documents-info">
                            <i class="fa-solid fa-circle-info"></i>
                            <p>
                                Formats acceptés : PDF, JPG, JPEG et PNG.
                                Veillez à fournir des documents lisibles.
                                Certains documents peuvent être exigés selon le concours choisi.
                            </p>
                        </div>

                        <div class="documents-grid">

                            <div class="document-upload-card">
                                <div class="document-upload-icon">
                                    <i class="fa-solid fa-id-card"></i>
                                </div>

                                <div class="document-upload-content">
                                    <label for="documentIdentite">Pièce d'identité</label>
                                    <p>NINA ou pièce d'identité</p>

                                    <label for="documentIdentite" class="document-upload-button">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                        Choisir un fichier
                                    </label>

                                    <input
                                        type="file"
                                        id="documentIdentite"
                                        name="identite"
                                        class="document-file-input"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        data-label="documentIdentiteNom">

                                    <span id="documentIdentiteNom" class="document-file-name">
                                        Aucun fichier sélectionné
                                    </span>
                                </div>
                            </div>

                            <div class="document-upload-card">
                                <div class="document-upload-icon">
                                    <i class="fa-solid fa-passport"></i>
                                </div>

                                <div class="document-upload-content">
                                    <label for="documentNationalite">Certificat de nationalité</label>
                                    <p>Certificat attestant votre nationalité</p>

                                    <label for="documentNationalite" class="document-upload-button">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                        Choisir un fichier
                                    </label>

                                    <input
                                        type="file"
                                        id="documentNationalite"
                                        name="nationalite"
                                        class="document-file-input"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        data-label="documentNationaliteNom">

                                    <span id="documentNationaliteNom" class="document-file-name">
                                        Aucun fichier sélectionné
                                    </span>
                                </div>
                            </div>

                            <div class="document-upload-card">
                                <div class="document-upload-icon">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                </div>

                                <div class="document-upload-content">
                                    <label for="documentMedical">Certificat medical</label>
                                    <p>Diplôme ou attestation équivalente</p>

                                    <label for="documentMedical" class="document-upload-button">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                        Choisir un fichier
                                    </label>

                                    <input
                                        type="file"
                                        id="documentMedical"
                                        name="medical"
                                        class="document-file-input"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        data-label="documentMedicalNom">

                                    <span id="documentMedicalNom" class="document-file-name">
                                        Aucun fichier sélectionné
                                    </span>
                                </div>
                            </div>

                            <div class="document-upload-card">
                                <div class="document-upload-icon">
                                    <i class="fa-solid fa-file-lines"></i>
                                </div>

                                <div class="document-upload-content">
                                    <label for="documentNaissance">Acte de naissance</label>
                                    <p>Acte ou extrait de naissance</p>

                                    <label for="documentNaissance" class="document-upload-button">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                        Choisir un fichier
                                    </label>

                                    <input
                                        type="file"
                                        id="documentNaissance"
                                        name="acte"
                                        class="document-file-input"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        data-label="documentNaissanceNom">

                                    <span id="documentNaissanceNom" class="document-file-name">
                                        Aucun fichier sélectionné
                                    </span>
                                </div>
                            </div>

                            <div class="document-upload-card">
                                <div class="document-upload-icon">
                                    <i class="fa-solid fa-file-circle-check"></i>
                                </div>

                                <div class="document-upload-content">
                                    <label for="documentEquivalence">Lettre d'équivalence</label>
                                    <p>À fournir si applicable</p>

                                    <label for="documentEquivalence" class="document-upload-button">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                        Choisir un fichier
                                    </label>

                                    <input
                                        type="file"
                                        id="documentEquivalence"
                                        name="equivalence"
                                        class="document-file-input"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        data-label="documentEquivalenceNom">

                                    <span id="documentEquivalenceNom" class="document-file-name">
                                        Aucun fichier sélectionné
                                    </span>
                                </div>
                            </div>

                            <div class="document-upload-card">
                                <div class="document-upload-icon">
                                    <i class="fa-solid fa-file-signature"></i>
                                </div>

                                <div class="document-upload-content">
                                    <label for="documentHabilitation">Arrêté d'habilitation</label>
                                    <p>Arrêté ou document d'habilitation</p>

                                    <label for="documentHabilitation" class="document-upload-button">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                        Choisir un fichier
                                    </label>

                                    <input
                                        type="file"
                                        id="documentHabilitation"
                                        name="arrete_habilitation"
                                        class="document-file-input"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        data-label="documentHabilitationNom">

                                    <span id="documentHabilitationNom" class="document-file-name">
                                        Aucun fichier sélectionné
                                    </span>
                                </div>
                            </div>

                            <!-- <div class="document-upload-card document-upload-card-full">
                                <div class="document-upload-icon">
                                    <i class="fa-solid fa-heart-pulse"></i>
                                </div>

                                <div class="document-upload-content">
                                    <label for="documentCertificat">Certificat médical</label>
                                    <p>Certificat médical établi par un professionnel habilité</p>

                                    <label for="documentCertificat" class="document-upload-button">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                        Choisir un fichier
                                    </label>

                                    <input
                                        type="file"
                                        id="documentCertificat"
                                        name="medical"
                                        class="document-file-input"
                                        accept=".pdf,.jpg,.jpeg,.png"
                                        data-label="documentCertificatNom">

                                    <span id="documentCertificatNom" class="document-file-name">
                                        Aucun fichier sélectionné
                                    </span>
                                </div> 
                            </div> -->

                        </div>

                        <div class="documents-security">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>
                                Vos documents contiennent des informations personnelles.
                                Assurez-vous de transmettre uniquement les pièces nécessaires
                                à votre candidature.
                            </span>
                        </div>

                    </div>


                    <div class="register-section">

                        <div class="section-title">

                            <div class="section-icon">
                                <i class="fa-solid fa-address-book"></i>
                            </div>

                            <div>
                                <h3>Coordonnées</h3>
                                <p>Ces informations seront utilisées pour vous contacter.</p>
                            </div>

                        </div>

                        <div class="form-columns">

                            <div class="form-column">

                                <div class="form-group">
                                    <label>Téléphone <span class="required">*</span></label>

                                    <input type="text" name="telephone"
                                        placeholder="+223 XX XX XX XX" required>
                                </div>

                                <div class="form-group">
                                    <label>Confirmer téléphone <span class="required">*</span></label>

                                    <input type="text" name="telephone_confirm"
                                        placeholder="Confirmez votre numéro" required>
                                </div>

                            </div>

                            <div class="form-column">

                                <div class="form-group">
                                    <label>Email <span class="required">*</span></label>

                                    <input type="email" name="email"
                                        placeholder="exemple@gmail.com" required>
                                </div>

                                <div class="form-group">
                                    <label>Confirmer email <span class="required">*</span></label>

                                    <input type="email" name="email_confirm"
                                        placeholder="Confirmez votre email" required>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="register-section">

                        <div class="section-title">

                            <div class="section-icon">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>

                            <div>
                                <h3>Sécurité du compte</h3>
                                <p>Définissez vos informations de connexion.</p>
                            </div>

                        </div>

                        <div class="form-columns">

                            <div class="form-column">

                                <div class="form-group">
                                    <label>Mot de passe <span class="required">*</span></label>

                                    <div class="password-field">

                                        <input type="password" name="mot_de_passe"
                                            id="registerPassword"
                                            placeholder="Minimum 8 caractères" required>

                                        <button type="button" class="password-toggle"
                                            onclick="toggleRegisterPassword('registerPassword', this)"
                                            aria-label="Afficher le mot de passe">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>

                                    </div>
                                </div>

                            </div>

                            <div class="form-column">

                                <div class="form-group">
                                    <label>Confirmer mot de passe <span class="required">*</span></label>

                                    <div class="password-field">

                                        <input type="password" name="mot_de_passe_confirm"
                                            id="registerPasswordConfirm"
                                            placeholder="Confirmez votre mot de passe" required>

                                        <button type="button" class="password-toggle"
                                            onclick="toggleRegisterPassword('registerPasswordConfirm', this)"
                                            aria-label="Afficher le mot de passe">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>

                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="otp-choice">

                            <div class="form-group">
                                <label>
                                    Recevoir le code OTP par
                                    <span class="required">*</span>
                                </label>

                                <select name="choix" required>
                                    <option value="">Choisir une option</option>
                                    <option value="mail">Email</option>
                                    <option value="sms">SMS</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <p id="formMessage" class="form-message"></p>

                    <div class="register-actions">

                        <button type="submit" class="btn-primary register-submit">
                            <i class="fa-solid fa-user-plus"></i>
                            <span>Créer mon compte</span>
                        </button>

                    </div>

                    <p class="register-login-link">
                        Vous avez déjà un compte ?
                        <a href="connexion.php">Connectez-vous</a>
                    </p>

                </form>

            </section>

        </div>

    </main>

    <?php include("footer.php"); ?>

    <script type="module">
        import AuthController from "../controllers/authController.js";

        document.addEventListener("DOMContentLoaded", () => {
            AuthController.initRegister();
        });
    </script>

    <script>
        window.toggleRegisterPassword = function(inputId, button) {
            const input = document.getElementById(inputId);
            const icon = button.querySelector("i");

            if (!input || !icon) {
                return;
            }

            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
                button.setAttribute("aria-label", "Masquer le mot de passe");
            } else {
                input.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
                button.setAttribute("aria-label", "Afficher le mot de passe");
            }
        };

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".document-file-input").forEach(input => {
                input.addEventListener("change", () => {
                    const labelId = input.dataset.label;
                    const label = document.getElementById(labelId);

                    if (!label) {
                        return;
                    }

                    const fichiers = Array.from(input.files || []);

                    if (fichiers.length === 0) {
                        label.textContent = "Aucun fichier sélectionné";
                        label.classList.remove("has-files");
                        return;
                    }

                    label.textContent = fichiers
                        .map(fichier => fichier.name)
                        .join(", ");

                    label.classList.add("has-files");
                });
            });
        });
    </script>

</body>

</html>