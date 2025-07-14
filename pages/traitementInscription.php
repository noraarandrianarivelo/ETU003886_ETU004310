<?php
require("../inc/fonction.php");

$nom = $_POST['nom'];
$genre = $_POST['genre'];
$ville = $_POST['ville'];
$mot_de_passe = $_POST['mot_de_passe'];
$email = $_POST['email'];
$date_naissance = $_POST['date_naissance'];

if (emailExist($email)) {
    header('Location: inscription.php?error=1'); //raha efa miexiste le email
} else {
    addNewMember($nom, $email, $date_naissance, $ville, $genre, $mot_de_passe);

    header('Location: login.php');
}
