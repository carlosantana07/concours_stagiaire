import PaymentModel from "../models/PaymentModel.js";

export default class PaymentController {

    static async init() {

        this.concoursId = new URLSearchParams(window.location.search).get("id");

        this.form = document.querySelector(".payment-form");
        this.inputs = document.querySelectorAll(".otp-input");

        await this.loadConcoursInfo();

        this.bindEvents();
    }

    // CHARGER INFOS CONCOURS
    static async loadConcoursInfo() {

        const res = await PaymentModel.getConcoursDetail(this.concoursId);

        if (!res.ok) {
            console.log(res.data);
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

        e.preventDefault();

        const token = localStorage.getItem("token");
        const id_inscription = Number(localStorage.getItem("id_inscription"));

        if (!id_inscription) {
            alert("Aucune inscription trouvée");
            return;
        }
        const urlParams = new URLSearchParams(window.location.search);
        const id_concours = urlParams.get("id");


        if (!id_inscription) {
            alert("Aucune inscription trouvée");
            return;
        }

        let otp = "";
        this.inputs.forEach(i => otp += i.value);

        const phone = this.form.querySelector("input").value;

        const data = {
            // telephone: phone,
            // otp: otp,
            id_inscription: Number(id_inscription),
            id_concours: Number(id_concours)
        };

        console.log("DATA PAIEMENT:", data);

        const res = await PaymentModel.initPayment(data, token);

        console.log("PAIEMENT:", res.data);

        if (!res.ok) {
            alert(res.data.erreurs?.join("\n") || "Erreur paiement");
            return;
        }

        alert("Paiement initié");

        window.location.href = "paiement_confirme.php?id=" + id_concours;
    }
}

