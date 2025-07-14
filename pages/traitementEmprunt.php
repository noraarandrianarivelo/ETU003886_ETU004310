<?php 
    session_start();

    require("../inc/fonction.php");

    $id_objet = $_POST['id_objet'];

    $nbr_jour = $_POST['nbr_jour'];

    emprunter($id_objet, $nbr_jour, $_SESSION['user']['id_membre']);

    header("Location: modele.php?p=listeObjet.php");
?>