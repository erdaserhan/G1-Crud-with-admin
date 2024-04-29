<?php

// création de la fonction qui récupère tous les champs de `geoloc`
function getAllGeoloc(PDO $connection) : array|string
{
    $sql = "SELECT * FROM `localisations` ;";
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



// on charge tous les champs d'un élément de localisations grâce à son id
// nous renvoie false en cas d'échec ou le message d'erreur sql
// ou un tableau associatif en cas de succès

function getOneGeolocByID(PDO $db, int $getIt) : string|bool|array

{
    $sql = "SELECT * FROM localisations WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam("id", $getIt, PDO::PARAM_INT);
    try{
        $stmt->execute();
        if($stmt->rowCount()===0) return false;
        $geoloc = $stmt->fetch();
        $stmt->closeCursor();
        return $geoloc;
    }catch(Exception $e){
        return $e->getMessage();
    }
}

// on update tous les champs d'un élément de localisations grâce à son id
// En lui passant TOUTES les variables en paramètre
// nous renvoie false en cas d'échec ou le message d'erreur sql
// ou un true en cas de succès

function updateOneGeolocByID(PDO $db, int $id, string $nom, string $adresse, int $codepostal, string $ville, float $latitude, float $longitude) : string|bool

{
    $sql = "UPDATE `localisations` SET `nom`= ?, `adresse`= ?, `codepostal`= ?, `ville`= ?, `latitude`= ?, `longitude`= ? WHERE `id` = ?";
    $stmt = $db->prepare($sql);
    try{
        $stmt->execute([
            $nom, 
            $adresse,
            $codepostal,
            $ville,
            $latitude,
            $longitude,
            $id
        ]);
    
        // pas de modification par la requête
        if($stmt->rowCount()===0) return false;

        return true;

    }catch(Exception $e){
        return $e->getMessage();
    }
}

// pour insérer un nouveau lieu 
function insertOneGeolocByID(PDO $db, string $nom, string $adresse, int $codepostal, string $ville, int $nb_velos, float $latitude, float $longitude):
bool|string
{
    $sql = "INSERT INTO `localisations` (`nom`,`adresse`,`codepostal`,`ville`, `nb_velos`,`latitude`, `longitude`) VALUES (?,?,?,?,?,?,?);";
    $prepare = $db->prepare($sql);
    try{
        $prepare->execute([
            $nom, 
            $adresse, 
            $codepostal, 
            $ville, 
            $nb_velos, 
            $latitude, 
            $longitude
        ]);
        return true;
    }catch(Exception $e){
        return $e->getMessage();
    }
}

// pour supprimer un lieu
function deleteOneGeolocByID(PDO $db, int $id): bool|string
{
    $sql = "DELETE FROM `localisations` WHERE `id`= :id ";
    $stmt = $db->prepare($sql);
    $stmt->bindValue("id", $id, PDO::PARAM_INT);

    try{
        $stmt->execute();
        if($stmt->rowCount()===0) return false;
        return true;
    }catch(Exception $e){
        return $e->getMessage();
    }

}