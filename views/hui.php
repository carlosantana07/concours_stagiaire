/* ===== Global ===== */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: 'Inter', sans-serif;
}

body {
  background: #e7e9ec;
  color: #FFFFFF;
  /* padding-top: 80px; */
}

a {
  text-decoration: none;
  color: inherit;
}

/* ===== Header / Navbar ===== */
header {
  width: 100%;
  max-width: 1550px;
  margin: 0 auto;
  background: #FFFFFF;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1), 0px 4px 6px rgba(0, 0, 0, 0.1);
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 80px;
  height: 80px;
  position: fixed;
  top: 0;
  z-index: 1000;
}

.logo {
  display: flex;
  align-items: center;
  gap: 16px;
  font-weight: 700;
  font-size: 24px;
  color: #03572A;
}

nav {
  display: flex;
  align-items: center;
  gap: 32px;
}

nav a {
  font-weight: 500;
  font-size: 16px;
  color: #374151;
}

nav a.active {
    color: #055d2e;
    font-weight: 600;
}

nav a:hover {
  /* color: #2dd87d; */
  border-bottom: 2px solid #055d2e;
}

.nav-buttons {
  display: flex;
  gap: 26px;
  margin-left: 32px;
  font-size: 12px;
  padding: 18px 36px;
  border-radius: 12px;
}

.account-wrapper {
  position: relative;
  display: inline-block;
}

.account-menu {
  display: none;
  position: absolute;
  right: 0;
  top: 45px;
  background: #fff;
  border: 1px solid #ddd;
  border-radius: 8px;
  width: 180px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  z-index: 999;
}

.account-menu a {
  display: block;
  padding: 10px;
  text-decoration: none;
  color: #333;
}

.account-menu a:hover {
  background: #f2f2f2;
}


.btn-primary {
  background: #03572A;
  color: #FFFFFF;
  padding: 0 24px;
  height: 44px;
  border-radius: 8px;
  font-weight: 600;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1), 0px 10px 15px rgba(0, 0, 0, 0.1);
  border: none;
  cursor: pointer;
}

.btn-secondary {
  background: #FFFFFF;
  color: #03572A;
  padding: 0 24px;
  height: 44px;
  border-radius: 8px;
  font-weight: 600;
  border: 2px solid #03572A;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

.guest-button{
  display: flex;
  gap: 16px;
}

/* ===== Flag Bar ===== */
.flag-bar {
  display: flex;
  width: 100%;
  max-width: 1550px;
  height: 8px;
  margin-top: 80px; 
}

.flag-bar div {
  flex: 1;
}

.flag-bar .red {
  background: #EF2B2D;
}

.flag-bar .yellow {
  background: #FCD116;
}

.flag-bar .green {
  background: #009E49;
}

/* ===== Hero Section ===== */
.hero {
  padding-top: -35px;
  width: 100%;
  height: 820px;
  position: relative;

  background:
    linear-gradient(rgba(17, 24, 39, 0.55), rgba(17, 24, 39, 0.55)),
    url('../image/etudiant.png') center/cover no-repeat;

  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.hero .title {
  font-weight: 700;
  font-size: 60px;
  line-height: 1.2;
  margin-bottom: 40px;
}


/* Paragraphes alignés à gauche + décalés */
.hero .subtitle,
.hero .description,
.hero .nav-buttons {
  text-align: left;
  align-self: flex-start;
  margin-left: 350px;
}

.hero .subtitle {
  font-weight: 500;
  font-size: 20px;
  line-height: 1.4;
  margin-bottom: 20px
}

.hero .description {
  font-weight: 400;
  font-size: 16px;
  line-height: 1.6;
  max-width: 450px;
  margin-bottom: 40px
}

/* Boutons alignés à gauche */
.hero .nav-buttons {
  display: flex;
  gap: 20px;
  justify-content: flex-start;
  /* aligné à gauche */
}

.hero .buttons {
  display: flex;
  margin-top: 20px;
}

.hero .nav-buttons .btn-primary,
.hero .nav-buttons .btn-secondary {
  gap: 12px;
  font-size: 20px;
  padding: 28px 46px;
  border-radius: 12px;
}

.hero .nav-buttons .btn-primary i,
.hero .nav-buttons .btn-secondary i {
  font-size: 24px;
}

/* ===== STATS CARD ===== */
.stats-card {
  position: absolute;
  bottom: 100px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 20;

  width: 1300px;
  height: 180px;

  background: #FFFFFF;
  border-radius: 16px;
  box-shadow: 0px 25px 50px rgba(0, 0, 0, 0.25);

  display: flex;
  align-items: center;
  justify-content: center;
  gap: 32px;
}

/* Icon */
.stats-card .icon {
  width: 80px;
  height: 80px;
  border-radius: 16px;

  display: flex;
  justify-content: center;
  align-items: center;

  font-size: 32px;
  color: #FFFFFF;
}

/*Rouge */
.icon-red {
  background: linear-gradient(135deg, #D62828, #E88686);
}

/*Vert */
.icon-green {
  background: linear-gradient(135deg, #009E49, #039145);
}

/* Texte */
.stats-text {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.stats-text h3 {
  font-size: 18px;
  font-weight: 500;
  color: #4B5563;
  margin-bottom: 4px;
}

.stats-text p {
  font-size: 48px;
  font-weight: 700;
  color: #E05D5D;
  line-height: 1;
}

/* ===== Cards ===== */
.cards-container {
  display: flex;
  justify-content: center;
  gap: 32px;
  margin: 100px 0 40px;
  line-height: 1.6;
  flex-wrap: wrap;
  padding: 0 80px;

}

.card {
  background: linear-gradient(145deg,
      rgba(26, 239, 125, 0.15) 0%,
      /* vert léger */
      rgba(197, 248, 220, 0.05) 40%,
      /* transition */
      #ffffff 60%
      /* blanc */
    );
  border-radius: 16px;
  width: 380px;
  height: 300px;
  padding: 24px;
  color: #111827;
  display: flex;
  align-items: center;
  flex-direction: column;
  gap: 16px;
  box-shadow: 0px 25px 50px rgba(0, 0, 0, 0.25);
}

.card .icon {
  width: 80px;
  height: 80px;
  border-radius: 16px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 36px;
  color: #FFFFFF;
}

.card .text h3 {
  font-weight: 500;
  font-size: 18px;
  line-height: 28px;
}

.card .text p {
  font-size: 16px;
  color: #4B5563;
}

/* ===== FOOTER ===== */
footer {
  background: #111827;
  padding: 48px 80px;
  color: #BFDBFE;
}

/* ===== TOP ===== */
.footer-top {
  max-width: 1200px;
  margin: 0 auto;

  display: flex;
  justify-content: space-between;
  /* alignement Figma */
  align-items: flex-start;
  gap: 80px;
}

/* ===== COLONNES ===== */
.footer-col {
  flex: 1;
  min-width: 250px;
}

/* ===== LOGO ===== */
.footer-logo {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 20px;
  font-weight: 700;
  color: #FFFFFF;
  margin-bottom: 16px;
}

.footer-desc {
  max-width: 280px;
  line-height: 24px;
}

/* ===== TITRES ===== */
footer h3 {
  color: #FFFFFF;
  font-size: 20px;
  margin-bottom: 16px;
}

/* ===== LIENS ===== */
.footer-links {
  list-style: none;
  padding: 0;
}

.footer-links li {
  margin-bottom: 10px;
  line-height: 24px;
}

/* ===== CONTACT ===== */
.footer-contact {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.contact-item {
  display: flex;
  gap: 12px;
  align-items: flex-start;
}

.contact-item i {
  color: #FCD116;
  margin-top: 4px;
}

/* ===== EMAIL TEXTE ===== */
.contact-item strong {
  display: block;
  margin-bottom: 4px;
  color: #FFFFFF;
}

.contact-item p {
  margin: 0;
}

/* ===== NUMEROS ===== */
.phones {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  /* correction importante */
  gap: 6px 24px;
  margin-top: 8px;
}

/* ===== BAS ===== */
.footer-bottom {
  text-align: center;
  margin-top: 40px;
  font-size: 16px;
}

/* ===== Responsive ===== */
@media(max-width: 1200px) {

  header,
  .hero,
  .cards-container,
  footer {
    padding: 0 40px;
  }

  .hero .title {
    font-size: 48px;
  }
}

@media(max-width: 768px) {
  header {
    flex-direction: column;
    height: auto;
    padding: 16px;
  }

  nav {
    flex-wrap: wrap;
    justify-content: center;
    gap: 16px;
    margin: 16px 0;
  }

  .hero {
    padding: 120px 24px;
    text-align: center;
  }

  .hero .title {
    font-size: 36px;
  }

  .cards-container {
    flex-direction: column;
    align-items: center;
  }

  .stats-card {
    width: 90%;
    height: auto;
    padding: 20px;
    flex-direction: column;
  }
}

