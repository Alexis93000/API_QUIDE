<?php

require_once __DIR__ . '/config.php';

class API
{
    function getProfil()
    {
        $db = new Connect;
        $utilisateur = array();
        $login = addslashes('alec.mohamedbtssio@gmail.com');
        $pwd = 'azerty123';

        // REQUETE CATEGORIE
        $data = $db->prepare('SELECT * FROM utilisateur WHERE id_uti = "'.$_SESSION['id'].'"');
        $data->execute();
        while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)) {
            $utilisateur[$OutputData['id_uti']] = array(
                'idUser' => $OutputData['id_uti'],
                'typeUser' => $OutputData['type_uti'],
                'nom' => $OutputData['nom_uti'],
                'prenom' => $OutputData['prenom_uti'],
                'dateNaissance' => $OutputData['dateNaissance_uti'],
                'tel_uti' => $OutputData['tel_uti'],
                'email' => $OutputData['email_uti'],
                'adresse' => $OutputData['adresse_uti'],
                'codePostal' => $OutputData['codePostal_uti'],
                'ville' => $OutputData['ville_uti']
            );
        }

        return json_encode($utilisateur);
    }

    function modifierProfil()
    {
        $db = new Connect;
        $utilisateur = array();
        $login = addslashes('alec.mohamedbtssio@gmail.com');
        $pwd = 'azerty123';

        // REQUETE CATEGORIE
        $data = $db->prepare('UPDATE utilisateur 
                                        SET nom_uti = :nom_uti,
                                            prenom_uti = :prenom_uti,
                                            dateNaissance_uti = :dateNaissance_uti,
                                            tel_uti = :tel_uti,
                                            email_uti = :mail_uti,
                                            adresse_uti = :adresse_uti,
                                            codePostal_uti = :codePostal_uti,
                                            ville_uti = :ville_uti
                                        WHERE id_uti ="'.$_SESSION['id'].'"');
        $data->execute();
    }


}

$API = new API;
header('Content-Type: application/json');

?>
