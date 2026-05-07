const API_URL = "http://localhost:4000/api/candidat";
import { authFetch } from "../assets/utils/authFetch.js";

const res = await authFetch(url);

export default class CandidatModel {

    static async getProfil(token) {

        const res = await authFetch(`${API_URL}/profil`, {
            method: "GET",
            headers: {
                "Authorization": "Bearer " + token
            }
        });

        const data = await res.json();

        return {
            ok: res.ok,
            data: data
        };
    }

    static async getMesInscriptions(token, page = 1) {

        const res = await authFetch(
            `${API_URL}/mes-candidatures?page=${page}`,
            {
                method: "GET",
                headers: {
                    "Authorization": "Bearer " + token
                }
            }
        );

        const data = await res.json();

        return { ok: res.ok, data };
    }

    static async updateProfil(data, token) {

        const res = await authFetch(`${API_URL}/profil`, {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer " + token
            },
            body: JSON.stringify(data)
        });

        const result = await res.json();

        return {
            ok: res.ok,
            data: result
        };
    }

    static async getResultats(token) {

        const res = await authFetch(`${API_URL}/resultats`, {
            headers: {
                Authorization: "Bearer " + token
            }
        });

        const data = await res.json();

        return {
            ok: res.ok,
            data
        };
    }
}





