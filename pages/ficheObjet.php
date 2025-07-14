<?php
$id_objet = $_GET['id_objet'];
$objet = getObjetById($id_objet); // fonction à créer si besoin
$images = getAllImages($id_objet); // retourne toutes les images de l'objet
$historique = getHistoriqueEmprunts($id_objet); // retourne l'historique des emprunts
?>
<div class="container mt-5">
    <h2><?= $objet['nom_objet'] ?></h2>
    <div class="row">
        <div class="col-md-6">
            <img src="<?= $images[0]['nom_image'] ?>" class="img-fluid mb-3" alt="Image principale">
            <div class="d-flex flex-wrap">
                <?php for ($i=1; $i < sizeof($images) - 1; $i++) { 
                    $image = $images[$i];?>

                    <img src="../assets/uploadImagesObjet/<?= $image['nom_image'] ?>" class="img-thumbnail m-1" style="height:80px; width:auto;" alt="Autre image">
                <?php } ?>
            </div>
        </div>
        <div class="col-md-6">
            <p><strong>Catégorie :</strong> <?= $objet['nom_categorie'] ?></p>
            <p><strong>Propriétaire :</strong> <?= $objet['nom'] ?></p>
        </div>
    </div>
    <h4 class="mt-4">Historique des emprunts</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Emprunteur</th>
                <th>Date emprunt</th>
                <th>Date retour</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historique as $histo) { ?>
                <tr>
                    <td><?= $histo['nom'] ?></td>
                    <td><?= $histo['date_emprunt'] ?></td>
                    <td><?= $histo['date_retour'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="traitementSuppression.php?id_objet=<?php echo $id_objet?>" class="btn btn-danger">Supprimer les Images</a>
</div>