<?php
$info = getAllInfoMembre($user['id_membre']);
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
                    <img src="../assets/uploadPdp/<?= ($info['image_profil']) ?>" alt="Photo de profil" class="rounded-circle mb-3 profile-img" width="100" height="100">
                <?php } else { ?>
                    <img src="../assets/images/personne.jpg" alt="Photo de profil" class="rounded-circle mb-3 profile-img" width="100" height="100">
                <?php } ?>

                <h3 class="card-title mb-3"><?= ($info['nom']) ?></h3>
                <ul class="list-group list-group-flush text-start mb-3">
                    <li class="list-group-item"><strong>Date de naissance :</strong> <?= ($info['date_naissance']) ?></li>
                    <li class="list-group-item"><strong>Genre :</strong> <?= ($info['genre']) ?></li>
                    <li class="list-group-item"><strong>Email :</strong> <?= ($info['email']) ?></li>
                    <li class="list-group-item"><strong>Ville :</strong> <?= ($info['ville']) ?></li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>