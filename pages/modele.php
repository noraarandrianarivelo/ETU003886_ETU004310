<?php
session_start();

require("../inc/fonction.php");


$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../assets/images/logo.png" type="image/png">

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container-fluid">
            <a class="navbar-brand p-0 d-inline-block" href="modele.php?p=listeObjet.php">
                <img src="../assets/images/logo.png" alt="Logo" class="img-fluid" style="height: 40px; width: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="modele.php?p=listeObjet.php">Home</a>
                    </li>
                
                </ul>

                <div class="d-flex align-items-center">
                    <span class="me-3">
                        <i class="bi bi-person-fill me-1"></i>Hello, <?= $user['nom']; ?>
                    </span>
                    <a href="deconnexion.php" class="btn btn-danger btn-sm">Deconnexion</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <?php include($_GET['p']); ?>
    </main>


</body>

</html>