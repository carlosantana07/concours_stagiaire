const API_URL = "http://localhost:4000/api/candidat";

export default class CandidatModel {

    static async getProfil(token) {

        const res = await fetch(`${API_URL}/profil`, {
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

}