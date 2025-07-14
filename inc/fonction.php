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

    return $resultat;
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

function addNewObjet($nom_objet, $id_categorie, $id_membre)
{
    $sql = "INSERT INTO preteur_objet (nom_objet, id_categorie, id_membre) VALUES ('%s', $id_categorie, $id_membre)";
    $sql = sprintf($sql, $nom_objet);
    $requete =  mysqli_query(connexion(), $sql);
}

function addImages($id_objet, $nom_image)
{
    $sql = "INSERT INTO preteur_image_object (id_objet, nom_image) VALUES ($id_objet, '%s')";
    $sql = sprintf($sql, $nom_image);
    $requete =  mysqli_query(connexion(), $sql);
}

function getIdObjet($nom_objet, $id_categorie, $id_membre)
{
    $sql = "SELECT * FROM preteur_objet WHERE nom_objet = '%s' and id_categorie = $id_categorie and id_membre = $id_membre";
    $sql = sprintf($sql, $nom_objet);

    $requete = mysqli_query(connexion(), $sql);
    $resultat = mysqli_fetch_assoc($requete);

    return $resultat;
}

function supprimerImage($id_objet)
{
    $sql = "DELETE FROM preteur_image_object where id_objet = $id_objet";
    $requete = mysqli_query(connexion(), $sql);
}

function getAllImages($id_objet)
{
    $sql = "SELECT * FROM preteur_image_object where id_objet = $id_objet";
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

function getObjetById($id_objet)
{
    $sql = "SELECT preteur_objet.id_objet as id_objet, preteur_objet.nom_objet as nom_objet, preteur_categorie_objet.nom_categorie as nom_categorie, preteur_membre.nom as nom 
            FROM preteur_objet 
            JOIN preteur_membre ON preteur_membre.id_membre = preteur_objet.id_membre 
            JOIN preteur_categorie_objet ON preteur_categorie_objet.id_categorie = preteur_objet.id_categorie 
            WHERE preteur_objet.id_objet = $id_objet";

    $requete = mysqli_query(connexion(), $sql);
    $resultat = mysqli_fetch_assoc($requete);

    return $resultat;
}

function getHistoriqueEmprunts($id_objet)
{
    $sql = "SELECT preteur_membre.nom as nom, preteur_emprunt.date_emprunt as date_emprunt, preteur_emprunt.date_retour as date_retour FROM preteur_emprunt JOIN preteur_membre ON preteur_membre.id_membre = preteur_emprunt.id_membre WHERE preteur_emprunt.id_objet = $id_objet";
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

function getAllInfoMembre($id_membre)
{
    $sql = "SELECT * FROM preteur_membre where id_membre = $id_membre";

    $requete = mysqli_query(connexion(), $sql);
    $resultat = mysqli_fetch_assoc($requete);

    return $resultat;
}

function ModifyPhotoDeProfil($id_user, $url_pdp)
{

    $sql = "UPDATE preteur_membre SET image_profil = '%s' WHERE id_membre = $id_user";
    $sql = sprintf($sql, $url_pdp);

    $requete = mysqli_query(connexion(), $sql);
}

function getObjetsFiltres($categorie, $nom_objet, $disponible)
{
    $sql = "SELECT 
        preteur_objet.id_objet AS id_objet, 
        preteur_objet.nom_objet AS nom_objet, 
        preteur_categorie_objet.nom_categorie AS nom_categorie, 
        preteur_membre.nom AS nom_proprietaire, 
        CASE
            WHEN preteur_emprunt.date_retour > NOW() THEN DATEDIFF(preteur_emprunt.date_retour, NOW())
            ELSE 'non emprunte'
        END AS date_retour
    FROM preteur_objet
    JOIN preteur_categorie_objet ON preteur_objet.id_categorie = preteur_categorie_objet.id_categorie
    JOIN preteur_membre ON preteur_objet.id_membre = preteur_membre.id_membre
    LEFT JOIN preteur_emprunt ON preteur_emprunt.id_objet = preteur_objet.id_objet
    WHERE 1";

    if (!empty($categorie)) {
        $sql .= " AND preteur_objet.id_categorie = '" . intval($categorie) . "'";
    }
    if (!empty($nom_objet)) {
        $sql .= " AND preteur_objet.nom_objet LIKE '%" . mysqli_real_escape_string(connexion(), $nom_objet) . "%'";
    }
    if ($disponible) {
        $sql .= " AND (preteur_emprunt.date_retour IS NULL OR preteur_emprunt.date_retour <= NOW())";
    }

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

function emprunter($id_objet, $nbr_jour, $id_user)
{
    $id_objet = intval($id_objet);
    $nbr_jour = intval($nbr_jour);
    $id_user = intval($id_user);

    $sql = "INSERT INTO preteur_emprunt (id_objet, id_membre, date_emprunt, date_retour) 
            VALUES ($id_objet, $id_user, NOW(), DATE_ADD(NOW(), INTERVAL $nbr_jour DAY))";
    $requete = mysqli_query(connexion(), $sql);

    return $requete;
}






