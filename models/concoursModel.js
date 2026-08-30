const API = "http://localhost:4000/api/concours";
// import { authFetch } from "../assets/utils/authFetch.js";

export default class ConcoursModel {

    static async getConcours(page = 1, categorie = "", token) {

        let url = `${API}/getallconcours/?page=${page}`;

        const options = {
            method: "GET",
            headers: {
                "Authorization": "Bearer " + token
            }
        };

        if (categorie) {
            url += `&categorie=${categorie}`;
        }

        const res = await fetch(url, options);
        const data = await res.json();

        console.log("DATA", data);

        return { ok: res.ok, data };
    }

    static async getCategories(token) {

        const options = {
            method: "GET",
            headers: {
                "Authorization": "Bearer " + token
            }
        };

        const res = await fetch(`${API}/categories`, options);

        const data = await res.json();

        return { ok: res.ok, data };
    }

    static async getDetail(id,token) {

        const options = {
            method: "GET",
            headers: {
                "Authorization": "Bearer " + token
            }
        };

        const res = await fetch(`${API}/detail/${id}`, options);

        const data = await res.json();
        console.log("DATA", data);
        return { ok: res.ok, data };
    }
}