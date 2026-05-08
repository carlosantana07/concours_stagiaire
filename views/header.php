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
                <a id="profilLink"><i class="fa fa-user"></i> Mon profil</a>
                <a href="resultat.php"><i class="fa fa-chart-bar"></i> Mes résultats</a>
                <a href="#" style="color: red;" onclick="logout()"><i class="fa fa-sign-out"></i> Se déconnecter</a>
            </div>
        </div>

    </div>

    <div id="pageLoader" class="page-loader hidden">

        <svg class="loader-svg" viewBox="0 0 100 100">
            <img src="../assets/image/bf_loader_v3.svg" alt="">
        </svg>

    </div>

    <script>
        function toggleMenu() {
            const menu = document.getElementById("accountMenu");
            menu.style.display = menu.style.display === "block" ? "none" : "block";
        }

        // fermer menu si clic dehors
        document.addEventListener("click", function(e) {
            const wrapper = document.getElementById("account-wrapper");

            if (wrapper && !wrapper.contains(e.target)) {
                document.getElementById("accountMenu").style.display = "none";
            }
        });

        // logout
        function logout() {
            localStorage.removeItem("token");
            alert("Déconnecté");

            window.location.href = "accueil.php";
        }

        // gestion affichage login / guest
        window.addEventListener("DOMContentLoaded", () => {
            const token = localStorage.getItem("token");

            const guest = document.getElementById("guest-buttons");
            const account = document.getElementById("account-wrapper");

            if (token) {
                guest.style.display = "none";
                account.style.display = "inline-flex";
            } else {
                guest.style.display = "inline-flex";
                account.style.display = "none";
            }
        });

        window.addEventListener("DOMContentLoaded", () => {

            const links = document.querySelectorAll("nav a");

            const routes = {
                "detail_concours.php": "liste_concours.php",
                "inscription_concours.php": "liste_concours.php",
                "resultat.php": "profil.php"
            };

            let page = window.location.pathname.split("/").pop().split("?")[0];

            page = routes[page] || page;

            links.forEach(link => {

                const linkPage = link.getAttribute("href");

                if (linkPage === page) {
                    link.classList.add("active");
                }

            });
        });

        document.addEventListener("DOMContentLoaded", () => {

            const profilLink = document.getElementById("profilLink");
            const loader = document.getElementById("pageLoader");

            if (profilLink) {

                profilLink.addEventListener("click", (e) => {

                    e.preventDefault();

                    loader.classList.remove("hidden");

                    setTimeout(() => {
                        window.location.href = "profil.php";
                    }, 1200);

                });
            }
        });
    </script>
</header>