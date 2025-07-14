<?php
require("connexion.php");

function getAllObjets()
{
    $sql = "SELECT o.id_objet, o.nom_objet, c.nom_categorie, m.nom AS proprietaire
            FROM preteur_objet o
            JOIN preteur_categorie_objet c ON o.id_categorie = c.id_categorie
            JOIN preteur_membre m ON o.id_membre = m.id_membre
            JOIN ";
    $requete = mysqli_query(connexion(), $sql);

    if ($requete) {
        $resultat = [];
        while ($row = mysqli_fetch_assoc($requete)) {
            $resultat[] = $row;
        }
    } else {
        $resultat = [];
    }

    return $resultat;
}


function addNewMember($nom, $email, $date_naissance, $ville, $genre, $mot_de_passe)
{
    $sql = "INSERT INTO preteur_membre (nom, date_naissance, genre, email, ville, mot_de_passe) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')";
    $sql = sprintf($sql, $nom, $date_naissance, $genre, $email, $ville, $mot_de_passe);

    $requete = mysqli_query(connexion(), $sql);
}

function getAllMember()
{
    $sql = "SELECT * FROM preteur_membre";

    $requete = mysqli_query(connexion(), $sql);

    if ($requete) {
        $resultat = [];
        while ($row = mysqli_fetch_assoc($requete)) {
            $resultat[] = $row;
        }
    } else {
        $resultat = [];
    }

    return $resultat;
}

function emailExist($email)
{
    $sql = "SELECT * FROM preteur_membre WHERE email = '%s'";
    $sql = sprintf($sql, $email);

    $requete = mysqli_query(connexion(), $sql);
    $resultat = mysqli_fetch_assoc($requete);

    if ($resultat) {
        return true;
    } else {
        return false;
    }
}

function getSpecificMember($email, $mot_de_passe)
{
    $sql = "SELECT * FROM preteur_membre WHERE email = '%s' and mot_de_passe = '%s'";
    $sql = sprintf($sql, $email, $mot_de_passe);

    $requete = mysqli_query(connexion(), $sql);
    $resultat = mysqli_fetch_assoc($requete);

    if ($resultat) {
        return true;
    } else {
        return false;
    }
}
