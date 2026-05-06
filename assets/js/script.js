window.addEventListener("DOMContentLoaded", () => {

    const links = document.querySelectorAll("nav a");

    const routes = {
        "detail_concours.php": "liste_concours.php",
        "inscription_concours.php": "liste_concours.php"
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

// ====PAGE FAQ==== //

document.querySelectorAll(".help-accordion-item").forEach(item => {

    item.querySelector(".help-question").addEventListener("click", () => {

        // fermer les autres (mode pro)
        document.querySelectorAll(".help-accordion-item").forEach(i => {
            if (i !== item) i.classList.remove("active");
        });

        // toggle
        item.classList.toggle("active");
    });

});

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

// ===== AUTO LOGOUT INACTIVITÉ =====

let inactivityTimer;

// durée avant déconnexion 
const INACTIVITY_LIMIT = 30 * 60 * 1000;

function resetInactivityTimer() {

    clearTimeout(inactivityTimer);

    inactivityTimer = setTimeout(() => {

        alert("Session expirée pour inactivité");

        localStorage.removeItem("token");

        window.location.href = "accueil.php";

    }, INACTIVITY_LIMIT);
}

// événements à surveiller
["click", "mousemove", "keydown", "scroll", "touchstart"].forEach(event => {
    document.addEventListener(event, resetInactivityTimer);
});

// lancer au chargement
window.addEventListener("DOMContentLoaded", () => {
    console.log("AUTO LOGOUT LOADED");

    const token = localStorage.getItem("token");

    if (token) {
        resetInactivityTimer();
    }
});


