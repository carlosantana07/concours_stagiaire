import CandidatModel from "../models/CandidatModel.js";
import PaymentConfirmModel from "../models/PaymentConfirmModel.js";

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

            const messageEl = document.getElementById("profilMessage");

            messageEl.style.display = "none";
            messageEl.textContent = "";

            if (!res.ok) {

                messageEl.style.display = "block";
                messageEl.textContent =
                    res.data.error || "Erreur chargement profil";

                return;
            }
            const c = res.data.data;
            this.currentUser = c;

            // HEADER
            document.querySelector(".profil-name").innerText = (c.nom || "") + " " + (c.prenom || "");
            document.querySelector(".profil-email").innerText = c.email || "";

            // INITIALES AVATAR
            const initiales = ((c.nom || "")[0] || "") + ((c.prenom || "")[0] || "");
            document.getElementById("profileAvatar").innerText = initiales.toUpperCase();

            // INFOS PERSO
            document.getElementById("infoNom").innerText = c.nom || "-";
            document.getElementById("infoPrenom").innerText = c.prenom || "-";
            document.getElementById("infoDateNaissance").innerText = c.date_naissance || "-";
            document.getElementById("infoLieuNaissance").innerText = c.lieu_naissance || "-";
            document.getElementById("infoMinistere").innerText = c.ministere || "-";
            document.getElementById("infoEmploi").innerText = c.emploi || "-";
            document.getElementById("infoMatricule").innerText = c.matricule || "-";

            document.getElementById("infoEmail").innerText = c.email || "-";
            document.getElementById("infoTelephone").innerText = c.telephone || "-";

        } catch (err) {

            // console.log(err);

            const messageEl = document.getElementById("profilMessage");

            messageEl.style.display = "block";
            messageEl.textContent = "Erreur serveur";
        }

        await this.loadCandidatures();
    }

    static async loadCandidatures() {

        const token = localStorage.getItem("token");

        const res = await CandidatModel.getMesInscriptions(token);

        const messageEl = document.getElementById("candidaturesMessage");

        messageEl.style.display = "none";
        messageEl.textContent = "";

        if (!res.ok) {

            messageEl.style.display = "block";
            messageEl.textContent =
                res.data.error || "Erreur chargement candidatures";

            return;
        }
        const container = document.getElementById("candidaturesContainer");
        const data = res.data.data.slice(0, 5);

        container.innerHTML = `
            <div class="profil-cand-row header">
                <span class="text-center">Concours</span>
                <span class="text-center">Statut</span>
                <span class="text-center">Actions</span>
            </div>
        `;
        data.forEach(cand => {
            container.innerHTML += `
        <div class="profil-cand-row">
            <span class="text-center">${cand.concours?.nom || "-"}</span>
            <span class="text-center status ${cand.statut_inscription === "VALIDEE" ? "paid" : "unpaid"
                }">
                ${cand.statut_inscription === "VALIDEE" ? "Payé" : "En attente"}
            </span>
            <span class="text-center">
                

                ${cand.statut_inscription === "VALIDEE"

                    ?

                    ` <button
                class="btn btn-primary btn-sm btn-download-receipt"
                data-id="${cand.id_inscription}">
                <i class="fa-solid fa-download"></i>
                Télécharger reçu
            </button>`
                    :

                    `<button 
                        class="btn btn-secondary btn-sm btn-payment"
                        data-id="${cand.id_inscription}"
                        data-concours="${cand.concours.id_concours}"
                        style="background: #eda618; color: white; border: none;">
                        <i class="fa-solid fa-credit-card"></i>
                        Finaliser paiement
                    </button>`
                }

            </span>
        </div>
    `;
        });

        document.addEventListener("click", e => {

            const btn = e.target.closest(".btn-payment");

            if (!btn) return;


            localStorage.setItem(
                "id_inscription",
                btn.dataset.id
            );


            window.location.href =
                "paiement.php?id=" + btn.dataset.concours;

        });
    }

    static bindEvents() {

        const container = document.getElementById("candidaturesContainer");
        const messageEl = document.getElementById("paymentMessage");

        if (!container) return;

        container.addEventListener("click", async (e) => {

            const btn = e.target.closest(".btn-download-receipt");
            if (!btn) return;

            messageEl.style.display = "none";
            messageEl.textContent = "";

            try {
                const id_inscription = btn.dataset.id;

                if (!id_inscription) {
                    messageEl.style.display = "block";
                    messageEl.textContent = "Inscription introuvable";
                    return;
                }

                const blob = await PaymentConfirmModel.getRecepisse(id_inscription);
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
                messageEl.style.display = "block";
                messageEl.textContent = "Erreur lors du téléchargement du reçu";
            }
        });
    }

    static initUpdateForm() {

        const form = document.getElementById("formUpdateProfil");

        form.addEventListener("submit", async (e) => {
            e.preventDefault();

            const token = localStorage.getItem("token");
            const data = Object.fromEntries(new FormData(form).entries());

            const res = await CandidatModel.updateProfil(data, token);

            const messageEl = document.getElementById("profilMessage");

            messageEl.textContent = "";
            messageEl.classList.remove("success", "error");
            messageEl.style.display = "block";

            if (!res.ok) {
                messageEl.classList.add("error");
                messageEl.textContent = res.data.error || "Erreur mise à jour profil";
                return;
            }

            messageEl.classList.add("success");
            messageEl.textContent = "Profil mis à jour avec succès";

            // fermeture après affichage
            setTimeout(() => {
                document.getElementById("modalProfil").classList.add("hidden");

                // reset propre
                messageEl.textContent = "";
                messageEl.style.display = "none";
                messageEl.classList.remove("success", "error");
            }, 1500);
            //this.loadProfil();
        });
    }

    static initModal() {

        const modal = document.getElementById("modalProfil");
        const openBtns = document.querySelectorAll(".btn-edit");
        const closeBtn = document.querySelector(".close-btn");

        openBtns.forEach(btn => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                modal.classList.remove("hidden");
                this.prefillForm();
            });
        });

        closeBtn.addEventListener("click", () => {
            modal.classList.add("hidden");
        });

        window.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.classList.add("hidden");
            }
        });
    }

    static prefillForm() {

        const c = this.currentUser;
        const formatDate = new Date(c.date_naissance).toLocaleDateString('fr-FR');

        // document.querySelector("[name='nom']").value = c.nom || "";
        // document.querySelector("[name='prenom']").value = c.prenom || "";
        // document.querySelector("[name='date_naissance']").value = c.date_naissance || "";
        // document.querySelector("[name='lieu_naissance']").value = c.lieu_naissance || "";
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

        if (btnEdit) {
            btnEdit.addEventListener("click", () => {
                document.getElementById("modalProfil").classList.remove("hidden");
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
                <div class="profil-cand-row header">
                    <span>Concours</span>
                    <span>Statut</span>
                    <span>Action</span>
                </div>
            `;

            await this.loadMoreCandidatures();
        });

        closeBtn.addEventListener("click", () => {
            modal.classList.add("hidden");
            document.body.style.overflow = "auto";
        });

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
                row.className = "profil-cand-row";

                row.innerHTML = `
                    <span>${cand.concours?.nom || "-"}</span>
                    <span class="status ${cand.statut_inscription === "VALIDEE" ? "paid" : "unpaid"}">
                        ${cand.statut_inscription === "VALIDEE" ? "Payé" : "En attente"}
                    </span>
                    <span class="text-center">
                

                ${cand.statut_inscription === "VALIDEE"

                        ?

                        ` <button
                class="btn btn-primary btn-sm btn-download-receipt"
                data-id="${cand.id_inscription}">
                <i class="fa-solid fa-download"></i>
                Télécharger reçu
            </button>`
                        :

                        `<button 
                        class="btn btn-secondary btn-sm btn-payment"
                        data-id="${cand.id_inscription}"
                        data-concours="${cand.concours.id_concours}"
                        style="background: #eda618; color: white; border: none;">
                        <i class="fa-solid fa-credit-card"></i>
                        Finaliser paiement
                    </button>`
                    }

            </span>
                `;

                container.appendChild(row);
            });

            this.currentPage++;
            this.hasMore = this.currentPage <= result.pageTot;


        } catch (err) {
            // console.error(err);
        }

        this.isLoading = false;
        loading.classList.add("hidden");

        setTimeout(() => {
            if (container.scrollHeight <= container.clientHeight && this.hasMore) {
                this.loadMoreCandidatures();
            }
        }, 0);
    }

    static bindModalEvents() {

        const container = document.getElementById("candidaturesModalContainer");

        if (!container) return;


        container.addEventListener("click", async (e) => {


            const btnDownload = e.target.closest(".btn-download-receipt");

            if (!btnDownload) return;


            const id_inscription = btnDownload.dataset.id;


            try {

                const blob =
                    await PaymentConfirmModel.getRecepisse(id_inscription);


                const url = window.URL.createObjectURL(blob);


                const a = document.createElement("a");

                a.href = url;
                a.download = "recepisse.pdf";


                document.body.appendChild(a);

                a.click();

                a.remove();


                window.URL.revokeObjectURL(url);


            } catch (err) {

                console.error(err);

                Swal.fire(
                    "Erreur",
                    "Impossible de télécharger le reçu.",
                    "error"
                );
            }


            const btnPayment = e.target.closest(".btn-payment");

            if (btnPayment) {
                localStorage.setItem("id_inscription", btnPayment.dataset.id);

                window.location.href =
                    `paiement.php?id=${btnPayment.dataset.concours}`;
            }
        });

    }

    static async loadResultats() {

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
                <div class="empty-card" style="text-align:center;display:flex;flex-direction:column;gap:10px;padding:20px;">
                    <i class="fa-solid fa-triangle-exclamation empty-icon"></i>
                    <p>Aucun résultat disponible</p>
                </div>
            `;
            return;
        }

        this.allResultats = data;
        this.resultatsPage = 1;
        this.renderResultats();
    }

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
                    ${index === 0 ? `<td rowspan="${rowspan}">${exam.statut ?? "En attente"}</td>` : ""}
                `;

                tbody.appendChild(tr);
            });
        });
    }

    static initPaginationResultats() {

        const btnNext = document.querySelector(".btn-suivant");
        const btnPrev = document.querySelector(".btn-prev");

        const updateButtons = () => {
            const totalPages = Math.ceil(this.allResultats.length / this.resultatsPerPage);
            btnPrev.disabled = this.resultatsPage === 1;
            btnNext.disabled = this.resultatsPage >= totalPages;
        };

        btnNext.addEventListener("click", () => {
            const totalPages = Math.ceil(this.allResultats.length / this.resultatsPerPage);
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

        updateButtons();
    }
}