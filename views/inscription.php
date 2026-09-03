<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des concours</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body style="padding-top: 80px;">

    <!-- ===== HEADER ===== -->
    <?php include("header.php") ?>

    <section class="register-page">

    <div class="register-container">

        <!-- EN-TÊTE -->
        <div class="register-header">

            <div class="register-header-icon">
                <i class="fa-solid fa-user-plus"></i>
            </div>

            <div>
                <h1>Créer un compte</h1>

                <p>
                    Créez votre compte pour accéder aux concours
                    et gérer vos candidatures en ligne.
                </p>
            </div>

        </div>


        <!-- FORMULAIRE -->
        <form class="register-form" id="registerForm">

            <!-- =========================================
                 INFORMATIONS PERSONNELLES
            ========================================== -->
            <div class="register-section">

                <div class="section-title">

                    <div class="section-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div>
                        <h2>Informations personnelles</h2>
                        <p>Renseignez vos informations d'identité.</p>
                    </div>

                </div>


                <div class="form-columns">

                    <!-- COLONNE GAUCHE -->
                    <div class="form-column">

                        <div class="form-group">
                            <label>
                                Sexe <span class="required">*</span>
                            </label>

                            <select name="sexe" required>
                                <option value="">
                                    Sélectionnez votre sexe
                                </option>

                                <option value="HOMME">
                                    Homme
                                </option>

                                <option value="FEMME">
                                    Femme
                                </option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>
                                Nom <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="nom"
                                placeholder="Votre nom de famille"
                                required
                            >
                        </div>


                        <div class="form-group">
                            <label>
                                Prénom(s) <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="prenom"
                                placeholder="Vos prénoms"
                                required
                            >
                        </div>


                        <div class="form-group">
                            <label>
                                Nom de jeune fille
                            </label>

                            <input
                                type="text"
                                name="nom_jeune_fille"
                                placeholder="Votre nom de jeune fille"
                            >
                        </div>


                        <div class="form-group">
                            <label>
                                Lieu de naissance <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="lieu_naissance"
                                placeholder="Votre lieu de naissance"
                                required
                            >
                        </div>

                    </div>


                    <!-- COLONNE DROITE -->
                    <div class="form-column">

                        <div class="form-group">
                            <label>
                                Date de naissance <span class="required">*</span>
                            </label>

                            <input
                                type="date"
                                name="date_naissance"
                                required
                            >
                        </div>


                        <div class="form-group">
                            <label>
                                Pays de naissance <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="pays_naissance"
                                placeholder="Votre pays de naissance"
                                required
                            >
                        </div>

                    </div>

                </div>

            </div>


            <!-- =========================================
                 IDENTITÉ ET CONCOURS
            ========================================== -->
            <div class="register-section">

                <div class="section-title">

                    <div class="section-icon">
                        <i class="fa-solid fa-id-card"></i>
                    </div>

                    <div>
                        <h2>Identité et concours</h2>
                        <p>Informations relatives à votre identité et votre concours.</p>
                    </div>

                </div>


                <div class="form-columns">

                    <!-- COLONNE GAUCHE -->
                    <div class="form-column">

                        <div class="form-group">
                            <label>
                                Numéro CNIB <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="numero_cnib"
                                placeholder="Numéro de votre CNIB"
                                required
                            >
                        </div>


                        <div class="form-group">
                            <label>
                                Date de délivrance <span class="required">*</span>
                            </label>

                            <input
                                type="date"
                                name="date_delivrance"
                                required
                            >
                        </div>


                        <div class="form-group">
                            <label>
                                Type de concours <span class="required">*</span>
                            </label>

                            <select
                                required
                                name="type_concours"
                            >
                                <option value="">
                                    Sélectionnez le type de concours
                                </option>

                                <option value="Direct">
                                    Direct
                                </option>

                                <option value="Professionnel">
                                    Professionnel
                                </option>
                            </select>
                        </div>

                    </div>


                    <!-- COLONNE DROITE -->
                    <div class="form-column">

                        <div class="form-group">
                            <label>
                                Matricule
                            </label>

                            <input
                                type="text"
                                name="matricule"
                                placeholder="Votre matricule"
                            >
                        </div>


                        <div class="form-group">
                            <label>
                                Ministère
                            </label>

                            <input
                                type="text"
                                name="ministere"
                                placeholder="Votre ministère d'affectation"
                            >
                        </div>


                        <div class="form-group">
                            <label>
                                Emploi actuel
                            </label>

                            <input
                                type="text"
                                name="emploi"
                                placeholder="Votre emploi actuel"
                            >
                        </div>

                    </div>

                </div>

            </div>


            <!-- =========================================
                 COORDONNÉES
            ========================================== -->
            <div class="register-section">

                <div class="section-title">

                    <div class="section-icon">
                        <i class="fa-solid fa-address-book"></i>
                    </div>

                    <div>
                        <h2>Coordonnées</h2>
                        <p>Ces informations seront utilisées pour vous contacter.</p>
                    </div>

                </div>


                <div class="form-columns">

                    <!-- GAUCHE -->
                    <div class="form-column">

                        <div class="form-group">
                            <label>
                                Téléphone <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="telephone"
                                placeholder="+226 XX XX XX XX"
                                required
                            >
                        </div>


                        <div class="form-group">
                            <label>
                                Confirmer téléphone
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="telephone_confirm"
                                placeholder="Confirmez votre numéro"
                                required
                            >
                        </div>

                    </div>


                    <!-- DROITE -->
                    <div class="form-column">

                        <div class="form-group">
                            <label>
                                Email <span class="required">*</span>
                            </label>

                            <input
                                type="email"
                                name="email"
                                placeholder="exemple@gmail.com"
                                required
                            >
                        </div>


                        <div class="form-group">
                            <label>
                                Confirmer email
                                <span class="required">*</span>
                            </label>

                            <input
                                type="email"
                                name="email_confirm"
                                placeholder="Confirmez votre email"
                                required
                            >
                        </div>

                    </div>

                </div>

            </div>


            <!-- =========================================
                 SÉCURITÉ
            ========================================== -->
            <div class="register-section">

                <div class="section-title">

                    <div class="section-icon">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>

                    <div>
                        <h2>Sécurité du compte</h2>
                        <p>Définissez vos informations de connexion.</p>
                    </div>

                </div>


                <div class="form-columns">

                    <!-- GAUCHE -->
                    <div class="form-column">

                        <div class="form-group">
                            <label>
                                Mot de passe
                                <span class="required">*</span>
                            </label>

                            <div class="password-field">

                                <input
                                    type="password"
                                    name="mot_de_passe"
                                    id="registerPassword"
                                    placeholder="Minimum 8 caractères"
                                    required
                                >

                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="toggleRegisterPassword('registerPassword', this)"
                                    aria-label="Afficher le mot de passe"
                                >
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                            </div>
                        </div>

                    </div>


                    <!-- DROITE -->
                    <div class="form-column">

                        <div class="form-group">
                            <label>
                                Confirmer mot de passe
                                <span class="required">*</span>
                            </label>

                            <div class="password-field">

                                <input
                                    type="password"
                                    name="mot_de_passe_confirm"
                                    id="registerPasswordConfirm"
                                    placeholder="Confirmez votre mot de passe"
                                    required
                                >

                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="toggleRegisterPassword('registerPasswordConfirm', this)"
                                    aria-label="Afficher le mot de passe"
                                >
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                            </div>
                        </div>

                    </div>

                </div>


                <!-- OTP -->
                <div class="otp-choice">

                    <div class="form-group">

                        <label>
                            Recevoir le code OTP par
                            <span class="required">*</span>
                        </label>

                        <select name="choix" required>

                            <option value="">
                                Choisir une option
                            </option>

                            <option value="mail">
                                Email
                            </option>

                            <option value="sms">
                                SMS
                            </option>

                        </select>

                    </div>

                </div>

            </div>


            <!-- MESSAGE -->
            <p
                id="formMessage"
                class="form-message"
            ></p>


            <!-- ACTION -->
            <div class="register-actions">

                <button
                    type="submit"
                    class="btn-primary register-submit"
                >
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Créer mon compte</span>
                </button>

            </div>

        </form>

    </div>

</section>
    <!-- ===== FOOTER ===== -->
    <?php include("footer.php") ?>
  
    
    <script type="module">
        import AuthController from "../controllers/AuthController.js";

        document.addEventListener("DOMContentLoaded", () => {
            AuthController.initRegister();
        });
    </script>

</body>

</html>