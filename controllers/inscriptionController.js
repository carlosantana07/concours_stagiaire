import InscriptionModel from "../models/InscriptionModel.js";

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

        const res = await InscriptionModel.getConcoursDetail(this.concoursId);

        if (!res.ok) {
            console.log("Erreur chargement concours");
            return;
        }

        const concours = res.data.data;

        // if (!data.id_centre || isNaN(data.id_centre)) {
        //     alert("Veuillez sélectionner un centre valide");
        //     return;
        // }

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

    // EVENTS
    static bindEvents() {

        this.form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const formData = new FormData(this.form);
            const data = Object.fromEntries(formData.entries());

            // ICI (IMPORTANT)
            data.id_centre = Number(data.centre);
            delete data.centre;

            data.id_concours = Number(this.concoursId);

            console.log("DATA ENVOYÉE :", data);

            const res = await InscriptionModel.inscrire(data);

            if (!res.ok) {
                alert(res.data.error);
                return;
            }

            console.log("REPONSE COMPLETE:", res.data);

            const idInscription = res.data.data.id_inscription;

            localStorage.setItem("id_inscription", idInscription);

            // AFFICHER LE LOADER
            const loader = document.getElementById("pageLoader");

            loader.classList.remove("hidden");

            // REDIRECTION AVEC ANIMATION
            setTimeout(() => {

                window.location.href =
                    "paiement.php?id=" + this.concoursId;

            }, 1200);

        });
    }
}