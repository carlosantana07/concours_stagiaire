import PaymentConfirmModel from "../models/PaymentConfirmModel.js";

export default class PaymentConfirmController {

    static async init() {

        const token = localStorage.getItem("token");

        const messageEl =
            document.getElementById("paymentMessage");

        if (!token) {

            messageEl.style.display = "block";
            messageEl.textContent = "Session expirée, veuillez vous reconnecter";

            setTimeout(() => {
                window.location.href = "connexion.php";
            }, 1500);

            return;
        }

        const params =
            new URLSearchParams(window.location.search);

        const encodedId =
            params.get("id");

        if (!encodedId) {

            messageEl.style.display = "block";
            messageEl.textContent =
                "Concours invalide";

            return;
        }

        let concoursId;

        try {

            let base64 = encodedId
                .replace(/-/g, "+")
                .replace(/_/g, "/");

            while (base64.length % 4 !== 0) {
                base64 += "=";
            }

            const decoded = atob(base64);

            // Format :
            // E_CONCOURS_2026_X7K9|15|RANDOM|ECO2026

            const parts = decoded.split("|");

            if (parts.length !== 4) {
                throw new Error("Format ID invalide");
            }

            const secret = parts[0];
            const id = parts[1];
            const signature = parts[3];

            if (secret !== "E_CONCOURS_2026_X7K9") {
                throw new Error("Secret invalide");
            }

            if (signature !== "ECO2026") {
                throw new Error("Signature invalide");
            }

            if (!/^\d+$/.test(id)) {
                throw new Error("ID concours invalide");
            }

            concoursId = Number(id);

            console.log("ID concours décodé :", concoursId);

        } catch (error) {

            console.error(
                "Erreur décodage ID concours :",
                error
            );

            messageEl.style.display = "block";
            messageEl.textContent =
                "Concours invalide";

            return;
        }

        this.id_inscription =
            localStorage.getItem("id_inscription");

        if (!this.id_inscription) {

            messageEl.style.display = "block";
            messageEl.textContent =
                "Aucune inscription trouvée";

            return;
        }

        try {

            await this.loadPaymentInfo(concoursId, token);

            this.loadUI();
            this.bindEvents();

        } catch (err) {

            // console.log(err);

            messageEl.style.display = "block";
            messageEl.textContent =
                "Erreur lors du chargement des informations";

        }
    }

    static async loadPaymentInfo(id, token) {

        const res = await PaymentConfirmModel.getPaymentInfo(id, token);
        // console.log("ID:", concoursId);

        if (!res.ok) {
            // console.log(res.data);
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
        const messageEl = document.getElementById("paymentMessage");

        btn.addEventListener("click", async () => {

            // reset message
            messageEl.style.display = "none";
            messageEl.textContent = "";

            try {

                if (!this.id_inscription) {

                    messageEl.style.display = "block";
                    messageEl.textContent = "Inscription introuvable";

                    return;
                }

                const blob =
                    await PaymentConfirmModel.getRecepisse(
                        this.id_inscription
                    );

                const url =
                    window.URL.createObjectURL(blob);

                const a =
                    document.createElement("a");

                a.href = url;
                a.download = "recepisse.pdf";

                document.body.appendChild(a);
                a.click();

                a.remove();

                window.URL.revokeObjectURL(url);

            } catch (err) {

                //  console.log(err);

                messageEl.style.display = "block";

                messageEl.textContent =
                    err?.error ||
                    err?.message ||
                    "Erreur lors du téléchargement du reçu";
            }
        });
    }
}


