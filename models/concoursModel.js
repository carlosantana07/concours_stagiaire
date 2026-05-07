const API = "http://localhost:4000/api/concours";
import { authFetch } from "../assets/utils/authFetch.js";

export default class ConcoursModel {

    static async getConcours(page = 1, categorie = "") {

        let url = `${API}/getallconcours?page=${page}`;

        if (categorie) {
            url += `&categorie=${categorie}`;
        }

        const res = await authFetch(url);
        const data = await res.json();

        return { ok: res.ok, data };
    }

    static async getCategories() {

        const res = await authFetch(`${API}/categories`);
        const data = await res.json();

        return { ok: res.ok, data };
    }

    static async getDetail(id) {

        const res = await authFetch(`${API}/detail/${id}`);
        const data = await res.json();

        return { ok: res.ok, data };
    }
}