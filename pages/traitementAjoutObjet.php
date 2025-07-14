

<?php
ini_set("display_errors", "1");
session_start();
require("../inc/fonction.php");

$uploadDir = '../assets/uploadImagesObjet/'; // Dossier de destination






$nom_objet = $_POST['nom_objet'];
$id_categorie = $_POST['categorie'];

addNewObjet($nom_objet, $id_categorie, $_SESSION['user']['id_membre']);

$objet = getIdObjet($nom_objet, $id_categorie, $_SESSION['user']['id_membre']);



$files = $_FILES['images'];

$total = count($files['name']);

for ($i = 0; $i < $total; $i++) {
    $tmpName = $files['tmp_name'][$i];
    $name = basename($files['name'][$i]);
    $error = $files['error'][$i];
    $size = $files['size'][$i];

    // Vérification simple : erreur et taille max
    if ($error === UPLOAD_ERR_OK && $size <= 5 * 1024 * 1024) { // max 5Mo
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (in_array(strtolower($extension), $allowed)) {
            $username = $_SESSION['user']['nom'];
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $newName = $username . '_' . uniqid() . '.' . $extension;
            $destination = $uploadDir . $newName;

            if (move_uploaded_file($tmpName, $destination)) {
                addImages($objet['id_objet'], $newName);

                header("Location:modele.php?p=listeObjet.php");
            } else {
                header("Location:modele.php?p=listeObjet.php&error=1");
            }
        } else {
            header("Location:modele.php?p=listeObjet.php&error=2");
        }
    } else {
        header("Location:modele.php?p=listeObjet.php&error=1");
    }
}
?>

