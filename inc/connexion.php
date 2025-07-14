<?php
ini_set("display_errors", "1");

function connexion()
{
    static $connexion = null;

    if ($connexion === null) {
        $connexion = mysqli_connect('localhost', 'root', '', 'preteur');

        if (!$connexion) {
            die('Erreur de connexion a la base de donnees: ' . mysqli_connect_error());
        }

        // Optionnel : définir l'encodage des caractères pour gérer les accents (UTF-8 recommandé)
        mysqli_set_charset($connexion, 'utf8mb4');
    }

    return $connexion;
}
