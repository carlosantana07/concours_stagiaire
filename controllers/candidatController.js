import CandidatModel from "../models/CandidatModel.js";

export default class CandidatController {

    static currentPage = 1;
    static isLoading = false;
    static hasMore = true;

    static resultatsPage = 1;
    static resultatsPerPage = 5;
    static allResultats = [];

    static async loadProfil() {

        const token = localStorage.getItem("token");

        if (!token) {
            window.location.href = "connexion.php";
            return;
        }

        try {
            const res = await CandidatModel.getProfil(token);

            if (!res.ok) {
                alert(res.data.error || "Erreur chargement profil");
                return;
            }

            const c = res.data.data;
            this.currentUser = c; // stocker les infos pour pré-remplissage form

            // ===== HEADER =====
            document.querySelector(".profile-name").innerText =
                (c.nom || "") + " " + (c.prenom || "");

            const grids = document.querySelectorAll(".profile-grid");

            // ===== INFOS PERSO =====
            grids[0].innerHTML = `
                <div><strong>Nom</strong><br>${c.nom || "-"}</div>
                <div><strong>Prénom</strong><br>${c.prenom || "-"}</div>
                <div><strong>Date de naissance</strong><br>${this.formatDate(c.date_naissance)}</div>
                <div><strong>Lieu de naissance</strong><br>${c.lieu_naissance || "-"}</div>
                <div><strong>Téléphone</strong><br>${c.telephone || "-"}</div>
                <div><strong>Email</strong><br>${c.email || "-"}</div>
            `;

            // ===== INFOS PRO =====
            const hasProInfo =
                c.matricule || c.ministere || c.emploi;

            // cacher la section si vide
            const proSection = grids[1].closest(".profile-card");

            if (!hasProInfo) {
                proSection.style.display = "none";
            } else {
                proSection.style.display = "block";

                grids[1].innerHTML = `
        <div><strong>Matricule</strong><br>${c.matricule || "-"}</div>
        <div><strong>Ministère</strong><br>${c.ministere || "-"}</div>
        <div><strong>Emploi actuel</strong><br>${c.emploi || "-"}</div>
    `;
            }

        } catch (err) {
            console.log(err);
            alert("Erreur serveur");
        }

        await this.loadCandidatures();

    }

    static async loadCandidatures() {

        const token = localStorage.getItem("token");

        const res = await CandidatModel.getMesInscriptions(token);

        if (!res.ok) {
            console.log(res.data);
            return;
        }

        const container = document.getElementById("candidaturesContainer");

        const data = res.data.data.slice(0, 5);

        container.innerHTML = `
        <div class="profile-row header">
            <span>Concours</span>
            <span>Statut</span>
        </div>
    `;

        // container.innerHTML = html;
        data.forEach(cand => {
            container.innerHTML += `
            <div class="profile-row">
                <span>${cand.concours?.nom || "-"}</span>
                <span class="status ${cand.statut_inscription === "VALIDEE" ? "paid" : "unpaid"}">
                    ${cand.statut_inscription === "VALIDEE" ? "Payé" : "En attente"}
                </span>
            </div>
        `;
        });
    }

    static initUpdateForm() {

        const form = document.getElementById("formUpdateProfil");

        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const token = localStorage.getItem("token");
            const data = Object.fromEntries(new FormData(form).entries());

            const res = await CandidatModel.updateProfil(data, token);

            if (!res.ok) {
                alert(res.data.error);
                return;
            }

            alert("Profil mis à jour avec succès");

            document.getElementById("modalProfil").classList.add("hidden");

            this.loadProfil();
        });
    }



    static initModal() {

        const modal = document.getElementById("modalProfil");
        const openBtns = document.querySelectorAll(".btn-edit");
        const closeBtn = document.querySelector(".close-btn");

        // ouvrir modal
        openBtns.forEach(btn => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                modal.classList.remove("hidden");

                this.prefillForm();
            });
        });

        // fermer
        closeBtn.addEventListener("click", () => {
            modal.classList.add("hidden");
        });

        // fermer en cliquant dehors
        window.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.classList.add("hidden");
            }
        });
    }

    static prefillForm() {

        const c = this.currentUser;
        const formatDate = new Date(c.date_naissance).toLocaleDateString('fr-FR');


        document.querySelector("[name='nom']").value = c.nom || "";
        document.querySelector("[name='prenom']").value = c.prenom || "";
        document.querySelector("[name='date_naissance']").value = formatDate || "";
        document.querySelector("[name='lieu_naissance']").value = c.lieu_naissance || "";
        document.querySelector("[name='telephone']").value = c.telephone || "";
        document.querySelector("[name='email']").value = c.email || "";

        document.querySelector("[name='emploi']").value = c.emploi || "";
        document.querySelector("[name='ministere']").value = c.ministere || "";
        document.querySelector("[name='matricule']").value = c.matricule || "";
    }

    static formatDate(date) {
        if (!date) return "-";
        return new Date(date).toLocaleDateString("fr-FR");
    }

    static async loadModal() {

        const res = await fetch("../views/modal_profil.php");
        const html = await res.text();

        document.body.insertAdjacentHTML("beforeend", html);

        this.initModal();
        this.initUpdateForm();
    }

    static initEvents() {

        const btnEdit = document.getElementById("btnEditProfilPerso");
        const btnVoir = document.getElementById("btnVoirCandidatures");

        if (btnEdit) {
            btnEdit.addEventListener("click", () => {
                document.getElementById("modalProfil").classList.remove("hidden");
                // CandidatController.loadModal();
            });
        }
    }

    static initCandidaturesModal() {

        const modal = document.getElementById("modalCandidatures");
        const btnVoir = document.getElementById("btnVoirCandidatures");
        const closeBtn = document.querySelector(".close-candidatures");
        const container = document.getElementById("candidaturesModalContainer");

        this.currentPage = 1;
        this.isLoading = false;
        this.hasMore = true;

        btnVoir.addEventListener("click", async () => {

            modal.classList.remove("hidden");
            document.body.style.overflow = "hidden";

            this.currentPage = 1;
            this.hasMore = true;

            container.innerHTML = `
            <div class="profile-row header">
                <span>Concours</span>
                <span>Statut</span>
            </div>
        `;

            await this.loadMoreCandidatures();
        });

        closeBtn.addEventListener("click", () => {
            modal.classList.add("hidden");
            document.body.style.overflow = "auto";
        });

        // IMPORTANT : scroll SUR LE BON ELEMENT
        container.addEventListener("scroll", () => {
            const bottom =
                container.scrollTop + container.clientHeight >= container.scrollHeight - 5;

            if (bottom) {
                this.loadMoreCandidatures();
            }
        });
    }

    static async loadMoreCandidatures() {

        if (this.isLoading || !this.hasMore) return;

        this.isLoading = true;

        const token = localStorage.getItem("token");
        const container = document.getElementById("candidaturesModalContainer");
        const loading = document.getElementById("loading");

        loading.classList.remove("hidden");

        try {

            const res = await fetch(
                `http://localhost:4000/api/candidat/mes-candidatures?page=${this.currentPage}`,
                {
                    headers: { Authorization: `Bearer ${token}` }
                }

            );

            const result = await res.json();

            const items = result.data || [];

            if (items.length === 0) {
                this.hasMore = false;
                loading.innerText = "Plus de candidatures";
                return;
            }

            items.forEach(cand => {

                const row = document.createElement("div");
                row.className = "profile-row";

                row.innerHTML = `
                <span>${cand.concours?.nom || "-"}</span>
                <span class="status ${cand.statut_inscription === "VALIDEE" ? "paid" : "unpaid"}">
                    ${cand.statut_inscription === "VALIDEE" ? "Payé" : "En attente"}
                </span>
            `;

                container.appendChild(row);
            });

            // pagination propre
            this.currentPage++;

            this.hasMore = this.currentPage <= result.pageTot;

        } catch (err) {
            console.error(err);
        }

        this.isLoading = false;
        loading.classList.add("hidden");

        // AUTO LOAD SI PAS DE SCROLL
        setTimeout(() => {
            if (container.scrollHeight <= container.clientHeight && this.hasMore) {
                this.loadMoreCandidatures();
            }
        }, 0);
    }

    static async loadResultats() {

        // this.allResultats = [
        //     {
        //         concours: { nom: "Test Concours A" },
        //         examens: [
        //             {
        //                 intitule: "Math",
        //                 type_examen: "Ecrit",
        //                 coefficient: 2,
        //                 note: 12,
        //                 statut: "EN_ATTENTE"
        //             },
        //             {
        //                 intitule: "Français",
        //                 type_examen: "Ecrit",
        //                 coefficient: 3,
        //                 note: 14,
        //                 statut: "EN_ATTENTE"
        //             }
        //         ]
        //     },
        //     {
        //         concours: { nom: "Test Concours B" },
        //         examens: [
        //             {
        //                 intitule: "Culture G",
        //                 type_examen: "Ecrit",
        //                 coefficient: 2,
        //                 note: 10,
        //                 statut: "EN_ATTENTE"
        //             }
        //         ]
        //     },
        //     {
        //         concours: { nom: "Test Concours A" },
        //         examens: [
        //             {
        //                 intitule: "Math",
        //                 type_examen: "Ecrit",
        //                 coefficient: 2,
        //                 note: 12,
        //                 statut: "EN_ATTENTE"
        //             },
        //             {
        //                 intitule: "Français",
        //                 type_examen: "Ecrit",
        //                 coefficient: 3,
        //                 note: 14,
        //                 statut: "EN_ATTENTE"
        //             }
        //         ]
        //     },
        //     {
        //         concours: { nom: "Test Concours B" },
        //         examens: [
        //             {
        //                 intitule: "Culture G",
        //                 type_examen: "Ecrit",
        //                 coefficient: 2,
        //                 note: 10,
        //                 statut: "EN_ATTENTE"
        //             }
        //         ]
        //     },
        //     {
        //         concours: { nom: "Test Concours A" },
        //         examens: [
        //             {
        //                 intitule: "Math",
        //                 type_examen: "Ecrit",
        //                 coefficient: 2,
        //                 note: 12,
        //                 statut: "EN_ATTENTE"
        //             },
        //             {
        //                 intitule: "Français",
        //                 type_examen: "Ecrit",
        //                 coefficient: 3,
        //                 note: 14,
        //                 statut: "EN_ATTENTE"
        //             }
        //         ]
        //     },
        //     {
        //         concours: { nom: "Test Concours B" },
        //         examens: [
        //             {
        //                 intitule: "Culture G",
        //                 type_examen: "Ecrit",
        //                 coefficient: 2,
        //                 note: 10,
        //                 statut: "EN_ATTENTE"
        //             }
        //         ]
        //     },
        //     {
        //         concours: { nom: "Test Concours A" },
        //         examens: [
        //             {
        //                 intitule: "Math",
        //                 type_examen: "Ecrit",
        //                 coefficient: 2,
        //                 note: 12,
        //                 statut: "EN_ATTENTE"
        //             },
        //             {
        //                 intitule: "Français",
        //                 type_examen: "Ecrit",
        //                 coefficient: 3,
        //                 note: 14,
        //                 statut: "EN_ATTENTE"
        //             }
        //         ]
        //     },
        //     {
        //         concours: { nom: "Test Concours B" },
        //         examens: [
        //             {
        //                 intitule: "Culture G",
        //                 type_examen: "Ecrit",
        //                 coefficient: 2,
        //                 note: 10,
        //                 statut: "EN_ATTENTE"
        //             }
        //         ]
        //     }
        // ];

        // this.resultatsPage = 1;
        // this.renderResultats();

        const token = localStorage.getItem("token");

        const res = await CandidatModel.getResultats(token);

        if (!res.ok) {
            document.getElementById("resultatsBody").innerHTML =
                `<tr><td colspan="6">Erreur chargement</td></tr>`;
            return;
        }

        const data = res.data.data;

        if (!data || data.length === 0) {

            this.allResultats = [];
            this.resultatsPage = 1;

            document.getElementById("resultatsBody").innerHTML = `
            <div class="empty-card" style="text-align: center; align-items: center; display: flex; flex-direction: column; gap: 10px; padding: 20px;">
                <i class="fa-solid fa-triangle-exclamation empty-icon"></i>
                <p>Aucun résultat disponible</p>
            </div>
            `;
            return;
        }

        // IMPORTANT
        this.allResultats = data;
        this.resultatsPage = 1;

        this.renderResultats();
    }

    // static async loadResultats() {

    //     const token = localStorage.getItem("token");
    //     const tbody = document.getElementById("resultatsBody");

    //     const res = await CandidatModel.getResultats(token);

    //     if (!res.ok) {
    //         tbody.innerHTML = `<tr><td colspan="6">Erreur chargement</td></tr>`;
    //         return;
    //     }

    //     const data = res.data.data;

    //     if (!data || data.length === 0) {
    //         tbody.innerHTML = `
    //         <div class="empty-card" style="text-align: center; align-items: center; display: flex; flex-direction: column; gap: 10px; padding: 20px;">
    //             <i class="fa-solid fa-triangle-exclamation empty-icon"></i>
    //             <p>Aucun résultat disponible</p>
    //         </div>
    //         `;
    //         return;

    //     }

    //     tbody.innerHTML = "";

    //     data.forEach(concoursBlock => {

    //         const examens = concoursBlock.examens;
    //         const rowspan = examens.length;

    //         examens.forEach((exam, index) => {

    //             const tr = document.createElement("tr");

    //             let concoursCell = "";

    //             // afficher le nom du concours UNE seule fois
    //             if (index === 0) {
    //                 concoursCell = `
    //                     <td rowspan="${rowspan}" class="nom-concours">
    //                         ${concoursBlock.concours.nom}
    //                     </td>
    //                 `;
    //             }

    //             tr.innerHTML = `
    //                 ${concoursCell}
    //                 <td>${exam.intitule}</td>
    //                 <td>${exam.type_examen}</td>
    //                 <td>${exam.coefficient}</td>
    //                 <td>${exam.note ?? "En attente"}</td>
    //                 ${index === 0 ? `<td rowspan="${rowspan}">
    //                     ${exam.statut ?? "En attente"}
    //                 </td>` : ""}
    //             `;

    //             tbody.appendChild(tr);
    //         });

    //     });
    // }

    static renderResultats() {

        const tbody = document.getElementById("resultatsBody");
        tbody.innerHTML = "";

        const start = (this.resultatsPage - 1) * this.resultatsPerPage;
        const end = start + this.resultatsPerPage;

        const pageData = this.allResultats.slice(start, end);

        pageData.forEach(concoursBlock => {

            const examens = concoursBlock.examens;
            const rowspan = examens.length;

            examens.forEach((exam, index) => {

                const tr = document.createElement("tr");

                let concoursCell = "";

                if (index === 0) {
                    concoursCell = `
                    <td rowspan="${rowspan}" class="nom-concours">
                        ${concoursBlock.concours.nom}
                    </td>
                `;
                }

                tr.innerHTML = `
                ${concoursCell}
                <td>${exam.intitule}</td>
                <td>${exam.type_examen}</td>
                <td>${exam.coefficient}</td>
                <td>${exam.note ?? "En attente"}</td>
                ${index === 0 ? `<td rowspan="${rowspan}">
                    ${exam.statut ?? "En attente"}
                </td>` : ""}
            `;

                tbody.appendChild(tr);
            });
        });
    }

    static initPaginationResultats() {

        const btnNext = document.querySelector(".btn-suivant");
        const btnPrev = document.querySelector(".btn-prev");

        const updateButtons = () => {

            const totalPages = Math.ceil(
                this.allResultats.length / this.resultatsPerPage
            );

            // désactiver précédent si page 1
            btnPrev.disabled = this.resultatsPage === 1;

            // désactiver suivant si dernière page
            btnNext.disabled = this.resultatsPage >= totalPages;
        };

        btnNext.addEventListener("click", () => {

            const totalPages = Math.ceil(
                this.allResultats.length / this.resultatsPerPage
            );

            if (this.resultatsPage < totalPages) {
                this.resultatsPage++;
                this.renderResultats();
                updateButtons();
            }
        });

        btnPrev.addEventListener("click", () => {

            if (this.resultatsPage > 1) {
                this.resultatsPage--;
                this.renderResultats();
                updateButtons();
            }
        });

        // initialisation
        updateButtons();
    }

}
