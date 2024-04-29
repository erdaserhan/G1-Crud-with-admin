<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression d'un lieu</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    require_once "../view/inc/navbar.admin.php";
    ?>
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
    <div class="container my-5 d-flex justify-content-center">
        <div class="card col-5 ">
        <div class="card-body">
            <h5 class="card-title"><?=$getOneGeoloc['nom']?></h5>
        </div>
        <ul class="list-group list-group-light list-group-small">
            <li class="list-group-item px-4"><?=$getOneGeoloc['adresse']?></li>
            <li class="list-group-item px-4"><?=$getOneGeoloc['latitude']?></li>
            <li class="list-group-item px-4"><?=$getOneGeoloc['longitude']?></li>
        </ul>
        <div class="card-body">
            <a href="?delete=<?=$idDelete?>&ok"><button value="supprimer" class="btn btn-success">supprimer</button></a>
            <a href="./"><button value="Non" class="btn btn-danger">Ne pas supprimer</button></a>
        </div>
        </div>
    </div>
    
    
        <?php endif ?>   
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>