<?php
ini_set("display_errors", "1");
session_start();
require("../inc/fonction.php");

// $uploadDir = __DIR__ . '/uploads/';
$uploadDir = "../assets/uploadPdp/";
$maxSize = 2 * 1024 * 1024; // 2 Mo
$allowedMimeTypes = ['image/jpeg', 'image/png'];

    // Vérifie si un fichier est soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fichier'])) {
            $file = $_FILES['fichier'];
        if ($file['error'] !== UPLOAD_ERR_OK) {
            header("Location: modele.php?p=ficheMembre.php?errorModif=1"); //erreur d'upload
        }
        // Vérifie la taille
        if ($file['size'] > $maxSize) {
            header("Location: modele.php?p=ficheMembre.php&errorModif=2"); //fichier trop lourd
        }

        // Vérifie le type MIME avec `finfo`
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mime, $allowedMimeTypes)) {
            header("Location: modele.php?p=ficheMembre.php&errorModif=3"); //type de fichier non autorisé
        }

        // renommer le fichier
        $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = $originalName . '_' . uniqid() . '.' . $extension;

        // Déplace le fichier
        if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
            ModifyPhotoDeProfil($_SESSION['user']['id_membre'], $newName);
            header("Location: modele.php?p=ficheMembre.php&successModif=1"); //modification réussie
        } else {
            header("Location: modele.php?p=ficheMembre.php&errorModif=1"); //erreur de deplacement
        }

    } else {
        header("Location: modele.php?p=ficheMembre.php&errorModif=1"); //erreur d'upload
    }
?>


