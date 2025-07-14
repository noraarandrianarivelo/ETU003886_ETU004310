<?php

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
    <link rel="stylesheet" href="../assets/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../assets/images/logo.png" type="image/png">
    <style>
        .card-hover {
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
        }

        .card-hover:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body>

    <form action="traitementAjoutObjet.php" method="post" enctype="multipart/form-data" class="p-4 border rounded-3 bg-light">
        <div class="mb-3">
            <label for="nom_objet" class="form-label fw-bold">Nom de l'objet</label>
            <input type="text" class="form-control" name="nom_objet" id="nom_objet" placeholder="Entrez le nom de l'objet" required>
        </div>

        <div class="mb-3">
            <label for="categorie" class="form-label fw-bold">Catégorie</label>
            <select class="form-select" name="categorie" id="categorie" required>
                <option value="" selected disabled>Choisissez une catégorie</option>
                <?php foreach ($categories as $categorie) { ?>
                    <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-4">
            <label for="images" class="form-label fw-bold">Images de l'objet</label>
            <input class="form-control" type="file" name="images[]" id="images" multiple accept="image/*" required>
            <div class="form-text">Vous pouvez sélectionner plusieurs images</div>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary py-2">
                <i class="bi bi-upload me-2"></i> Uploader l'objet
            </button>
        </div>
    </form>

    <div class="container mt-5">
        <h1 class="mb-4">Liste des objets</h1>
        <form action="traitementFiltre.php" method="post" class="mb-4">
            <div class="input-group w-50 mx-auto">
                <select name="categorie" class="form-select">
                    <option value="">Tous</option>
                    <?php foreach ($categories as $categorie) { ?>
                        <option value="<?= $categorie['id_categorie'] ?>"><?= $categorie['nom_categorie'] ?></option>
                    <?php } ?>
                </select>
                <button class="btn btn-primary" type="submit">Filtrer</button>
            </div>
        </form>

        <div class="row justify-content-center g-4 m-5 p-4">
            <?php foreach ($results as $result) { ?>
                <div class="col-md-4 col-sm-6">
                    <a href="modele.php?p=ficheObjet.php&id_objet=<?= $result['id_objet'] ?>" class="text-decoration-none text-dark">
                        <div class="card card-hover shadow h-100">
                            <?php if (!empty($result['image_objet'])) { ?>
                                <img src="<?= $result['image_objet'] ?>" class="card-img-top" alt="Image de l'objet" style="height:180px; object-fit:cover;">
                            <?php } else { ?>
                                <img src="../assets/images/default.png" class="card-img-top" alt="Image par défaut" style="height:180px; object-fit:cover;">
                            <?php } ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $result['nom_objet'] ?></h5>
                                <p class="card-text">
                                    <span class="badge bg-secondary"><?= $result['nom_categorie'] ?></span>
                                </p>
                                <p class="card-text"><i class="bi bi-person-fill"></i> Propriétaire : <?= $result['nom_proprietaire'] ?></p>
                                <p class="card-text"><i class="bi bi-calendar-event"></i> Date retour : <?= $result['date_retour'] ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>

    </div>
</body>

</html>