<?php
include_once '../inc/connexion.php';
require("../inc/fonction.php");
$conn = connexion();

$result = getAllObjets($conn);
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
                <th>ID</th>
                <th>Nom de l'objet</th>
                <th>Catégorie</th>
                <th>Propriétaire</th>
            </tr>
        </thead>
        <tbody>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id_objet'] ?></td>
                <td><?= $row['nom_objet'] ?></td>
                <td><?= $row['nom_categorie'] ?></td>
                <td><?= $row['proprietaire'] ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
