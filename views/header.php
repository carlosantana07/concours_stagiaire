<header>
    <div class="logo">
        <img src="../assets/image/armoiries-1.png" alt="logo" height="40">
        E-CONCOURS
    </div>

    <nav>
        <a href="accueil.php">Accueil</a>
        <a href="liste_concours.php">Concours</a>
        <!-- <a href="">Ministères</a> -->
        <a href="contact.php">Contactez-nous</a>
        <a href="aide.php">Aide</a>
    </nav>

    <div class="nav-buttons">

        <!-- utilisateur NON connecté -->
        <div id="guest-buttons" class="guest-button">
            <a class="btn-primary" href="inscription.php">Créer un compte</a>
            <a class="btn-secondary" href="connexion.php">Se connecter</a>
        </div>

        <!-- utilisateur connecté -->
        <div class="account-wrapper" id="account-wrapper" style="display:none;">
            <button class="btn-secondary" onclick="toggleMenu()">
                Mon compte <i class="fa fa-chevron-down"></i>
            </button>

            <div class="account-menu" id="accountMenu">
                <a href="profil.php"><i class="fa fa-user"></i> Mon profil</a>
                <a href="resultat.php"><i class="fa fa-chart-bar"></i> Mes résultats</a>
                <a href="#" style="color: red;" onclick="logout()"><i class="fa fa-sign-out"></i> Se déconnecter</a>
            </div>
        </div>

    </div>
    <script src="../assets/js/script.js"></script>
</header>