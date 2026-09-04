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
}