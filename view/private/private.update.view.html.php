<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update d'un article</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    require_once "../view/inc/navbar.admin.php";
    ?>
    <div id="content">
        <?php
        if(isset($errorUpdate)):
        ?>
    <h3 id="alert"><?=$errorUpdate?></h3>
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
            <h3 id="comment">Vous n'avez pas modifié le lieu !</h3>
        <?php
        // Nous avons un lieu
        else:
        ?>





<form method="POST" >
        <div class="container">
        <div class="row mb-4">
            <div class="col">
            <div data-mdb-input-init class="form-outline">
                <label class="form-label" for="form3Example1">Title</label>
                <input type="text" id="form3Example1" class="form-control" name="nom" value="<?=$getOneGeoloc['nom']?>"/>
            </div>
            </div>
            <div class="col">
            <div data-mdb-input-init class="form-outline">
                <label class="form-label" for="form3Example2">Description</label>
                <input type="text" name="adresse" id="form3Example2" class="form-control" value="<?=$getOneGeoloc['adresse']?>" />
            </div>
            </div>
        </div>
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Latitude</label>
            <input type="number" step="0.000000001"  name="latitude" id="form3Example3" class="form-control" value="<?=$getOneGeoloc['latitude']?>"/>
        </div>
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form3Example4">Longitude</label>
            <input type="number" step="0.000000001"  name="longitude" id="form3Example4" class="form-control" value="<?=$getOneGeoloc['longitude']?>" />
        </div>
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Update</button>
    </div>
    </form>

    
        <?php endif ?>   
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>