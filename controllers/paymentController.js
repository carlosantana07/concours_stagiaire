import PaymentModel from "../models/PaymentModel.js";

export default class PaymentController {

    static async init() {


        const orangeBtn = document.getElementById("orange-btn");
        const moovBtn = document.getElementById("moov-btn");

        const hintText = document.getElementById("hint-text");
        const codeText = document.getElementById("code-text");

        function setActive(selectedBtn) {
            // retirer active partout
            document.querySelectorAll(".payment-btn").forEach(btn => {
                btn.classList.remove("active");
            });

            // ajouter active sur le bouton cliqué
            selectedBtn.classList.add("active");
        }

        // Orange Money
        orangeBtn.addEventListener("click", () => {
            setActive(orangeBtn);

            hintText.textContent = "Composez le code suivant sur votre numéro Orange Money pour recevoir un OTP par SMS";
            codeText.textContent = "*144*4*6*800#";
        });

        // Moov Money
        moovBtn.addEventListener("click", () => {
            setActive(moovBtn);

            hintText.textContent = "Composez le code suivant sur votre numéro Moov Money pour recevoir un OTP par SMS";
            codeText.textContent = "*555*1*2*900#";
        });


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
        const messageEl = document.getElementById("paymentMessage");

        const id_inscription = Number(localStorage.getItem("id_inscription"));

        const urlParams = new URLSearchParams(window.location.search);
        const id_concours = urlParams.get("id");

        // reset message
        messageEl.style.display = "none";
        messageEl.textContent = "";

        if (!id_inscription) {

            messageEl.style.display = "block";
            messageEl.style.color = "red";
            messageEl.textContent = "Aucune inscription trouvée";

            return;
        }

        let otp = "";
        this.inputs.forEach(i => otp += i.value);

        const phone = this.form.querySelector("input").value;

        const data = {
            id_inscription: Number(id_inscription),
            id_concours: Number(id_concours)
        };

        console.log("DATA PAIEMENT:", data);

        try {

            const res = await PaymentModel.initPayment(data, token);

            console.log("PAIEMENT:", res.data);

            if (!res.ok) {

                messageEl.style.display = "block";
                messageEl.style.color = "red";
                messageEl.textContent =
                    res.data.erreurs?.join("\n") ||
                    "Erreur paiement";

                return;
            }

            messageEl.style.display = "block";
            messageEl.style.color = "green";
            messageEl.textContent = "Paiement initié avec succès";

            setTimeout(() => {
                window.location.href =
                    "paiement_confirme.php?id=" + id_concours;
            }, 1000);

        } catch (err) {

            console.log(err);

            messageEl.style.display = "block";
            messageEl.style.color = "red";
            messageEl.textContent = "Erreur serveur";
        }
    }
}

