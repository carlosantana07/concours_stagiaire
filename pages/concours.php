<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Concours</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main-card">
    <h2 id="title"></h2>

    <div class="concours-list" id="list"></div>

    <a href="categories.html" class="back-btn">⬅ Retour</a>
</div>

<script>
const categories = {
    1: "Concours Administratifs",
    2: "Concours Militaires",
    3: "Concours Santé",
    4: "Concours Éducation"
};

const concours = {
    1: ["Douanes", "Impôts", "Trésor"],
    2: ["Gendarmerie", "Armée de terre"],
    3: ["Infirmier d'État", "Médecin"],
    4: ["Instituteur", "Professeur lycée"]
};

const params = new URLSearchParams(window.location.search);
const id = params.get("id");

document.getElementById("title").innerText = categories[id] || "Catégorie";

const container = document.getElementById("list");

(concours[id] || []).forEach(c => {
    const div = document.createElement("div");
    div.className = "concours-card";
    div.innerText = c;

    container.appendChild(div);
});
</script>

</body>
</html>