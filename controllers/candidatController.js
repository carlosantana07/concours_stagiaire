import CandidatModel from "../models/candidatModel.js";
import PaymentConfirmModel from "../models/PaymentConfirmModel.js";
import DocumentModel from "../models/documentModel.js";

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
            document.getElementById("infoNumeroRecepisse").innerText = c.recepisse || "-";

            document.getElementById("infoEmail").innerText = c.email || "-";
            document.getElementById("infoTelephone").innerText = c.telephone || "-";

        } catch (err) {

            //  console.log(err);

            const messageEl = document.getElementById("profilMessage");

            messageEl.style.display = "block";
            messageEl.textContent = "Erreur serveur";
        }

        await this.loadCandidatures();
    }

    static encodeId(id) {
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
        <span class="text-center">Statut candidature</span>
        <span class="text-center">Paiement</span>
        <span class="text-center">Actions</span>
    </div>
`;

        data.forEach(cand => {
            const validee = cand.statut_inscription === "VALIDEE";
            const paiementReussi = cand.statut_paiement === "REUSSI";
            const motifs = Array.isArray(cand.motif)
                ? cand.motif.map(m => m.contenu).filter(Boolean)
                : [];

            const motifRejet = motifs.join(" ; ");

            const rejetee = cand.statut_inscription === "REJETEE";

            container.innerHTML += `
        <div class="profil-cand-row">
            <span class="text-center">
                ${cand.concours?.nom || "-"}
            </span>

           <span class="col-statut">
    <span class="status ${cand.statut_inscription === "VALIDEE"
                    ? "paid"
                    : rejetee
                        ? "unpaid"
                        : "unpaid"
                }">
        ${cand.statut_inscription === "VALIDEE"
                    ? "Validée"
                    : rejetee
                        ? "Rejetée"
                        : "En traitement"
                }
    </span>

    ${rejetee && motifRejet
                    ? `
                <div class="motif-rejet">
                    <strong>Motif du rejet :</strong>
                    <p>${motifRejet}</p>
                </div>
            `
                    : ""
                }
</span>

            <span class="text-center">
                <span class="status ${paiementReussi ? "paid" : "unpaid"}">
                    ${paiementReussi ? "Payé" : "En attente"}
                </span>
            </span>

            <span class="text-center">
                ${paiementReussi
                    ?
                    `<button
                        type="button"
                        class="btn btn-primary btn-sm btn-download-receipt"
                        data-id="${cand.id_inscription}">
                        <i class="fa-solid fa-download"></i>
                        Télécharger le récépissé
                    </button>`
                    :
                    `<button
                        type="button"
                        class="btn btn-secondary btn-sm btn-payment"
                        data-id="${cand.id_inscription}"
                        data-concours="${cand.concours?.id_concours || ""}"
                        style="background:#eda618;color:white;border:none;">
                        <i class="fa-solid fa-credit-card"></i>
                        Finaliser paiement
                    </button>`
                }
            </span>
        </div>
    `;
        });

        if (!container.dataset.paymentListener) {
            container.addEventListener("click", e => {
                const btn = e.target.closest(".btn-payment");

                if (!btn) return;

                localStorage.setItem("id_inscription", btn.dataset.id);

                const idEncode = this.encodeId(btn.dataset.concours);

                window.location.href =
                    "paiement.php?id=" + encodeURIComponent(idEncode);
            });

            container.dataset.paymentListener = "true";
        }


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
                // console.log(err);
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
        // document.querySelector("[name='telephone']").value = c.telephone || "";
        // document.querySelector("[name='email']").value = c.email || "";
        document.getElementById("emploi_modif").value = c.emploi || "";
        document.getElementById("ministere_modif").value = c.ministere || "";
        // document.querySelector("[name='matricule']").value = c.matricule || "";

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

        if (!modal || !btnVoir || !closeBtn || !container) {
            // console.error("Éléments du modal candidatures introuvables");
            return;
        }

        this.currentPage = 1;
        this.isLoading = false;
        this.hasMore = true;

        btnVoir.addEventListener("click", async (e) => {

            e.preventDefault();

            if (this.isLoading) {
                return;
            }

            modal.classList.remove("hidden");
            document.body.style.overflow = "hidden";

            this.currentPage = 1;
            this.hasMore = true;
            this.isLoading = false;

            container.innerHTML = `
            <div class="profil-cand-row header">
                <span>Concours</span>
                <span>Statut</span>
                <span>Action</span>
            </div>
        `;

            await this.loadMoreCandidatures();

            if (this.hasMore && container.scrollHeight <= container.clientHeight) {
                await this.loadMoreCandidatures();
            }
        });

        closeBtn.addEventListener("click", () => {

            modal.classList.add("hidden");
            document.body.style.overflow = "";

            this.isLoading = false;
        });

        container.addEventListener("scroll", () => {

            if (this.isLoading || !this.hasMore) {
                return;
            }

            const bottom =
                container.scrollTop + container.clientHeight >=
                container.scrollHeight - 10;

            if (bottom) {
                this.loadMoreCandidatures();
            }
        });
    }


    static async loadMoreCandidatures() {
        if (this.isLoading || !this.hasMore) return;

        const token = localStorage.getItem("token");
        const container = document.getElementById("candidaturesModalContainer");
        const loading = document.getElementById("loading");

        if (!container) return;

        this.isLoading = true;

        if (loading) {
            loading.textContent = "Chargement...";
            loading.classList.remove("hidden");
        }

        try {
            const response = await fetch(
                `http://localhost:4000/api/candidat/mes-candidatures?page=${this.currentPage}`,
                {
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                }
            );

            if (!response.ok) {
                throw new Error("Impossible de charger les candidatures.");
            }

            const result = await response.json();
            const candidatures = result.data || [];

            if (this.currentPage === 1) {
                container.innerHTML = `
                <div class="profil-cand-row header">
                    <span>Concours</span>
                    <span>Statut candidature</span>
                    <span>Paiement</span>
                    <span>Actions</span>
                </div>
                <div id="candidaturesModalRows"></div>
            `;
            }

            const rowsContainer = document.getElementById("candidaturesModalRows");

            if (!rowsContainer) return;

            if (candidatures.length === 0) {
                this.hasMore = false;

                if (this.currentPage === 1) {
                    rowsContainer.innerHTML = `
                    <div class="candidatures-empty">
                        Aucune candidature disponible.
                    </div>
                `;
                }

                return;
            }

            candidatures.forEach((cand) => {
                const row = document.createElement("div");
                row.className = "profil-cand-row";

                const nomConcours = cand.concours?.nom
                    || "-";


                let statutCandidature = "";
                let classeStatut = "";

                if (cand.statut_inscription === "VALIDEE") {
                    statutCandidature = "Validée";
                    classeStatut = "statut-validee";
                } else if (cand.statut_inscription === "REJETEE") {
                    statutCandidature = "Rejetée";
                    classeStatut = "statut-rejetee";
                } else {
                    statutCandidature = "En traitement";
                    classeStatut = "statut-attente";
                }

                const paiementReussi = cand.statut_paiement === "REUSSI";

                const statutPaiement = paiementReussi
                    ? `<span class="status paid">Payé</span>`
                    : `<span class="status unpaid">Non payé</span>`;

                const motifs = Array.isArray(cand.motif)
                    ? cand.motif.map(m => m.contenu).filter(Boolean)
                    : [];

                const motifRejet = motifs.join(" ; ");

                const detailsRejet =
                    cand.statut_inscription === "REJETEE" && motifRejet
                        ? `
                        <div class="motif-rejet">
                            <strong>Motif du rejet :</strong>
                            <p>${this.escapeHTML(motifRejet)}</p>
                        </div>
                    `
                        : "";

                let actions = "";

                if (paiementReussi) {
                    actions = `
                    <button
                        type="button"
                        class="btn-download-receipt"
                        data-id-inscription="${cand.id_inscription}">
                        <i class="fa-solid fa-download"></i>
                        Télécharger le récépissé
                    </button>
                `;
                } else {
                    actions = `
                    <button
                        type="button"
                        class="btn-payment"
                        data-id-inscription="${cand.id_inscription}">
                        style="background:#eda618;color:white;border:none;">
                        <i class="fa-solid fa-credit-card"></i>
                        Finaliser paiement
                    </button>
                `;
                }

                row.innerHTML = `
                <span class="col-concours">
                    ${this.escapeHTML(nomConcours)}
                </span>

                <span class="col-statut">
                    <span class="badge-statut ${classeStatut}">
                        ${statutCandidature}

                    </span>
                    ${detailsRejet}
                </span>

                <span class="col-paiement">
                    ${statutPaiement}
                </span>

                <span class="col-actions">
                    ${actions}
                </span>
            `;

                rowsContainer.appendChild(row);
            });

            this.currentPage++;

            if (result.pageTot && this.currentPage > result.pageTot) {
                this.hasMore = false;
            } else if (!result.pageTot && candidatures.length < 5) {
                this.hasMore = false;
            }

        } catch (error) {
            console.error("Erreur chargement candidatures :", error);

            if (loading) {
                loading.textContent = "Erreur lors du chargement des candidatures.";
                loading.classList.remove("hidden");
            }
        } finally {
            this.isLoading = false;

            if (loading) {
                loading.classList.add("hidden");
            }
        }
    }

    static escapeHTML(value) {
        const div = document.createElement("div");
        div.textContent = value ?? "";
        return div.innerHTML;
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

                // console.error(err);

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

            document.getElementById("resultatsBody").innerHTML = `
            <tr>
                <td colspan="6">
                    Erreur chargement
                </td>
            </tr>
        `;

            return;
        }

        const data = res.data;

        // console.log("DATA UTILISÉ POUR LE RENDU :", data);
        // console.log("EST UN TABLEAU :", Array.isArray(data));

        if (!data || data.length === 0) {

            this.allResultats = [];
            this.resultatsPage = 1;

            document.getElementById("resultatsBody").innerHTML = `
            <tr>
                <td colspan="6">
                    <div class="empty-card" style="text-align:center;display:flex;flex-direction:column;gap:10px;padding:20px;">
                        <i class="fa-solid fa-triangle-exclamation empty-icon"></i>
                        <p>Aucun résultat disponible</p>
                    </div>
                </td>
            </tr>
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

        pageData.forEach(resultat => {
            const tr = document.createElement("tr");

            const noteCg = resultat.note_cg != null
                ? Number(resultat.note_cg).toFixed(2)
                : "-";

            const noteSp = resultat.note_sp != null
                ? Number(resultat.note_sp).toFixed(2)
                : "-";

            const moyenne = resultat.moyenne != null
                ? Number(resultat.moyenne).toFixed(2)
                : "-";

            tr.innerHTML = `
            <td>
                ${resultat.concours?.nom ?? "-"}
            </td>

            <td>
                ${resultat.examen?.intitule ?? "-"}
            </td>
            
            <td>
                ${resultat.examen?.type_examen ?? "-"}
            </td>

            <td>
                ${noteCg}
            </td>

            <td>
                ${noteSp}
            </td>

            <td>
                <strong>${moyenne}</strong>
            </td>

            <td>
                <span class="resultat-statut ${resultat.statut === "REUSSI" ? "reussi" : ""}">
                    ${resultat.statut ?? "En attente"}
                </span>
            </td>
        `;

            tbody.appendChild(tr);
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

    static initDocuments() {

        const btn = document.getElementById("btn-upload-documents");

        if (!btn) {
            return;
        }

        const pieceIdentite = document.getElementById("identite");
        const pieceIdentiteName = document.getElementById("pieceIdentiteName");

        const certificatNationalite = document.getElementById("nationalite");
        const certificatName = document.getElementById("certificatName");

        const certificatNaissance = document.getElementById("acte");
        const certificatNaissanceName = document.getElementById("naissanceName");

        const lettreEquivalence = document.getElementById("equivalence");
        const lettreEquivalenceName = document.getElementById("lettreEquivalenceName");

        const arreteHabilitation = document.getElementById("arrete_habilitation");
        const arreteHabilitationName = document.getElementById("arreteHabilitationName");

        const certificatMedical = document.getElementById("medical");
        const certificatMedicalName = document.getElementById("certificatMedicalName");

        pieceIdentite.addEventListener("change", () => {
            const file = pieceIdentite.files[0];
            pieceIdentiteName.textContent = file ? file.name : "";
        });

        certificatNationalite.addEventListener("change", () => {
            const file = certificatNationalite.files[0];
            certificatName.textContent = file ? file.name : "";
        });

        certificatNaissance.addEventListener("change", () => {
            const file = certificatNaissance.files[0];
            certificatNaissanceName.textContent = file ? file.name : "";
        });

        lettreEquivalence.addEventListener("change", () => {
            const file = lettreEquivalence.files[0];
            lettreEquivalenceName.textContent = file ? file.name : "";
        });

        arreteHabilitation.addEventListener("change", () => {
            const file = arreteHabilitation.files[0];
            arreteHabilitationName.textContent = file ? file.name : "";
        });

        certificatMedical.addEventListener("change", () => {
            const file = certificatMedical.files[0];
            certificatMedicalName.textContent = file ? file.name : "";
        });

        btn.addEventListener("click", async () => {

            const selection = [
                { typeDocument: "IDENTITE", input: pieceIdentite, nameEl: pieceIdentiteName },
                { typeDocument: "NATIONALITE", input: certificatNationalite, nameEl: certificatName },
                { typeDocument: "NAISSANCE", input: certificatNaissance, nameEl: certificatNaissanceName },
                { typeDocument: "EQUIVALENCE", input: lettreEquivalence, nameEl: lettreEquivalenceName },
                { typeDocument: "ARRETE_HABILITATION", input: arreteHabilitation, nameEl: arreteHabilitationName },
                { typeDocument: "MEDICAL", input: certificatMedical, nameEl: certificatMedicalName },
            ].filter((item) => item.input.files[0]);

            if (selection.length === 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Document manquant",
                    text: "Veuillez sélectionner au moins un document à envoyer."
                });

                return;
            }

            const token = localStorage.getItem("token");

            if (!token) {
                window.location.href = "connexion.php";
                return;
            }

            btn.disabled = true;

            const originalContent = btn.innerHTML;

            btn.innerHTML = `
            <i class="fas fa-spinner fa-spin"></i>
            Upload en cours...
        `;

            try {

                const res = await DocumentModel.uploadDocuments(
                    token,
                    selection.map((item) => ({
                        typeDocument: item.typeDocument,
                        file: item.input.files[0]
                    }))
                );

                // console.log("UPLOAD DOCUMENTS :", res);

                if (!res.ok) {

                    Swal.fire({
                        icon: "error",
                        title: "Erreur",
                        text: res.data?.error ||
                            "Impossible d'envoyer les documents."
                    });

                    return;
                }

                Swal.fire({
                    icon: "success",
                    title: "Documents enregistrés",
                    text: "Vos documents ont été enregistrés avec succès."
                });

                selection.forEach((item) => {
                    item.input.value = "";
                    item.nameEl.textContent = "";
                });

            } catch (error) {

                console.error("Erreur upload documents :", error);

                Swal.fire({
                    icon: "error",
                    title: "Erreur",
                    text: "Une erreur est survenue lors de l'envoi des documents."
                });

            } finally {

                btn.disabled = false;
                btn.innerHTML = originalContent;
            }
        });

        this.loadDocuments();
        this.initDocumentModification();
        this.initDocumentSuppression();
    }
    static async loadDocuments() {

        const documentsList = document.getElementById("documents-list");
        const documentsCount = document.getElementById("documentsCount");
        const uploadSection = document.getElementById("documents-upload-section");

        if (!documentsList) {
            return;
        }

        const token = localStorage.getItem("token");

        if (!token) {
            documentsList.innerHTML = `
            <div class="documents-empty">
                <div class="documents-empty-icon">
                    <i class="fa-regular fa-folder-open"></i>
                </div>

                <div class="documents-empty-title">
                    Connexion requise
                </div>

                <p class="documents-empty-text">
                    Connectez-vous pour consulter vos documents.
                </p>
            </div>
        `;

            return;
        }

        documentsList.innerHTML = `
        <div class="documents-loading">
            <i class="fas fa-spinner fa-spin"></i>
            <span>Chargement de vos documents...</span>
        </div>
    `;

        try {

            const res = await DocumentModel.getMesDocuments(token);

            // console.log("DOCUMENTS DU CANDIDAT :", res);

            if (!res.ok) {

                documentsList.innerHTML = `
                <div class="documents-empty documents-error">
                    <div class="documents-empty-icon">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>

                    <div class="documents-empty-title">
                        Impossible de charger les documents
                    </div>

                    <p class="documents-empty-text">
                        Veuillez réessayer plus tard.
                    </p>
                </div>
            `;

                return;
            }

            let documents = res.data?.data || [];

            if (typeof documents === "string") {

                try {
                    documents = JSON.parse(documents);
                } catch (error) {

                    console.error(
                        "Erreur parsing documents :",
                        error
                    );

                    documents = [];
                }
            }

            if (!Array.isArray(documents)) {
                documents = [];
            }

            if (documentsCount) {
                documentsCount.textContent = documents.length;
            }

            if (uploadSection) {
                const correspondanceDocuments = {
                    IDENTITE: "identite",
                    NATIONALITE: "nationalite",
                    NAISSANCE: "acte",
                    EQUIVALENCE: "equivalence",
                    ARRETE_HABILITATION: "arrete_habilitation",
                    MEDICAL: "medical"
                };

                const documentsEnregistres = new Set(
                    documents.map(doc =>
                        String(doc.type_document || "").trim().toUpperCase()
                    )
                );

                Object.entries(correspondanceDocuments).forEach(([type, id]) => {
                    const champ = document.getElementById(id);

                    if (!champ) {
                        console.warn(`Champ introuvable : ${id}`);
                        return;
                    }

                    const conteneur = champ.closest(".profil-field");

                    if (!conteneur) {
                        console.warn(`Conteneur introuvable pour : ${id}`);
                        return;
                    }

                    const estEnregistre = documentsEnregistres.has(type);

                    conteneur.style.display = estEnregistre ? "none" : "";

                    if (id === "identite") {
                        const libelle = conteneur.previousElementSibling;

                        if (libelle && libelle.classList.contains("profil-field")) {
                            libelle.style.display = estEnregistre ? "none" : "";
                        }
                    }

                });

                const tousLesDocumentsEnregistres = Object.keys(
                    correspondanceDocuments
                ).every(type => documentsEnregistres.has(type));

                uploadSection.style.display = tousLesDocumentsEnregistres
                    ? "none"
                    : "block";
            }

            if (documents.length === 0) {

                documentsList.innerHTML = `
                <div class="documents-empty">

                    <div class="documents-empty-icon">
                        <i class="fa-regular fa-folder-open"></i>
                    </div>

                    <div class="documents-empty-title">
                        Aucun document enregistré
                    </div>

                    <p class="documents-empty-text">
                        Les documents que vous transmettrez apparaîtront ici.
                    </p>

                </div>
            `;

                return;
            }

            documentsList.innerHTML = documents.map(document => {

                let nomDocument = document.type_document;
                let icone = "fa-file";

                if (document.type_document === "IDENTITE") {
                    nomDocument = "Carte d'identité (CNI)";
                    icone = "fa-id-card";
                }

                if (document.type_document === "NATIONALITE") {
                    nomDocument = "Certificat de nationalité";
                    icone = "fa-certificate";
                }

                if (document.type_document === "PASSPORT") {
                    nomDocument = "Passeport";
                    icone = "fa-passport";
                }

                // if (document.type_document === "CANDIDATURE") {
                //     nomDocument = "Fiche de candidature";
                //     icone = "fa-file-lines";
                // }

                if (document.type_document === "NAISSANCE") {
                    nomDocument = "Extrait de naissance";
                    icone = "fa-file-lines";
                }

                if (document.type_document === "EQUIVALENCE") {
                    nomDocument = "Lettre d'équivalence";
                    icone = "fa-file-lines";
                }

                if (document.type_document === "ARRETE_HABILITATION") {
                    nomDocument = "Arrêté d'habilitation";
                    icone = "fa-file-lines";
                }

                if (document.type_document === "MEDICAL") {
                    nomDocument = "Certificat médical";
                    icone = "fa-file-medical";
                }

                return `
                <div class="document-item">

                    <div class="document-info">

                        <div class="document-icon">
                            <i class="fa-solid ${icone}"></i>
                        </div>

                        <div class="document-content">

                            <div class="document-title">
                                ${nomDocument}
                            </div>

                            <div class="document-status">
                                <i class="fa-solid fa-circle"></i>
                                Document enregistré
                            </div>

                        </div>

                    </div>


                <div class="document-actions">

                      <a
                        href="${document.url}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="document-view">

                        <i class="fa-solid fa-eye"></i>
                        <span>Voir</span>

                    </a>

                    <button
                        type="button"
                        class="document-edit"
                        data-blob-name="${document.fichier}"
                        data-document-type="${nomDocument}">

                        <i class="fa-solid fa-pen"></i>
                        <span>Modifier</span>

                    </button>

                    <button
                        type="button"
                        class="document-delete"
                        data-blob-name="${document.fichier}"
                        data-document-type="${nomDocument}">

                        <i class="fa-solid fa-trash"></i>
                        <span>Supprimer</span>

                    </button>

                </div>

                </div>
            `;

            }).join("");

        } catch (error) {

            console.error(
                "Erreur récupération documents :",
                error
            );

            documentsList.innerHTML = `
            <div class="documents-empty documents-error">

                <div class="documents-empty-icon">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>

                <div class="documents-empty-title">
                    Une erreur est survenue
                </div>

                <p class="documents-empty-text">
                    Impossible de charger vos documents.
                </p>

            </div>
        `;
        }
    }

    static initDocumentModification() {

        const documentsList = document.getElementById("documents-list");

        if (!documentsList) {
            return;
        }

        documentsList.addEventListener("click", async (event) => {

            const button = event.target.closest(".document-edit");

            if (!button) {
                return;
            }

            const blobName = button.dataset.blobName;
            const documentType = button.dataset.documentType;

            if (!blobName) {
                Swal.fire({
                    icon: "error",
                    title: "Document introuvable",
                    text: "Impossible d'identifier le document à modifier."
                });

                return;
            }

            const input = document.createElement("input");

            input.type = "file";
            input.accept = ".pdf,.jpg,.jpeg,.png";

            input.addEventListener("change", async () => {

                const file = input.files[0];

                if (!file) {
                    return;
                }

                const token = localStorage.getItem("token");

                if (!token) {
                    window.location.href = "connexion.php";
                    return;
                }

                const confirmation = await Swal.fire({
                    icon: "question",
                    title: "Modifier le document ?",
                    text: `Vous allez remplacer votre ${documentType}.`,
                    showCancelButton: true,
                    confirmButtonText: "Oui, remplacer",
                    cancelButtonText: "Annuler"
                });

                if (!confirmation.isConfirmed) {
                    return;
                }

                button.disabled = true;

                const originalContent = button.innerHTML;

                button.innerHTML = `
                <i class="fas fa-spinner fa-spin"></i>
                Modification...
            `;

                try {

                    const res = await DocumentModel.updateDocument(
                        token,
                        blobName,
                        file
                    );

                    // console.log("MODIFICATION DOCUMENT :", res);

                    if (!res.ok) {

                        Swal.fire({
                            icon: "error",
                            title: "Erreur",
                            text: res.data?.error ||
                                "Impossible de modifier le document."
                        });

                        return;
                    }

                    await Swal.fire({
                        icon: "success",
                        title: "Document modifié",
                        text: "Votre document a été remplacé avec succès.",
                        timer: 1800,
                        showConfirmButton: false
                    });

                    await this.loadDocuments();

                } catch (error) {

                    console.error(
                        "Erreur modification document :",
                        error
                    );

                    Swal.fire({
                        icon: "error",
                        title: "Erreur",
                        text: "Une erreur est survenue lors de la modification du document."
                    });

                } finally {

                    button.disabled = false;
                    button.innerHTML = originalContent;

                }
            });

            input.click();
        });
    }

    static initDocumentSuppression() {

        const documentsList = document.getElementById("documents-list");

        if (!documentsList) {
            return;
        }

        documentsList.addEventListener("click", async (event) => {

            const button = event.target.closest(".document-delete");

            if (!button) {
                return;
            }

            const blobName = button.dataset.blobName;
            const documentType = button.dataset.documentType;

            if (!blobName) {

                Swal.fire({
                    icon: "error",
                    title: "Document introuvable",
                    text: "Impossible d'identifier le document à supprimer."
                });

                return;
            }

            const confirmation = await Swal.fire({
                icon: "warning",
                title: "Supprimer ce document ?",
                text: `Vous êtes sur le point de supprimer votre ${documentType}. Cette action est irréversible.`,
                showCancelButton: true,
                confirmButtonText: "Oui, supprimer",
                cancelButtonText: "Annuler",
                reverseButtons: true
            });

            if (!confirmation.isConfirmed) {
                return;
            }

            const token = localStorage.getItem("token");

            if (!token) {
                window.location.href = "connexion.php";
                return;
            }

            button.disabled = true;

            const originalContent = button.innerHTML;

            button.innerHTML = `
            <i class="fas fa-spinner fa-spin"></i>
        `;

            try {

                const res = await DocumentModel.deleteDocument(
                    token,
                    blobName
                );

                //  console.log("SUPPRESSION DOCUMENT :", res);

                if (!res.ok) {

                    Swal.fire({
                        icon: "error",
                        title: "Suppression impossible",
                        text: res.data?.error ||
                            "Impossible de supprimer le document."
                    });

                    return;
                }

                await Swal.fire({
                    icon: "success",
                    title: "Document supprimé",
                    text: "Le document a été supprimé avec succès.",
                    timer: 1800,
                    showConfirmButton: false
                });

                await this.loadDocuments();

            } catch (error) {

                console.error(
                    "Erreur suppression document :",
                    error
                );

                Swal.fire({
                    icon: "error",
                    title: "Erreur",
                    text: "Une erreur est survenue lors de la suppression du document."
                });

            } finally {

                button.disabled = false;
                button.innerHTML = originalContent;
            }
        });
    }
}