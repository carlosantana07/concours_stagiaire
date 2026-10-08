import ConcoursModel from "../models/concoursModel.js";

export default class ConcoursController {

    static async init() {

        this.container = document.querySelector(".concours-list");
        this.pagination = document.getElementById("pagination");
        this.select = document.getElementById("categorieSelect");

        this.currentPage = 1;
        this.currentCategorie = "";

        await this.loadCategories();
        await this.loadAllConcours();
        await this.loadConcours(1);

        this.bindEvents();
    }
    // LOAD CATEGORIES

    static async loadCategories() {
        const token = localStorage.getItem("token");

        if (!token) {
            window.location.href = "connexion.php";
            return;
        }
        const empty = document.createElement("p");
        const res = await ConcoursModel.getCategories(token);

        if (!res.ok) return;

        const categories = res.data.data;

        categories.forEach(cat => {

            const option = document.createElement("option");

            option.value = cat.id;
            option.textContent = cat.libelle;

            this.select.appendChild(option);
        });
    }

    //LOAD CONCOURS


    static async loadAllConcours() {
        const token = localStorage.getItem("token");

        if (!token) {
            window.location.href = "connexion.php";
            return;
        }

        const res = await ConcoursModel.getConcours(1, "", token);

        if (!res.ok) {
            console.error("Erreur chargement concours :", res.data);
            this.allConcours = [];
            return;
        }

        const raw = res.data.data;

        const concoursList = Array.isArray(raw)
            ? raw
            : raw?.data || [];

        if (!Array.isArray(concoursList)) {
            console.error("Format API invalide :", res);
            this.allConcours = [];
            return;
        }

        this.allConcours = concoursList;

        //  console.log("Concours chargés :", this.allConcours);
    }

    static async loadConcours(page = 1) {
        const token = localStorage.getItem("token");

        if (!token) {
            window.location.href = "connexion.php";
            return;
        }

        const limit = 10;

        let filtered = [...this.allConcours];

        // filtre catégorie CORRECT
        if (this.currentCategorie !== "") {

            const catId = Number(this.currentCategorie);

            filtered = filtered.filter(c => c.categorie?.id === catId);
        }

        // CAS VIDE
        if (filtered.length === 0) {

            this.container.innerHTML = `
            <div class="empty-card">
                <i class="fa-solid fa-triangle-exclamation empty-icon"></i>
                <p>Aucun concours disponible dans cette catégorie</p>
            </div>
            `;

            this.pagination.innerHTML = "";
            return;
        }

        const start = (page - 1) * limit;
        const end = start + limit;

        const paginated = filtered.slice(start, end);

        this.renderConcours(paginated);

        const totalPages = Math.ceil(filtered.length / limit);

        this.renderPagination(page, totalPages);

        this.currentPage = page;
    }

    static isFiltering = false;
    static bindEvents() {

        this.select.addEventListener("change", () => {

            //  console.log("CATEGORIE SELECTED:", this.select.value);

            this.currentCategorie = this.select.value;

            this.loadConcours(1);
        });
    }


    static renderConcours(concoursList) {

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

        this.container.innerHTML = "";

        concoursList.forEach(concours => {

            const card = document.createElement("div");
            card.className = "concours-card";

            const statutInscription = concours.est_inscrit
                ? `
                <span class="concours-status inscrit">
                    <i class="fa-solid fa-circle-check"></i>
                    Déjà inscrit
                </span>
            `
                : "";

            card.innerHTML = `

            <div class="concours-title">
                <h2>${concours.nom}</h2>

                ${statutInscription}
            </div>

            <div class="concours-footer">

                <div class="infos">
                    <span>
                        <i class="fa-solid fa-calendar-days"></i>
                        ${this.formatDate(concours.date_debut)}
                    </span>

                    <span>
                        <i class="fa-solid fa-users"></i>
                        ${concours.nombre_postes || 0} postes
                    </span>
                </div>

           <a
    href="detail_concours.php?id=${encodeId(concours.id_concours)}"
    class="btn-primary"
>
    Voir détails
</a>

            </div>
        `;

            this.container.appendChild(card);
        });
    }

    // PAGINATION

    static renderPagination(page, totalPages) {

        this.pagination.innerHTML = "";

        const prev = document.createElement("span");
        prev.innerHTML = "&laquo;";
        prev.className = page === 1 ? "page-item disabled" : "page-item";

        if (page > 1) {
            prev.onclick = () => this.loadConcours(page - 1);
        }

        this.pagination.appendChild(prev);

        for (let i = 1; i <= totalPages; i++) {

            const span = document.createElement("span");
            span.innerText = i;

            span.className = (i === page) ? "page-item active" : "page-item";

            span.onclick = () => this.loadConcours(i);

            this.pagination.appendChild(span);
        }

        const next = document.createElement("span");
        next.innerHTML = "&raquo;";
        next.className = page === totalPages ? "page-item disabled" : "page-item";

        if (page < totalPages) {
            next.onclick = () => this.loadConcours(page + 1);
        }

        this.pagination.appendChild(next);
    }


    // UTIL

    static formatDate(date) {

        if (!date) return "Non défini";

        return new Date(date).toLocaleDateString("fr-FR", {
            day: "2-digit",
            month: "long",
            year: "numeric"
        });
    }



    static async initDetail() {
        const token = localStorage.getItem("token");

        if (!token) {
            window.location.href = "connexion.php";
            return;
        }

        function decodeId(encodedId) {
            try {
                let decoded = encodedId
                    .replace(/-/g, "+")
                    .replace(/_/g, "/");

                while (decoded.length % 4 !== 0) {
                    decoded += "=";
                }

                const data = atob(decoded);

                const parts = data.split("|");

                if (parts.length !== 4) {
                    return null;
                }

                const secret = parts[0];
                const id = parts[1];

                if (secret !== "E_CONCOURS_2026_X7K9") {
                    return null;
                }

                if (!/^\d+$/.test(id)) {
                    return null;
                }

                return id;

            } catch (error) {
                console.error("Erreur décodage :", error);
                return null;
            }
        }
        const params = new URLSearchParams(window.location.search);

        const encodedId = params.get("id");

        const concoursId = decodeId(encodedId);

        // if (!concoursId) {
        //     console.error("ID concours invalide");
        // } else {
        //     console.log("ID concours :", concoursId);
        // }

        const res = await ConcoursModel.getDetail(concoursId, token);

        if (!res.ok) {
            Swal.fire({
                icon: "error",
                title: "Erreur",
                text: res.data?.error ||
                    "Erreur chargement concours"
            });

            return;
        }

        this.renderDetail(res.data.data);
    }

    static renderDetail(c) {

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

        // TITRE
        document.getElementById("titreConcours").innerText = c.nom || "";

        // DESCRIPTION
        document.getElementById("desc1").innerText = c.description || "";

        // FRAIS
        document.getElementById("frais").innerText =
            (c.frais_inscription || 0) + " FCFA";

        // DATES
        document.getElementById("dateDebut").innerText =
            c.date_debut || "-";

        document.getElementById("dateFin").innerText =
            c.date_fin || "-";

        // STATUT
        document.getElementById("statut").innerText =
            c.statut_concours || "Ouvert";

        // TYPES
        const typeEl = document.getElementById("type");

        let types = c.type;

        if (typeof types === "string") {
            types = types.split(",");
        }

        if (!Array.isArray(types)) {
            types = [types];
        }

        typeEl.innerHTML = types.map(t => {

            const value = t.trim().toLowerCase();

            if (value === "direct") {
                return `<span class="tag tag-direct">Direct</span>`;
            }

            if (value === "professionnel") {
                return `<span class="tag tag-professionnel">Professionnel</span>`;
            }

            return `<span class="tag">${t}</span>`;

        }).join(" ");

        // BUTTON NEXT

        document.getElementById("btnNext").href =
            "inscription_concours.php?id=" + encodeId(c.id_concours);
    }

}
