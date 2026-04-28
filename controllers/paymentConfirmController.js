import PaymentConfirmModel from "../models/PaymentConfirmModel.js";

export default class PaymentConfirmController {

    static async init() {

        const token = localStorage.getItem("token");

        if (!token) {
            window.location.href = "connexion.php";
            return;
        }

        // ID CONCOURS (URL)
        const concoursId = new URLSearchParams(window.location.search).get("id");

        // ID INSCRIPTION (localStorage)
        this.id_inscription = localStorage.getItem("id_inscription");

        // console.log("ID INSCRIPTION :", this.id_inscription);
        // console.log("ID CONCOURS :", concoursId);

        if (!this.id_inscription) {
            alert("Aucune inscription trouvée");
            return;
        }

        // charger infos concours
        await this.loadPaymentInfo(concoursId, token);

        // UI + events
        this.loadUI();
        this.bindEvents();
    }

    static async loadPaymentInfo(id, token) {

        const res = await PaymentConfirmModel.getPaymentInfo(id, token);
        // console.log("ID:", concoursId);

        if (!res.ok) {
            console.log(res.data);
            return;
        }

        const concours = res.data.data;

        document.getElementById("concoursNom").innerText = concours.nom;
        document.getElementById("montant").innerText =
            concours.frais_inscription + " FCFA";

        document.getElementById("datePaiement").innerText =
            new Date().toLocaleString("fr-FR");
    }

    // UI init (optionnel)
    static loadUI() {

        document.getElementById("datePaiement").innerText =
            new Date().toLocaleString("fr-FR");
    }

    static bindEvents() {

        const btn = document.getElementById("downloadReceipt");

        btn.addEventListener("click", async () => {

            try {

                if (!this.id_inscription) {
                    alert("Inscription introuvable");
                    return;
                }

                const blob = await PaymentConfirmModel.getRecepisse(this.id_inscription);

                const url = window.URL.createObjectURL(blob);

                const a = document.createElement("a");
                a.href = url;
                a.download = "recepisse.pdf";
                document.body.appendChild(a);
                a.click();

                a.remove();
                window.URL.revokeObjectURL(url);

            } catch (err) {
                console.log(err);
                alert(err.error || "Erreur téléchargement reçu");
            }
        });
    }
}


