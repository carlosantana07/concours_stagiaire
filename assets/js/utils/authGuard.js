export function authGuard() {
    const token = localStorage.getItem("token");

    if (!token) {
        window.location.href = "connexion.php";
    }
}