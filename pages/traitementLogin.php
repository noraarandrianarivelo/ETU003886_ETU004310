<?php 
session_start();
    require("../inc/fonction.php");

    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    if(emailExist($email)){
        $user = getSpecificMember($email, $mot_de_passe);

$_SESSION['user'] = $user;

        header("Location:modele.php?p=listeObjet.php");
    }
    else{
        header("Location:login.php?error=1");
    }
?>