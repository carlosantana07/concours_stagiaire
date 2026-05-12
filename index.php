<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>E-Concours</title>
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

  <!-- ===== HEADER ===== -->
<header>
    <div class="logo">
        <img src="assets/image/armoiries-1.png" alt="logo" height="40">
        E-CONCOURS
    </div>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="views/liste_concours.php">Concours</a>
        <!-- <a href="views/">Ministères</a> -->
        <a href="views/contact.php">Contactez-nous</a>
        <a href="views/aide.php">Aide</a>
    </nav>

    <div class="nav-buttons">

        <!-- utilisateur NON connecté -->
        <div id="guest-buttons" class="guest-button">
            <a class="btn-primary" href="views/inscription.php">Créer un compte</a>
            <a class="btn-secondary" href="views/connexion.php">Se connecter</a>
        </div>

        <!-- utilisateur connecté -->
        <div class="account-wrapper" id="account-wrapper" style="display:none;">
            <button class="btn-secondary" onclick="toggleMenu()">
                Mon compte <i class="fa fa-chevron-down"></i>
            </button>

            <div class="account-menu" id="accountMenu">
                <a href="views/profil.php" id="profilLink"><i class="fa fa-user"></i> Mon profil</a>
                <a href="views/resultat.php"><i class="fa fa-chart-bar"></i> Mes résultats</a>
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

            window.location.href = "index.php";
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
                "resultat.php": "liste_concours.php"

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

  <!-- ===== FLAG BAR ===== -->
  <div class="flag-bar">
    <div class="red"></div>
    <div class="yellow"></div>
    <div class="green"></div>
  </div>

  <!-- ===== HERO ===== -->

  <section class="hero">
    <h1 class="title" style="color: #fff;">Bienvenue sur <span style="color:#FCD116;">E-CONCOURS</span></h1>

    <p class="subtitle" style="color: #fff;">
      Le portail officiel d'accès aux concours de la Fonction Publique
    </p>

    <p class="description">
      Inscrivez-vous, consultez les concours disponibles et <br>
      postulez facilement en ligne pour rejoindre la Fonction <br>
      Publique du Burkina Faso.
    </p>

    <div class="nav-buttons">
      <a href="views/liste_concours.php" class="btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Voir les concours</a>
      <a href="views/inscription.php" class="btn-secondary"><i class="fa-solid fa-user-plus"></i> Créer un compte</a>
    </div>


    <!-- CARTE DANS LE HERO -->
    <div class="cards-container">
      <div class="stats-card">
        <div class="icon icon-red"> <i class="fa-solid fa-chart-line"></i> </div>
        <div class="stats-text">
          <h3>Nombre de visiteurs</h3>
          <p>10000</p>
        </div>
      </div>
    </div>

  </section>

  <!-- ===== COMMENT S'INSCRIRE ===== -->
  <section style="text-align:center; padding:40px 0; color:#111827; background:#F9FAFB;">
    <h2 style="font-size:32px; margin-bottom:10px;">Comment s'inscrire ?</h2>
    <div style="width:80px; height:4px; background:#009E49; margin:10px auto;"></div>

    <div class="cards-container" style="justify-content: center;">
      <div class="card">
        <div class="icon icon-green"> <i class="fa-solid fa-user-plus"> </i></div>
        <div class="text">
          <h3 style="font-weight:bold; font-size:22px; text-align: left;">Créer un compte</h3>
          <p style="font-size:16px; font-weight:400; color:#4B5563; text-align: left;">
            Inscrivez-vous sur la plateforme avec vos informations personnelles.
          </p>
        </div>
      </div>

      <div class="card">
        <div class="icon icon-green"> <i class="fa-solid fa-magnifying-glass"> </i></div>
        <div class="text">
          <h3 style="font-weight:bold; font-size:22px; text-align: left;">Rechercher un concours</h3>
          <p style="font-size:16px; font-weight:400; color:#4B5563; text-align: left;">
            Parcourez les concours disponibles et choisissez celui qui vous correspond.
          </p>
        </div>
      </div>

      <div class="card">
        <div class="icon icon-green"> <i class="fa-solid fa-file-arrow-up"> </i></div>
        <div class="text">
          <h3 style="font-weight:bold; font-size:22px; text-align: left;">Soumettre votre dossier</h3>
          <p style="font-size:16px; font-weight:400; color:#4B5563; text-align: left;">
            Téléchargez vos documents et validez votre inscription.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== AIDE ===== -->
  <section style="display:flex; justify-content:center; align-items: center; padding:60px 0; background:#F9FAFB;">
    <div class="card" style="width:800px; height: 420px; align-items: center; justify-content: center; text-align:center; background: #F9FAFB;">
      <div class="icon icon-red"> <i class="fa-solid fa-headset"></i> </div>
      <h2 style="color:#111827;">Besoin d'aide ?</h2>
      <p style="color:#4B5563;">
        L'équipe d'assistance est disponible 7j/7 de 8h à 20h pour vous accompagner.
      </p>
      <button class="btn-primary" style="display:flex; align-items: center; background:#D62828; margin-top:20px;gap: 12px; width: 400px;">
        <i class="fa-solid fa-phone fa-2x"></i> Contacter l'assistance
      </button>
    </div>
  </section>

  <!-- ===== FOOTER ===== -->
   
  <?php include("views/footer.php") ?>

</body>

</html>