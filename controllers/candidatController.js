import CandidatModel from "../models/CandidatModel.js";

export default class CandidatController {

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
            grids[1].innerHTML = `
                <div><strong>Matricule</strong><br>${c.matricule || "-"}</div>
                <div><strong>Ministère</strong><br>${c.ministere || "-"}</div>
                <div><strong>Emploi actuel</strong><br>${c.emploi || "-"}</div>
            `;

        } catch (err) {
            console.log(err);
            alert("Erreur serveur");
        }
    }

    static formatDate(date) {
        if (!date) return "-";
        return new Date(date).toLocaleDateString("fr-FR");
    }

}