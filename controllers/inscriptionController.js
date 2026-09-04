import InscriptionModel from "../models/inscriptionModel.js";

export default class InscriptionController {

    static async init() {

        this.form = document.getElementById("formInscription");
        this.selectCentre = document.querySelector("select[name='centre']");
        this.nomConcours = document.getElementById("nomConcours");

        const urlParams = new URLSearchParams(window.location.search);
        this.concoursId = urlParams.get("id");

        if (!this.concoursId) return;

        await this.loadConcours();

        this.bindEvents();
    }

    // LOAD CONCOURS + CENTRES
    static async loadConcours() {
        const token = localStorage.getItem("token");

        if (!token) {
            window.location.href = "connexion.php";
            return;
        }

        const res = await InscriptionModel.getConcoursDetail(this.concoursId, token);

        if (!res.ok) {
            console.log("Erreur chargement concours");
            return;
        }

        const concours = res.data.data;


        // TITRE
        this.nomConcours.innerText = concours.nom || "Concours";

        // CENTRES
        const centres = concours.centres || [];

        this.selectCentre.innerHTML = `<option value="">Choisir un centre</option>`;

        centres.forEach(item => {

            const centre = item.centre;

            const option = document.createElement("option");
            option.value = centre.id_centre;
            option.textContent = centre.nom;

            this.selectCentre.appendChild(option);
        });
    }


    static bindEvents() {

        const messageEl =
            document.getElementById("inscriptionMessage");

        this.form.addEventListener("submit", async (e) => {

            e.preventDefault();

            const formData =
                new FormData(this.form);

            const data =
                Object.fromEntries(formData.entries());

            // reset message
            messageEl.style.display = "none";
            messageEl.textContent = "";

            // transformation
            data.id_centre = Number(data.centre);
            delete data.centre;

            data.id_concours = Number(this.concoursId);

            console.log("DATA ENVOYÉE :", data);

            try {

                const res =
                    await InscriptionModel.inscrire(data);

                if (!res.ok) {

                    messageEl.style.display = "block";
                    messageEl.style.color = "red";
                    messageEl.textContent =
                        res.data.error || "Erreur inscription";

                    return;
                }

                console.log("REPONSE COMPLETE:", res.data);

                const idInscription =
                    res.data.data.id_inscription;

                localStorage.setItem(
                    "id_inscription",
                    idInscription
                );

                messageEl.style.display = "block";
                messageEl.style.color = "green";
                messageEl.textContent =
                    "Inscription réussie";

                // loader
                const loader =
                    document.getElementById("pageLoader");

                loader.classList.remove("hidden");

                setTimeout(() => {

                    window.location.href =
                        "paiement.php?id=" +
                        this.concoursId;

                }, 1200);

            } catch (err) {

                console.log(err);

                messageEl.style.display = "block";
                messageEl.style.color = "red";
                messageEl.textContent =
                    "Erreur serveur";
            }

        });
    }
}