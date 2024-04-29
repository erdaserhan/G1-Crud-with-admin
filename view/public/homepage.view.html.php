<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>


</head>
<body>
    <?php
    require_once "../view/inc/navbar.public.php";
    ?>
    <div id="content">
        <?php
        // datas est une chaîne de caractère : erreur SQL !
        if(is_string($datas)):  
        ?>
            <h3 id="alert"><?=$datas?></h3>
        <?php
        // Pas encore de `geoloc`
        elseif(empty($datas)):
        ?>
            <h3 id="comment">Pas encore de lieu.</h3>
        <?php
        // Nous avons des lieux
        else:
            // on compte le nombre de données 
            $nb = count($datas);
        ?>
            <h3>Il y a <?=$nb?> <?=$nb>1 ? "lieux" : "lieu"?></h3>

    <div class="container my-5">
        <div class="row">
            <div class="col">
                <table class="table table-light table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th>title</th>
                        <th>geolocdesc</th>
                        <th>latitude</th>
                        <th>longitude</th>
                    </tr>
                </thead>
                <?php
                // tant qu'on a des données
                // var_dump($datas);
                foreach($datas as $data):
                ?>
                <tbody class="text-center">
                    <td><?=$data['title']?></td>
                    <td><?=$data['geolocdesc']?></td>
                    <td><?=$data['latitude']?></td>
                    <td><?=$data['longitude']?></td>
                </tbody>
                <?php endforeach ?>
                </table>
                <?php endif ?> 
            </div>
        </div>
    </div>

    <!-- Zone d'affichage de la carte -->

    <div id="resultats">
        <div id="map"></div>
        <div id="liste2">
        <div class="card">
        <div class="card-header">
            Adresses
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" id="liste">An item</li>
        </ul>
        </div>
    </div>
    </div>
    </div>
    
    <!-- JS de Leaflet -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
     
    <!-- mon JS -->
    <script src="js/carteJSON.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>