import PaymentModel from "../models/paymentModel.js";

export default class PaymentController {

    static async init() {

        const orangeBtn = document.getElementById("orange-btn");
        const moovBtn = document.getElementById("moov-btn");

        const hintText = document.getElementById("hint-text");
        const codeText = document.getElementById("code-text");

        function setActive(selectedBtn) {
            document.querySelectorAll(".payment-btn").forEach(btn => {
                btn.classList.remove("active");
            });

            selectedBtn.classList.add("active");
        }

        // Orange Money
        orangeBtn.addEventListener("click", () => {
            setActive(orangeBtn);

            hintText.textContent =
                "Composez le code suivant sur votre numéro Orange Money pour recevoir un OTP par SMS";

            codeText.textContent = "*144*4*6*800#";
        });

        // Moov Money
        moovBtn.addEventListener("click", () => {
            setActive(moovBtn);

            hintText.textContent =
                "Composez le code suivant sur votre numéro Moov Money pour recevoir un OTP par SMS";

            codeText.textContent = "*555*1*2*900#";
        });

        // Récupération de l'ID encodé
        const params = new URLSearchParams(window.location.search);

        const encodedId = params.get("id");

        if (!encodedId) {
            console.error("ID concours manquant");
            window.location.href = "concours.php";
            return;
        }

        // Décodage Base64
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

            this.concoursId = Number(id);

            console.log("ID concours décodé :", this.concoursId);

        } catch (error) {

            console.error(
                "Erreur décodage ID concours :",
                error
            );

            window.location.href = "concours.php";
            return;
        }

        this.form = document.querySelector(".payment-form");

        this.inputs = document.querySelectorAll(".otp-input");

        await this.loadConcoursInfo();

        this.bindEvents();
    }
    // CHARGER INFOS CONCOURS
    static async loadConcoursInfo() {
        const token = localStorage.getItem("token");

        if (!token) {
            window.location.href = "connexion.php";
            return;
        }

        const res = await PaymentModel.getConcoursDetail(this.concoursId, token);

        if (!res.ok) {
            // console.log(res.data);
            return;
        }

        const c = res.data.data;

        document.getElementById("concoursNom").innerText = c.nom;
        document.getElementById("concoursFrais").innerText = c.frais_inscription + " FCFA";
        document.getElementById("totalAmount").innerText = c.frais_inscription + " FCFA";
    }

    static bindEvents() {

        // OTP auto navigation
        this.inputs.forEach((input, index) => {

            input.addEventListener("input", () => {

                input.value = input.value.replace(/[^0-9]/g, "");

                if (input.value && index < this.inputs.length - 1) {
                    this.inputs[index + 1].focus();
                }
            });

        });

        // submit
        this.form.addEventListener("submit", (e) => this.handleSubmit(e));
    }

    static async handleSubmit(e) {

        function encodeId(id) {
            const secret = "E_CONCOURS_2026_X7K9";

            const random = Math.random()
                .toString(36)
                .substring(2, 10)
                .toUpperCase();

            const data = `${secret}|${id}|${random}|ECO2026`;

            return btoa(data)
                .replace(/\+/g, "-")
                .replace(/\//g, "_")
                .replace(/=+$/, "");
        }

        e.preventDefault();

        const token = localStorage.getItem("token");
        const messageEl = document.getElementById("paymentMessage");

        const id_inscription =
            Number(localStorage.getItem("id_inscription"));

        const id_concours = this.concoursId;

        messageEl.style.display = "none";
        messageEl.textContent = "";

        if (!id_inscription) {

            messageEl.style.display = "block";
            messageEl.style.color = "red";
            messageEl.textContent =
                "Aucune inscription trouvée";

            return;
        }

        if (!id_concours || !Number.isInteger(id_concours)) {

            messageEl.style.display = "block";
            messageEl.style.color = "red";
            messageEl.textContent =
                "Concours invalide";

            console.error(
                "ID concours invalide :",
                id_concours
            );

            return;
        }

        let otp = "";

        this.inputs.forEach(input => {
            otp += input.value;
        });

        const phone =
            this.form.querySelector("input").value;

        const data = {
            id_inscription: id_inscription,
            id_concours: id_concours
        };

        console.log("DATA PAIEMENT :", data);
        console.log("Type id_concours :", typeof data.id_concours);

        try {

            const res =
                await PaymentModel.initPayment(data, token);

            if (!res.ok) {

                messageEl.style.display = "block";
                messageEl.style.color = "red";

                messageEl.textContent =
                    res.data.erreurs?.join("\n") ||
                    res.data.error ||
                    "Erreur paiement";

                return;
            }

            messageEl.style.display = "block";
            messageEl.style.color = "green";
            messageEl.textContent =
                "Paiement initié avec succès";

            setTimeout(() => {

                window.location.href =
                    "paiement_confirme.php?id=" +
                    encodeId(id_concours);

            }, 1000);

        } catch (err) {

            console.error("Erreur paiement :", err);

            messageEl.style.display = "block";
            messageEl.style.color = "red";
            messageEl.textContent =
                "Erreur serveur";
        }
    }
}

