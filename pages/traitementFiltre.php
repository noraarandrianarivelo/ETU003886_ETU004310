<?php 
    $categorie = $_POST['categorie'];

    header("Location:modele.php?p=listeObjet.php&categorie=$categorie");
?>