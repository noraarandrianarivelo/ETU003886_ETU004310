<?php
$info = getAllInfoMembre($user['id_membre']);
 // À créer si besoin
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Membre</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-card {
            max-width: 420px;
            margin: 0 auto;
            margin-top: 40px;
            border-radius: 20px;
            overflow: hidden;
        }
        .profile-img {
            border: 4px solid #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .btnModifier {
            background: #0d6efd;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 8px 24px;
            margin-bottom: 20px;
            transition: background 0.2s;
        }
        .btnModifier:hover {
            background: #0b5ed7;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="profile-card card shadow mt-5">
            <div class="card-body text-center">
                <form action="traitementUploadPdp.php" method="post" enctype="multipart/form-data" class="mb-3">
                    <input type="file" name="fichier" id="fichier" class="form-control mb-2" style="max-width: 250px; margin: 0 auto;">
                    <input type="submit" value="Modifier la photo" class="btnModifier">
                </form>
                <?php if (!empty($info['image_profil'])) { ?>
                    <img src="../assets/uploadPdp/<?= htmlspecialchars($info['image_profil']) ?>" alt="Photo de profil" class="rounded-circle mb-3 profile-img" width="100" height="100">
                <?php } else { ?>
                    <img src="../assets/images/personne.jpg" alt="Photo de profil" class="rounded-circle mb-3 profile-img" width="100" height="100">
                <?php } ?>

                <h3 class="card-title mb-3"><?= htmlspecialchars($info['nom']) ?></h3>
                <ul class="list-group list-group-flush text-start mb-3">
                    <li class="list-group-item"><strong>Date de naissance :</strong> <?= htmlspecialchars($info['date_naissance']) ?></li>
                    <li class="list-group-item"><strong>Genre :</strong> <?= htmlspecialchars($info['genre']) ?></li>
                    <li class="list-group-item"><strong>Email :</strong> <?= htmlspecialchars($info['email']) ?></li>
                    <li class="list-group-item"><strong>Ville :</strong> <?= htmlspecialchars($info['ville']) ?></li>
                </ul>
            </div>
        </div>

        
        <div class="card shadow mt-4 mb-5" style="max-width: 700px; margin: 0 auto;">
            <div class="card-body">
                <h5 class="card-title mb-3">Mes emprunts</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Objet</th>
                            <th>Date emprunt</th>
                            <th>Date retour</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
<?php foreach ($emprunts as $emprunt) { ?>
<tr>
    <td><?= htmlspecialchars($emprunt['nom_objet']) ?></td>
    <td><?= htmlspecialchars($emprunt['date_emprunt']) ?></td>
    <td>
        <?php if ($emprunt['date_retour_effective']) { ?>
            <?= htmlspecialchars($emprunt['date_retour_effective']) ?>
        <?php } else { ?>
            <span class="text-warning">Non rendu</span>
        <?php } ?>
    </td>
    <td>
        <?php if (empty($emprunt['date_retour_effective'])) { ?>
            <?php if (isset($_GET['showRetour']) && $_GET['showRetour'] == $emprunt['id_emprunt']) { ?>
                <form action="traitementRetour.php" method="post" class="mt-2">
                    <input type="hidden" name="id_emprunt" value="<?= $emprunt['id_emprunt'] ?>">
                    <label for="etat_<?= $emprunt['id_emprunt'] ?>" class="form-label">État de l'objet :</label>
                    <select name="etat" id="etat_<?= $emprunt['id_emprunt'] ?>" class="form-select form-select-sm mb-2" required>
                        <option value="">Choisir...</option>
                        <option value="ok">OK</option>
                        <option value="abime">Abîmé</option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm">Valider</button>
                    <a href="ficheMembre.php" class="btn btn-secondary btn-sm">Annuler</a>
                </form>
            <?php } else { ?>
                <a href="ficheMembre.php?showRetour=<?= $emprunt['id_emprunt'] ?>" class="btn btn-danger btn-sm">Rendre</a>
            <?php } ?>
        <?php } else { ?>
            <span class="text-success">Rendu</span>
        <?php } ?>
            <?php } ?>
    </td>
</tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>