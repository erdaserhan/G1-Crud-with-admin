<?php

// si on veut se déconnecter
if(isset($_GET['disconnect'])){
    // on se déconnecte
    disconnectAdministrator();
    header("Location: ./");
    exit();
}

// si on a cliqué sur update et que vous n'acceptez que les chiffres 123456789 dans le string $_GET['update']
if(isset($_GET['update'])&&ctype_digit($_GET['update'])){
    // conversion en int
    $idUpdate = (int) $_GET['update'];
    // chargement de l'article pour l'update
    $getOneGeoloc = getOneGeolocByID($db, $idUpdate);
    var_dump($getOneGeoloc);

    // chargement de la vue
    include "../view/admin/admin.update.view.html.php";
    exit();
}


// si on est sur l'accueil chargement de tous les `geoloc`
$datas = getAllGeoloc($db); // on obtient un string (Erreur SQL), un tableau vide (Pas de datas), un tableau non vide (On a des datas)
// appel de la vue de l'accueil de l'admin
include "../view/admin/admin.homepage.view.html.php";