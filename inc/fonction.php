<?php
require("connexion.php");

function getAllObjets()
{
    $sql = "SELECT 
    preteur_objet.id_objet AS id_objet, 
    preteur_objet.nom_objet AS nom_objet, 
    preteur_categorie_objet.nom_categorie AS nom_categorie, 
    preteur_membre.nom AS nom_proprietaire, 
    CASE
        WHEN preteur_emprunt.date_retour > NOW() THEN preteur_emprunt.date_retour
        ELSE 'non emprunte'
    END AS date_retour
FROM preteur_objet
JOIN preteur_categorie_objet ON preteur_objet.id_categorie = preteur_categorie_objet.id_categorie
JOIN preteur_membre ON preteur_objet.id_membre = preteur_membre.id_membre
LEFT JOIN preteur_emprunt ON preteur_emprunt.id_objet = preteur_objet.id_objet";
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

function getSpecificCategory($id_categorie)
{
    $id_categorie = intval($id_categorie);
    $sql = "SELECT 
        preteur_objet.id_objet AS id_objet, 
        preteur_objet.nom_objet AS nom_objet, 
        preteur_categorie_objet.nom_categorie AS nom_categorie, 
        preteur_membre.nom AS nom_proprietaire, 
        CASE
            WHEN preteur_emprunt.date_retour > NOW() THEN preteur_emprunt.date_retour
            ELSE 'non emprunte'
        END AS date_retour
    FROM preteur_objet
    JOIN preteur_categorie_objet ON preteur_objet.id_categorie = preteur_categorie_objet.id_categorie
    JOIN preteur_membre ON preteur_objet.id_membre = preteur_membre.id_membre
    LEFT JOIN preteur_emprunt ON preteur_emprunt.id_objet = preteur_objet.id_objet
    WHERE preteur_objet.id_categorie = $id_categorie";

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

function getAllCategorie()
{
    $sql = "SELECT * FROM preteur_categorie_objet";
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
