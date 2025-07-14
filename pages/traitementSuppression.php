<?php 
    require("../inc/fonction.php");

    $id_objet = $_GET['id_objet'];

    supprimerImage($id_objet);

    header("Location:modele.php?p=ficheObjet.php&id_objet=$id_objet");
?>