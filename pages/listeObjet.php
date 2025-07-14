<?php
require("../inc/fonction.php");

if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
    $id_categorie = $_GET['categorie'];
    $results = getSpecificCategory($id_categorie);
} else {
    $results = getAllObjets();
}

$categories = getAllCategorie();
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
        <form action="traitementFiltre.php" method="post">
            <select name="categorie" id="">
                <option value="">Tous</option>
                <?php foreach ($categories as $categorie) { ?>
                    <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Filtrer">
        </form>

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

                <?php foreach ($results as $result) { ?>
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