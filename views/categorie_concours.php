<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Catégories</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body style="background:#fff;">
    <?php include("header.php"); ?>

    <div class="main-card">
        <h2>Choisissez une catégorie</h2>

        <div class="categories" id="categories"></div>
    </div>
    <?php include("footer.php"); ?>

    <script>
        fetch("http://localhost:4000/api/concours/categories")
            .then(res => res.json())
            .then(data => {

                // console.log("REPONSE API :", data);

                //ici ton récupère le tableau
                const categories = data.data;

                if (!Array.isArray(categories)) {
                    console.log("Format invalide :", data);
                    return;
                }

                const container = document.getElementById("categories");
                container.innerHTML = "";

                categories.forEach(cat => {

                    const card = document.createElement("a");
                    card.className = "category-card";
                    card.href = "liste_concours.php?id=" + cat.id;

                    card.innerHTML = `
                <h3>${cat.libelle}</h3>
                <p>${cat.description}</p>
            `;

                    container.appendChild(card);
                });

            })
            .catch(err => console.log(err));
    </script>


</body>

</html>