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

     <style>
        table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    margin-left: 20vw;
}
th, td {
    padding: 20px;
}
     </style>

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

            <table>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Latitude</th>
                    <th>longitude</th>
                </tr>
                    <?php
                // tant qu'on a des données
                foreach($datas as $data):
                ?>
                <tr>
                    <td><?=$data['nom']?></td>
                    <td><?=$data['adresse']?></td>
                    <td><?=$data['latitude']?></td>
                    <td><?=$data['longitude']?></td>
                </tr>
                <?php endforeach ?>
              
                <?php endif ?> 
            </table>

    <!-- Zone d'affichage de la carte -->

    <div id="resultat">
        <div id="map"></div>
        <div id="liste"></div>
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