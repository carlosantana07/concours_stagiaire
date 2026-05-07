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

// ===== AUTO LOGOUT =====

// let inactivityTimer;

// // 3 minutes
// const INACTIVITY_LIMIT = 3 * 60 * 1000;

// // sauvegarder dernière activité
// function updateLastActivity() {
//     localStorage.setItem("lastActivity", Date.now());
// }

// // déconnexion
// function logoutUser() {

//     localStorage.removeItem("token");
//     localStorage.removeItem("lastActivity");

//     alert("Session expirée pour inactivité");

//     window.location.href = "accueil.php";
// }

// // reset timer
// function resetInactivityTimer() {

//     clearTimeout(inactivityTimer);

//     updateLastActivity();

//     inactivityTimer = setTimeout(() => {
//         logoutUser();
//     }, INACTIVITY_LIMIT);
// }

// // événements activité
// ["click", "mousemove", "keydown", "scroll", "touchstart"].forEach(event => {
//     document.addEventListener(event, resetInactivityTimer);
// });

// // au chargement
// window.addEventListener("DOMContentLoaded", () => {

//     const token = localStorage.getItem("token");

//     if (!token) return;

//     const lastActivity = localStorage.getItem("lastActivity");

//     // première connexion
//     if (!lastActivity) {
//         updateLastActivity();
//     }

//     const now = Date.now();
//     const diff = now - parseInt(lastActivity);

//     // temps dépassé
//     if (diff > INACTIVITY_LIMIT) {

//         logoutUser();
//         return;
//     }

//     // relancer timer
//     resetInactivityTimer();
// });










