<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Connexion | E-CONCOURS</title>

    <link rel="stylesheet" href="../assets/css/style.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    <main class="login-page">

        <!-- ==============================
             PARTIE GAUCHE
        =============================== -->
        <section class="login-brand">

            <div class="brand-content">

                <div class="brand-logo">
                    <div class="logo-icon">
                        <i class="fas fa-landmark"></i>
                    </div>

                    <div>
                        <span class="brand-name">E-CONCOURS</span>
                        <span class="brand-subtitle">Plateforme nationale des concours</span>
                    </div>
                </div>


                <div class="brand-message">

                    <!-- <span class="brand-badge">
                        <i class="fas fa-shield-halved"></i>
                        Plateforme officielle
                    </span> -->

                    <h2>
                        Votre carrière publique
                        <strong>commence ici.</strong>
                    </h2>

                    <p>
                        Accédez à votre espace personnel pour consulter
                        les concours, suivre vos candidatures et gérer
                        vos informations.
                    </p>

                </div>


                <div class="brand-features">

                    <div class="brand-feature">
                        <div class="feature-icon">
                            <i class="fas fa-file-circle-check"></i>
                        </div>

                        <div>
                            <strong>Vos candidatures</strong>
                            <span>Suivez vos inscriptions en temps réel</span>
                        </div>
                    </div>


                    <div class="brand-feature">
                        <div class="feature-icon">
                            <i class="fas fa-bell"></i>
                        </div>

                        <div>
                            <strong>Restez informé</strong>
                            <span>Recevez les informations importantes</span>
                        </div>
                    </div>


                    <div class="brand-feature">
                        <div class="feature-icon">
                            <i class="fas fa-lock"></i>
                        </div>

                        <div>
                            <strong>Espace sécurisé</strong>
                            <span>Vos données sont protégées</span>
                        </div>
                    </div>

                </div>

            </div>


            <div class="brand-footer">
                <span>© 2026 E-CONCOURS</span>
                <span>•</span>
                <span>Service public numérique</span>
            </div>

        </section>


        <!-- ==============================
             PARTIE DROITE
        =============================== -->
        <section class="login-section">

            <div class="login-container">

                <!-- HEADER -->
                <div class="login-header">

                    <div class="login-icon">
                        <i class="fas fa-user"></i>
                    </div>

                    <div>
                        <!-- <span class="login-eyebrow">ESPACE CANDIDAT</span> -->

                        <h1 style="color: #0357A8;">Bienvenue</h1>

                        <p>
                            Connectez-vous à votre espace personnel
                        </p>
                    </div>

                </div>


                <!-- FORMULAIRE -->
                <form class="login-form" id="loginForm">

                    <!-- Téléphone -->
                    <div class="form-group">

                        <label for="telephone">
                            Numéro de téléphone
                        </label>

                        <div class="input-group">
                            <i class="fas fa-phone input-icon"></i>
                            <input
                                style="outline: none;"
                                type="text"
                                id="telephone"
                                name="telephone"
                                placeholder="01 23 45 67 89"
                                autocomplete="tel"
                                required>

                        </div>

                    </div>


                    <!-- Mot de passe -->
                    <div class="form-group">

                        <div class="label-row">

                            <label for="password">
                                Mot de passe
                            </label>

                            <a href="mdp_oublie.php" class="forgot-password">
                                Mot de passe oublié ?
                            </a>

                        </div>


                        <div class="input-group">

                            <i class="fas fa-lock input-icon"></i>

                            <input
                                type="password"
                                id="password"
                                name="mot_de_passe"
                                placeholder="Votre mot de passe"
                                autocomplete="current-password"
                                required>

                            <button
                                type="button"
                                class="toggle-password"
                                onclick="togglePassword()"
                                aria-label="Afficher le mot de passe">
                                <i class="fas fa-eye"></i>
                            </button>

                        </div>

                    </div>


                    <!-- Erreur -->
                    <p id="formError" class="form-error"></p>


                    <!-- Bouton -->
                    <button type="submit" class="btn-primary">

                        <span>Se connecter</span>

                        <i class="fas fa-arrow-right"></i>

                    </button>


                    <!-- Séparation -->
                    <div class="form-divider">
                        <span>ou</span>
                    </div>


                    <!-- Inscription -->
                    <div class="register-link">

                        <span>
                            Vous n'avez pas encore de compte ?
                        </span>

                        <a href="inscription.php">
                            Créer un compte
                            <i class="fas fa-arrow-right"></i>
                        </a>

                    </div>

                </form>


                <!-- Sécurité -->
                <div class="security-note">

                    <i class="fas fa-shield-halved"></i>

                    <span>
                        Connexion sécurisée - Vos informations sont protégées
                    </span>

                </div>

            </div>

        </section>

    </main>


    <script type="module">
        import AuthController from "../controllers/AuthController.js";

        document.addEventListener("DOMContentLoaded", () => {
            AuthController.initLogin();
        });
    </script>

</body>

</html>