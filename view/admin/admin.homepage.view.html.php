<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil de l'administration</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.4/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    

</head>
<body>
    <?php
    require_once "../view/inc/navbar.admin.php";
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

        <section class="container my-5">
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table id="table"
                            class="table mt-3"
                            data-toggle="table"
                            data-toolbar="#toolbar"
                            data-show-export="true"
                            data-click-to-select="true"
                            data-pagination="true"
                            data-page-list="[2,4,6,8]"
                            data-show-columns="true"
                            data-search="true">
                        <thead>
                            <tr class="text-center">
                                <th data-checkbox="true"></th>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        
                        <tbody class="text-center">
                        <?php
                        // tant qu'on a des données
                        // var_dump($datas);
                        foreach($datas as $data):
                        ?>
                            <tr>
                                <td></td>
                                <td><?=$data['idgeoloc']?></td>
                                <td><?=$data['title']?></td>
                                <td><?=$data['geolocdesc']?></td>
                                <td><?=$data['latitude']?></td>
                                <td><?=$data['longitude']?></td>
                                <td><a href="?update=<?=$data['idgeoloc']?>"><i class="edit bi bi-pen me-4"></i></a></td>
                                <td><a href="?delete=<?=$data['idgeoloc']?>"><i class="remove bi bi-trash text-danger"></i></a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        
                        </table>
                <?php endif ?> 
                </div>
            </div>
        </div>
        </section>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/tableexport.jquery.plugin@1.28.0/tableExport.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.4/dist/bootstrap-table.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.4/dist/bootstrap-table-locale-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.4/dist/extensions/export/bootstrap-table-export.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/locale/bootstrap-table-fr-FR.min.js"></script>
</body>
</html>