const API_URL = "http://localhost:4000/api";
// import { authFetch } from "../assets/utils/authFetch.js";

export default class InscriptionModel {

    static async getConcoursDetail(id, token) {

        const res = await fetch(`${API_URL}/concours/detail/${id}`, {
            method: "GET",
            headers: {
                "Authorization": "Bearer " + token
            }
        });

        const data = await res.json();

        return { ok: res.ok, data };
    }

    static async inscrire(data) {

        const formData = new FormData();

        formData.append("id_concours", data.id_concours);
        formData.append("id_centre", data.id_centre);

        if (data.diplome instanceof File) {
            formData.append("files", data.diplome);
        }

       // console.log("FORMDATA ENVOYÉ :");

        for (const [key, value] of formData.entries()) {
            // console.log(
            //     key,
            //     value instanceof File
            //         ? `${value.name} (${value.type}, ${value.size} octets)`
            //         : value
            // );
        }

        const res = await fetch(`${API_URL}/inscription/s-inscrire`, {
            method: "POST",
            headers: {
                "Authorization": "Bearer " + localStorage.getItem("token")
            },
            body: formData
        });

        const result = await res.json();

       // console.log("REPONSE INSCRIPTION :", result);

        return {
            ok: res.ok,
            data: result
        };
    }

}