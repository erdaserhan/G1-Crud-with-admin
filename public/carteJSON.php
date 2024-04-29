<?php
// chargement de configuration
require_once "../config.php";
require_once "../model/utilisateursModel.php";
require_once "../model/localisationsModel.php";

// connexion à la DB
try {
    // création d'une instance de PDO - Connexion à la base de données
    $db = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET . ";port=" . DB_PORT, DB_LOGIN, DB_PASSWORD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]);
} catch (Exception $e) {
    die($e->getMessage());
}

// afficher le résultat de la requête sous format JSON
echo json_encode(getLocations($db));

// fermeture de la connexion
$db = null;
