<?php
require("../inc/fonction.php");

$results = getAllObjets();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des objets</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Liste des objets</h1>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nom de l'objet</th>
                <th>Catégorie</th>
                <th>Propriétaire</th>
                <th>Date retour</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($results as $result){ ?>
            <tr>
                <td><?= $result['nom_objet'] ?></td>
                <td><?= $result['nom_categorie'] ?></td>
                <td><?= $result['nom_proprietaire'] ?></td>
                <td><?= $result['date_retour'] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
