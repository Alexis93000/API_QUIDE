<?php

require_once __DIR__ . '/config.php';

class API
{
    function suppressionLieu($idLieuInsolite)
    {
        $db = new Connect;

        // REQUETE CATEGORIE
        $data = $db->prepare('DELETE FROM lieuInsolite WHERE id_lieu = "' . $idLieuInsolite . '"');
        $data->execute();

    }

    function modifLieu()
    {
        $db = new Connect;

        // REQUETE CATEGORIE
        $data = $db->prepare('UPDATE lieuinsolite 
                                        SET 
                                        WHERE id_lieu = :id_lieu');
        $data->execute();

    }

    function addLieu()
    {
        $db = new Connect;

        // REQUETE CATEGORIE
        $data = $db->prepare('INSERT INTO lieuinsolite(nom_lieu,adresse_lieu,codePostal_lieu,ville_lieu,tel_lieu,description_lieu,sousCat_lieu,verification_lieu)
                                        VALUES(:nomLieu,:adresseLieu,:codePostalLieu,:villeLieu,:telLieu,:descriptionLieu,:sousCatLieu,"0")');
        $data->execute();

    }

    function getLieuUser()
    {
        $db = new Connect;
        $lieuUser = array();
        // REQUETE CATEGORIE
        $data = $db->prepare('SELECT * FROM lieuinsolite WHERE iduti_lieu = "' . $_SESSION['id'] . '"');
        $data->execute();
        while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)) {
            $lieuUser[$OutputData['id_lieu']] = array(
                'idlieuinsolite' => $OutputData['id_lieu'],
                'nom' => $OutputData['nom_lieu'],
                'description' => $OutputData['description_lieu'],
                'adresse' => $OutputData['adresse_lieu'],
                'codePostal' => $OutputData['codePostal_lieu'],
                'ville' => $OutputData['ville_lieu'],
            );
        }

        return json_encode($lieuUser);

    }
}

$API = new API;
header('Content-Type: application/json');

?>
