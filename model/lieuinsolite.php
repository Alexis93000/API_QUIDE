<?php
/**
 * Created by PhpStorm.
 * User: Alec Portable
 * Date: 15/03/2019
 * Time: 13:31
 */

class lieuinsolite
{
    //Params de la DB
    private $conn;
    private $table = 'utilisateur';

    //Params de la table
    public $id_uti;
    public $type_uti;
    public $civilite_uti;
    public $nom_uti;
    public $prenom_uti;
    public $dateNaissance_uti;
    public $tel_uti;
    public $mdp_uti;
    public $email_uti;
    public $adresse_uti;
    public $codePostal_uti;
    public $ville_uti;
    public $numSiret_uti;

    //Constructeur
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GetUsers
    public function showLieu(){
        $lieuinsolite = array();
        $query = 'SELECT * FROM lieuinsolite';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        while ($OutputData = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lieuinsolite[$OutputData['id_lieu']] = array(
                'idLieu' => $OutputData['id_lieu'],
                'nomLieu' => $OutputData['nom_lieu'],
                'adresseLieu' => $OutputData['adresse_lieu'],
                'codePostalLieu' => $OutputData['codePostal_lieu'],
                'villeLieu' => $OutputData['ville_lieu'],
                'telLieu' => $OutputData['tel_lieu'],
                'descriptionLieu' => $OutputData['description_lieu'],
                'verificationLieu' => $OutputData['verification_lieu'],
                'sousCatLieu' => $OutputData['sousCat_lieu'],
                'idUserLieu' => $OutputData['idUti_lieu']
            );
        }

        return json_encode($lieuinsolite);
    }


    //GetSpecific User
    public function showLieuUser($idProfile){
        $lieuinsolite = array();
        $query = 'SELECT * FROM lieuinsolite WHERE idUti_lieu ="'. addslashes($idProfile) . '"';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        while ($OutputData = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lieuinsolite[$OutputData['id_lieu']] = array(
                'idLieu' => $OutputData['id_lieu'],
                'nomLieu' => $OutputData['nom_lieu'],
                'adresseLieu' => $OutputData['adresse_lieu'],
                'codePostalLieu' => $OutputData['codePostal_lieu'],
                'villeLieu' => $OutputData['ville_lieu'],
                'telLieu' => $OutputData['tel_lieu'],
                'descriptionLieu' => $OutputData['description_lieu'],
                'verificationLieu' => $OutputData['verification_lieu'],
                'sousCatLieu' => $OutputData['sousCat_lieu'],
                'idUserLieu' => $OutputData['idUti_lieu']
            );
        }

        return json_encode($lieuinsolite);
    }

}
