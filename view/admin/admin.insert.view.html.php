<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion d'un lieu</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    require_once "../view/inc/navbar.admin.php";
    ?>

    <form method="POST" >
        <div class="container">
        <div class="row mb-4">
            <div class="col">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="form3Example1" class="form-control" name="title" placeholder="Titre" required/>
            </div>
            </div>
            <div class="col">
            <div data-mdb-input-init class="form-outline">
                <input type="text" name="geolocdesc" id="form3Example2" class="form-control" placeholder="Description"  required/>
            </div>
            </div>
        </div>
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="number" step="0.000000001"  name="latitude" id="form3Example3" class="form-control" placeholder="Latitude" required/>
        </div>
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="number" step="0.000000001"  name="longitude" id="form3Example4" class="form-control" placeholder="Longitude" required/>
        </div>
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Ajouter</button>
    </div>
    </form>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>