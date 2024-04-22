<?php

// création de la fonction qui récupère tous les champs de `geoloc`
function getAllGeoloc(PDO $connection) : array|string
{
    $sql = "SELECT * FROM `geoloc` ;";
    try{
        $query = $connection->query($sql);
        // si il n'y a pas de résultats, fetchAll est un tableau vide
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    }catch(Exception $e){
        return $e->getMessage();
    }
}

// on charge tous les champs d'un élément de geoloc grâce à son idgeoloc
// nous renvoie false en cas d'échec ou le message d'erreur sql
// ou un tableau associatif en cas de succès

function getOneGeolocByID(PDO $con, int $id)
{
    
    $sql="SELECT * FROM `geoloc` WHERE idgeoloc = ?";   

    try{
        $prepare = $con->prepare($sql); 

        $prepare->bindParam(1, $id, PDO::PARAM_INT);

        $prepare->execute();

        $result = $prepare->fetch();

        var_dump($result);

        return $result;
      

    }catch(Exception $e){
        return $e->getMessage();
    }

}
