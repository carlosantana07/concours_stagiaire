const API = "http://localhost:4000/api/candidat";

export default class DocumentModel {

    static async uploadDocuments(token, typeDocument, file) {

        const formData = new FormData();

        formData.append("type_document", typeDocument);
        formData.append("files", file);

        const res = await fetch(`${API}/documents`, {
            method: "POST",
            headers: {
                "Authorization": "Bearer " + token
            },
            body: formData
        });

        const data = await res.json();

        console.log("Réponse upload document :", data);

        return {
            ok: res.ok,
            data
        };
    }

    static async getMesDocuments(token) {

        const res = await fetch(`${API}/mes-documents`, {
            method: "GET",
            headers: {
                "Authorization": "Bearer " + token
            }
        });

        const data = await res.json();

        console.log("Mes documents :", data);

        return {
            ok: res.ok,
            data
        };
    }

    static async updateDocument(token, blobName, file) {

        const formData = new FormData();

        formData.append("file", file);

        const res = await fetch(
            `${API}/documents/update/${encodeURIComponent(blobName)}`,
            {
                method: "PUT",
                headers: {
                    "Authorization": "Bearer " + token
                },
                body: formData
            }
        );

        const data = await res.json();

        console.log("Réponse modification document :", data);

        return {
            ok: res.ok,
            data
        };
    }

    static async deleteDocument(token, blobName) {

        const res = await fetch(
            `${API}/documents/delete/${encodeURIComponent(blobName)}`,
            {
                method: "DELETE",
                headers: {
                    "Authorization": "Bearer " + token
                }
            }
        );

        const data = await res.json();

        console.log("Réponse suppression document :", data);

        return {
            ok: res.ok,
            data
        };
    }
}