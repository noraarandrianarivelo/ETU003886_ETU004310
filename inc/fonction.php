<?php
require("connexion.php");

function getAllObjets($conn) {
    $sql = "SELECT o.id_objet, o.nom_objet, c.nom_categorie, m.nom AS proprietaire
            FROM preteur_objet o
            JOIN preteur_categorie_objet c ON o.id_categorie = c.id_categorie
            JOIN preteur_membre m ON o.id_membre = m.id_membre";
    return mysqli_query($conn, $sql);
}
?>