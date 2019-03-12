<?php

require_once __DIR__ . '/config.php';

class API
{
    function suppressionLieu($idEvenement)
    {
        $db = new Connect;

        // REQUETE CATEGORIE
        $data = $db->prepare('DELETE FROM evenement WHERE id_eve = "' . $idEvenement . '"');
        $data->execute();

    }

    function modifLieu()
    {
        $db = new Connect;

        // REQUETE CATEGORIE
        $data = $db->prepare('UPDATE evenement 
                                        SET 
                                        WHERE id_eve = :id_eve');
        $data->execute();

    }

    function addLieu()
    {
        $db = new Connect;

        // REQUETE CATEGORIE
        $data = $db->prepare('INSERT INTO evenement(nom_eve,description_eve,adresse_eve,codePostal_eve,ville_eve,iduti_eve)
                                        VALUES(:nom_eve,description_eve,adresse_eve,codePostal_eve,ville_eve,iduti_eve)');
        $data->execute();

    }

    function getLieuUser()
    {
        $db = new Connect;
        $lieuUser = array();
        // REQUETE CATEGORIE
        $data = $db->prepare('SELECT * FROM evenement WHERE iduti_eve = "' . $_SESSION['id'] . '"');
        $data->execute();
        while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)) {
            $lieuUser[$OutputData['id_eve']] = array(
                'idEvenement' => $OutputData['id_eve'],
                'nom' => $OutputData['nom_eve'],
                'description' => $OutputData['description_eve'],
                'adresse' => $OutputData['adresse_eve'],
                'codePostal' => $OutputData['codePostal_eve'],
                'ville' => $OutputData['ville_eve'],
            );
        }

        return json_encode($lieuUser);

    }
}

$API = new API;
header('Content-Type: application/json');

?>
