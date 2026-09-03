<header class="site-header">

    <!-- LOGO -->
    <div class="logo">
        <img
            src="../assets/image/armoirie.jpg"
            alt="Armoiries du Mali"
        >

        <span>E-CONCOURS</span>
    </div>


    <!-- BURGER MOBILE -->
    <button
        class="burger"
        id="burger"
        type="button"
        aria-label="Ouvrir le menu"
    >
        <i class="fa fa-bars"></i>
    </button>


    <!-- MENU -->
    <div class="menu" id="menu">

        <nav>

            <a href="accueil.php">
                <i class="fa-solid fa-house"></i>
                <span>Accueil</span>
            </a>

            <a href="liste_concours.php">
                <i class="fa-solid fa-clipboard-list"></i>
                <span>Concours</span>
            </a>

            <a href="contact.php">
                <i class="fa-solid fa-comments"></i>
                <span>Contactez-nous</span>
            </a>

            <a href="aide.php">
                <i class="fa-solid fa-circle-question"></i>
                <span>Aide</span>
            </a>

        </nav>


        <!-- ==========================================
             UTILISATEUR NON CONNECTÉ
        =========================================== -->
        <div
            id="guest-buttons"
            class="guest-button"
        >

            <a
                class="btn-primary header-btn"
                href="inscription.php"
            >
                Créer un compte
            </a>

            <a
                class="btn-secondary header-btn"
                href="connexion.php"
            >
                Se connecter
            </a>

        </div>


        <!-- ==========================================
             UTILISATEUR CONNECTÉ
        =========================================== -->
        <div
            class="account-wrapper"
            id="account-wrapper"
            style="display:none;"
        >

            <button
                class="btn-secondary account-button"
                type="button"
                onclick="toggleMenu()"
            >
                <i class="fa-solid fa-user"></i>

                <span>Mon compte</span>

                <i class="fa fa-chevron-down"></i>
            </button>


            <div
                class="account-menu"
                id="accountMenu"
            >

                <a
                    href="profil.php"
                    id="profilLink"
                >
                    <i class="fa fa-user"></i>
                    Mon profil
                </a>

                <a href="resultat.php">
                    <i class="fa fa-chart-bar"></i>
                    Mes résultats
                </a>

                <a
                    href="#"
                    class="logout-link"
                    onclick="logout()"
                >
                    <i class="fa fa-sign-out"></i>
                    Se déconnecter
                </a>

            </div>

        </div>

    </div>


    <!-- ==========================================
         LOADER
    =========================================== -->
    <div
        id="pageLoader"
        class="page-loader hidden"
    >

        <img
            src="../assets/image/bf_loader_v3.svg"
            alt="Chargement"
        >

    </div>

</header>


<script>

    /* =====================================================
       MENU COMPTE
    ===================================================== */

    function toggleMenu() {

        const menu =
            document.getElementById("accountMenu");

        menu.style.display =
            menu.style.display === "block"
                ? "none"
                : "block";
    }


    /* Fermer le menu en cliquant dehors */

    document.addEventListener("click", function(e) {

        const wrapper =
            document.getElementById("account-wrapper");

        const accountMenu =
            document.getElementById("accountMenu");

        if (
            wrapper &&
            accountMenu &&
            !wrapper.contains(e.target)
        ) {

            accountMenu.style.display = "none";
        }

    });


    /* =====================================================
       DÉCONNEXION
    ===================================================== */

    function logout() {

        localStorage.removeItem("token");

        window.location.href =
            "accueil.php";
    }


    /* =====================================================
       COMPTE CONNECTÉ / NON CONNECTÉ
    ===================================================== */

    window.addEventListener(
        "DOMContentLoaded",
        () => {

            const token =
                localStorage.getItem("token");

            const guest =
                document.getElementById(
                    "guest-buttons"
                );

            const account =
                document.getElementById(
                    "account-wrapper"
                );

            if (token) {

                guest.style.display =
                    "none";

                account.style.display =
                    "flex";

            } else {

                guest.style.display =
                    "flex";

                account.style.display =
                    "none";
            }

        }
    );


    /* =====================================================
       LIEN ACTIF
    ===================================================== */

    window.addEventListener(
        "DOMContentLoaded",
        () => {

            const links =
                document.querySelectorAll(
                    "nav a"
                );

            const routes = {

                "detail_concours.php":
                    "liste_concours.php",

                "inscription_concours.php":
                    "liste_concours.php",

                "resultat.php":
                    "liste_concours.php"

            };

            let page =
                window.location.pathname
                    .split("/")
                    .pop()
                    .split("?")[0];

            page =
                routes[page] || page;

            links.forEach(link => {

                const linkPage =
                    link.getAttribute("href");

                if (linkPage === page) {

                    link.classList.add("active");
                }

            });

        }
    );


    /* =====================================================
       LOADER PROFIL
    ===================================================== */

    document.addEventListener(
        "DOMContentLoaded",
        () => {

            const profilLink =
                document.getElementById(
                    "profilLink"
                );

            const loader =
                document.getElementById(
                    "pageLoader"
                );

            if (profilLink) {

                profilLink.addEventListener(
                    "click",
                    (e) => {

                        e.preventDefault();

                        loader.classList.remove(
                            "hidden"
                        );

                        setTimeout(() => {

                            window.location.href =
                                "profil.php";

                        }, 1200);

                    }
                );

            }

        }
    );


    /* =====================================================
       MENU BURGER
    ===================================================== */

    document.addEventListener(
        "DOMContentLoaded",
        () => {

            const burger =
                document.getElementById("burger");

            const menu =
                document.getElementById("menu");

            if (burger && menu) {

                burger.addEventListener(
                    "click",
                    () => {

                        menu.classList.toggle(
                            "active"
                        );

                    }
                );

            }

        }
    );

</script>

<script src="../assets/js/script.js"></script>

