const API_URL = "http://localhost:4000/api";
// import { authFetch } from "../assets/utils/authFetch.js";

export default class InscriptionModel {

    static async getConcoursDetail(id) {

        const res = await fetch(`${API_URL}/concours/detail/${id}`);
        const data = await res.json();

        return { ok: res.ok, data };
    }

    static async inscrire(data) {

        const res = await fetch(`${API_URL}/inscription/s-inscrire`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer " + localStorage.getItem("token")
            },
            body: JSON.stringify(data)
        });

        const result = await res.json();

        return { ok: res.ok, data: result };
    }
}