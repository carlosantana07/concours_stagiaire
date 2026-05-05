import ConcoursModel from "../models/ConcoursModel.js";

// export default class ConcoursController {

//     static async init() {

//         this.container = document.querySelector(".concours-list");
//         this.pagination = document.getElementById("pagination");
//         this.select = document.getElementById("categorieSelect");

//         this.currentPage = 1;
//         this.currentCategorie = "";

//         await this.loadCategories();
//         await this.loadConcours(1);

//         this.bindEvents();
//     }

//     // LOAD CATEGORIES

//     static async loadCategories() {
//         const empty = document.createElement("p");
//         const res = await ConcoursModel.getCategories();

//         if (!res.ok) return;

//         const categories = res.data.data;

//         categories.forEach(cat => {

//             const option = document.createElement("option");

//             option.value = cat.id;
//             option.textContent = cat.libelle;

//             this.select.appendChild(option);
//         });
//     }

//     // LOAD CONCOURS
//     // static async loadConcours() {

//     //     const res = await ConcoursModel.getConcours();

//     //     if (!res.ok) return;

//     //     this.allCategories = res.data.data;

//     //     this.isFiltering = false;

//     //     this.renderConcours(this.allCategories);
//     // }

//     static async loadConcours(page = 1) {

//         const res = await ConcoursModel.getConcours(page, this.currentCategorie);

//         if (!res.ok) return;

//         const { data, totalPages } = res.data;

//         this.container.innerHTML = "";

//         this.renderConcours(data);

//         this.renderPagination(page, totalPages);

//         this.currentPage = page;
//     }

//     static isFiltering = false;
//     static bindEvents() {

//         this.select.addEventListener("change", () => {

//             const selectedId = this.select.value;

//             let filtered = this.allCategories || [];

//             if (selectedId) {
//                 filtered = filtered.filter(cat => cat.id == selectedId);
//             }

//             this.renderConcours(filtered);
//         });
//     }

//     static renderConcours(categories) {

//         this.container.innerHTML = "";
//         let hasConcours = false;
//         categories.forEach(categorie => {

//             const concoursList = categorie.concours || [];

//             concoursList.forEach(concours => {
//                 hasConcours = true;

//                 const card = document.createElement("div");
//                 card.className = "concours-card";

//                 card.innerHTML = `
//                 <h2>${concours.nom}</h2>

//                 <div class="concours-footer">
//                     <div class="infos">
//                         <span>
//                             <i class="fa-solid fa-calendar-days"></i>
//                             ${this.formatDate(concours.date_debut)}
//                         </span>

//                         <span>
//                             <i class="fa-solid fa-users"></i>
//                             ${concours.nombre_postes || 0} postes
//                         </span>
//                     </div>

//                     <a href="detail_concours.php?id=${concours.id_concours}" class="btn-primary">
//                         Voir détails
//                     </a>
//                 </div>
//             `;

//                 this.container.appendChild(card);
//             });
//         });


//         // MESSAGE UNIQUEMENT SI FILTRE + VIDE
//         if (this.isFiltering && !hasConcours) {

//             this.container.innerHTML = `
//             <div class="empty-card">
//                 <i class="fa-solid fa-triangle-exclamation empty-icon"></i>
//                 <p>Aucun concours disponible dans cette catégorie</p>
//             </div>
//         `;
//         }
//     }


//     // PAGINATION

//     static renderPagination(page, totalPages) {

//         this.pagination.innerHTML = "";

//         const prev = document.createElement("span");
//         prev.innerHTML = "&laquo;";
//         prev.className = page === 1 ? "disabled" : "page-item";

//         if (page > 1) {
//             prev.onclick = () => this.loadConcours(page - 1);
//         }

//         this.pagination.appendChild(prev);

//         for (let i = 1; i <= totalPages; i++) {

//             const span = document.createElement("span");
//             span.innerText = i;

//             span.className = (i === page) ? "active" : "page-item";

//             span.onclick = () => this.loadConcours(i);

//             this.pagination.appendChild(span);
//         }

//         const next = document.createElement("span");
//         next.innerHTML = "&raquo;";
//         next.className = page === totalPages ? "disabled" : "page-item";

//         if (page < totalPages) {
//             next.onclick = () => this.loadConcours(page + 1);
//         }

//         this.pagination.appendChild(next);
//     }


//     // UTIL

//     static formatDate(date) {

//         if (!date) return "Non défini";

//         return new Date(date).toLocaleDateString("fr-FR", {
//             day: "2-digit",
//             month: "long",
//             year: "numeric"
//         });
//     }



//     static async initDetail() {

//         const urlParams = new URLSearchParams(window.location.search);
//         const concoursId = urlParams.get("id");

//         if (!concoursId) return;

//         const res = await ConcoursModel.getDetail(concoursId);

//         if (!res.ok) {
//             console.log("Erreur chargement concours");
//             return;
//         }

//         this.renderDetail(res.data.data);
//     }

//     static renderDetail(c) {

//         // TITRE
//         document.getElementById("titreConcours").innerText = c.nom || "";

//         // DESCRIPTION
//         document.getElementById("desc1").innerText = c.description || "";

//         // FRAIS
//         document.getElementById("frais").innerText =
//             (c.frais_inscription || 0) + " FCFA";

//         // DATES
//         document.getElementById("dateDebut").innerText =
//             c.date_debut || "-";

//         document.getElementById("dateFin").innerText =
//             c.date_fin || "-";

//         // STATUT
//         document.getElementById("statut").innerText =
//             c.statut || "Ouvert";

//         // TYPES
//         const typeEl = document.getElementById("type");

//         let types = c.type;

//         if (typeof types === "string") {
//             types = types.split(",");
//         }

//         if (!Array.isArray(types)) {
//             types = [types];
//         }

//         typeEl.innerHTML = types.map(t => {

//             const value = t.trim().toLowerCase();

//             if (value === "direct") {
//                 return `<span class="tag tag-direct">Direct</span>`;
//             }

//             if (value === "professionnel") {
//                 return `<span class="tag tag-professionnel">Professionnel</span>`;
//             }

//             return `<span class="tag">${t}</span>`;

//         }).join(" ");

//         // BUTTON NEXT
//         document.getElementById("btnNext").href =
//             "inscription_concours.php?id=" + c.id_concours;
//     }

// }





2)

import ConcoursModel from "../models/ConcoursModel.js";

export default class ConcoursController {

    static async init() {

        this.container = document.querySelector(".concours-list");
        this.pagination = document.getElementById("pagination");
        this.select = document.getElementById("categorieSelect");

        this.currentPage = 1;
        this.currentCategorie = "";

        await this.loadCategories();
        await this.loadConcours();

        this.bindEvents();
    }

    // EVENTS

    static bindEvents() {

        this.select.addEventListener("change", () => {

            this.currentCategorie = this.select.value;
            this.loadConcours(1);
        });
    }

    // LOAD CATEGORIES

    static async loadCategories() {
        const empty = document.createElement("p");
        const res = await ConcoursModel.getCategories();

        if (!res.ok) return;

        const categories = res.data.data;

        categories.forEach(cat => {

            const option = document.createElement("option");

            option.value = cat.id;
            option.textContent = cat.libelle;

            this.select.appendChild(option);
        });
    }

    // LOAD CONCOURS
    static async loadConcours() {

        const res = await ConcoursModel.getConcours();

        if (!res.ok) return;

        this.allCategories = res.data.data;

        this.isFiltering = false;

        this.renderConcours(this.allCategories);
    }

    static isFiltering = false;
    static bindEvents() {

        this.select.addEventListener("change", () => {

            const selectedId = this.select.value;

            this.isFiltering = selectedId !== "";

            let filtered = this.allCategories;

            if (this.isFiltering) {
                filtered = this.allCategories.filter(cat => cat.id == selectedId);
            }

            this.renderConcours(filtered);
        });
    }

    static renderConcours(categories) {

        this.container.innerHTML = "";

        let hasConcours = false;

        categories.forEach(categorie => {

            if (categorie.concours && categorie.concours.length > 0) {

                hasConcours = true;

                categorie.concours.forEach(concours => {

                    const card = document.createElement("div");
                    card.className = "concours-card";

                    card.innerHTML = `
                    <h2>${concours.nom || concours.titre || "Sans nom"}</h2>

                    <div class="concours-footer">
                        <div class="infos">
                            <span>
                                <i class="fa-solid fa-calendar-days"></i>
                                ${this.formatDate(concours.date_debut || concours.dateDebut)}
                            </span>

                            <span>
                                <i class="fa-solid fa-users"></i>
                                ${concours.nombre_postes || concours.nbPostes || 0} postes
                            </span>
                        </div>

                        <a href="detail_concours.php?id=${concours.id_concours || concours.id}" class="btn-primary">
                            Voir détails
                        </a>
                    </div>
                `;

                    this.container.appendChild(card);
                });
            }
        });

        // MESSAGE UNIQUEMENT SI FILTRE + VIDE
        if (this.isFiltering && !hasConcours) {

            this.container.innerHTML = `
            <div class="empty-card">
                <i class="fa-solid fa-triangle-exclamation empty-icon"></i>
                <p>Aucun concours disponible dans cette catégorie</p>
            </div>
        `;
        }
    }


    // PAGINATION

    static renderPagination(page, totalPages) {

        this.pagination.innerHTML = "";

        const prev = document.createElement("span");
        prev.innerHTML = "&laquo;";
        prev.className = page === 1 ? "disabled" : "page-item";

        if (page > 1) {
            prev.onclick = () => this.loadConcours(page - 1);
        }

        this.pagination.appendChild(prev);

        for (let i = 1; i <= totalPages; i++) {

            const span = document.createElement("span");
            span.innerText = i;

            span.className = (i === page) ? "active" : "page-item";

            span.onclick = () => this.loadConcours(i);

            this.pagination.appendChild(span);
        }

        const next = document.createElement("span");
        next.innerHTML = "&raquo;";
        next.className = page === totalPages ? "disabled" : "page-item";

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

        const urlParams = new URLSearchParams(window.location.search);
        const concoursId = urlParams.get("id");

        if (!concoursId) return;

        const res = await ConcoursModel.getDetail(concoursId);

        if (!res.ok) {
            console.log("Erreur chargement concours");
            return;
        }

        this.renderDetail(res.data.data);
    }

    static renderDetail(c) {

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
            c.statut || "Ouvert";

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
            "inscription_concours.php?id=" + c.id_concours;
    }

}