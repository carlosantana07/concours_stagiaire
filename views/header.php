<header>
    <div class="logo">
        <img src="../assets/image/armoiries-1.png" alt="logo" height="40">
        E-CONCOURS
    </div>

    <nav>
        <a href="accueil.php">Accueil</a>
        <a href="liste_concours.php">Concours</a>
        <a href="">Ministères</a>
        <a href="contact.php">Contactez-nous</a>
        <a href="aide.php">Aide</a>
    </nav>

    <div class="nav-buttons">

        <!-- utilisateur NON connecté -->
        <div id="guest-buttons">
            <a class="btn-secondary" href="connexion.php">Mon compte</a>
            <a class="btn-primary" href="inscription.php">Créer un compte</a>
        </div>

        <!-- utilisateur connecté -->
        <div class="account-wrapper" id="account-wrapper" style="display:none;">
            <button class="btn-secondary" onclick="toggleMenu()">
                Mon compte <i class="fa fa-chevron-down"></i>
            </button>

            <div class="account-menu" id="accountMenu">
                <a href="profil.php"><i class="fa fa-user"></i> Mon profil</a>
                <a href="resultat.php"><i class="fa fa-chart-bar"></i> Mes résultats</a>
                <a href="#" onclick="logout()"><i class="fa fa-sign-out"></i> Se déconnecter</a>
            </div>
        </div>

    </div>
    <script>
        function toggleMenu() {
            const menu = document.getElementById("accountMenu");
            menu.style.display = menu.style.display === "block" ? "none" : "block";
        }

        // fermer menu si clic dehors
        document.addEventListener("click", function (e) {
            const wrapper = document.getElementById("account-wrapper");

            if (wrapper && !wrapper.contains(e.target)) {
                document.getElementById("accountMenu").style.display = "none";
            }
        });

        // logout
        function logout() {
            localStorage.removeItem("token");
            alert("Déconnecté");

            window.location.href = "connexion.php";
        }

        // gestion affichage login / guest
        window.addEventListener("DOMContentLoaded", () => {
            const token = localStorage.getItem("token");

            const guest = document.getElementById("guest-buttons");
            const account = document.getElementById("account-wrapper");

            if (token) {
                guest.style.display = "none";
                account.style.display = "inline-block";
            } else {
                guest.style.display = "inline-block";
                account.style.display = "none";
            }
        });
    </script>
</header>