const BASE_URL = "http://localhost:4000/api";

export async function apiFetch(url, options = {}) {
    const res = await fetch(BASE_URL + url, {
        headers: {
            "Content-Type": "application/json",
            ...(localStorage.getItem("token") && {
                Authorization: `Bearer ${localStorage.getItem("token")}`
            })
        },
        ...options
    });

    const data = await res.json();

    return {
        ok: res.ok,
        status: res.status,
        data
    };
}