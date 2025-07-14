<?php 
    require("../inc/fonction.php");

    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    if(emailExist($email)){
        $user = getSpecificMember($email, $mot_de_passe);

        header("Location:listeObjet.php");
    }
    else{
        header("Location:login.php?error=1");
    }
?>