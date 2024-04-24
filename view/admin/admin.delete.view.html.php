<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression d'un lieu</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Suppression d'un lieu</h1>
    <nav>
        <ul>
            <li><a href="./">Accueil de l'administration</li>
            <li><a href="?create">Ajouter un lieu</a></li>
            <li><a href="?disconnect">Déconnexion</a></li>
        </ul>
    </nav>
    <div id="content">
        <h3>Article à supprimer</h3>
    
        <?php
        if(isset($error)):
            ?>
            <h3 id="alert"><?=$error?></h3>
        <?php
        endif;
        // datas est une chaîne de caractère : erreur SQL !
        if(is_string($getOneGeoloc)):
        ?>
            <h3 id="alert"><?=$getOneGeoloc?></h3>
        <?php
        // Pas de `geoloc` trouvée
        elseif($getOneGeoloc===false):
        ?>
            <h3 id="comment">Ce le lieu n'existe plus !</h3>
        <?php
        // Nous avons un lieu
        else:
        ?>
        <h4>Titre : <?=$getOneGeoloc['title']?></h4>
        <p><?=$getOneGeoloc['geolocdesc']?></p>
        <h4>Voulez-vous vraiment supprimer cet article</h4>
        <a href="?delete=<?=$idDelete?>&ok"><button value="supprimer">supprimer</button></a> | <a href="./"><button value="Non">Ne pas supprimer</button></a>
                
        <?php endif ?>   
    </div>
</body>
</html>