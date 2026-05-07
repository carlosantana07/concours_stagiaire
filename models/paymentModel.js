const API_URL = "http://localhost:4000/api/payment";
import { authFetch } from "../assets/utils/authFetch.js";

export default class PaymentModel {

    static async initPayment(data, token) {

        const res = await authFetch(`${API_URL}/init`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer " + token
            },
            body: JSON.stringify(data)
        });

        const result = await res.json();

        return { ok: res.ok, data: result };
    }

    static async initPayment(data, token) {

        const res = await authFetch(`${API_URL}/init-payment`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer " + token
            },
            body: JSON.stringify(data)
        });

        const result = await res.json();

        return { ok: res.ok, data: result };
    }

    static async getConcoursDetail(id) {

        const res = await authFetch+(`http://localhost:4000/api/concours/detail/${id}`);

        const result = await res.json();

        return {
            ok: res.ok,
            data: result
        };
    }
}