export async function authFetch(url, options = {}) {

    const token = localStorage.getItem("token");

    const response = await fetch(url, {
        ...options,
        headers: {
            "Content-Type": "application/json",
            ...(options.headers || {}),
            Authorization: token ? `Bearer ${token}` : ""
        }
    });

    // token expiré ou invalide
    if (response.status === 401) {

        localStorage.removeItem("token");
        localStorage.removeItem("lastActivity");

        alert("Votre session a expiré");

        window.location.href = "connexion.php";

        return null;
    }

    return response;
}