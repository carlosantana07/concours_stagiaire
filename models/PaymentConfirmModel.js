const API_URL = "http://localhost:4000/api/payment";
const API = "http://localhost:4000/api/candidat";
import { authFetch } from "../assets/utils/authFetch.js";


export default class PaymentConfirmModel {

    static async getPaymentInfo(concoursId, token) {
        // console.log("ID CONCOURS:", concoursId);

        const res = await authFetch(`http://localhost:4000/api/concours/detail/${concoursId}`, {
            headers: {
                "Authorization": "Bearer " + token
            }
        });

        const result = await res.json();

        return { ok: res.ok, data: result };
    }

    static async getRecepisse(id_inscription) {

        const token = localStorage.getItem("token");

        const res = await authFetch(`${API}/recepisse`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer " + token
            },
            body: JSON.stringify({
                id_inscription: Number(id_inscription)
            
            })
        });

        if (!res.ok) {
            const err = await res.json();
            throw err;
        }

        //  PDF
        return await res.blob();
    }
}

    