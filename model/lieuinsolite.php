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
    private $table = 'lieuinsolite';

    //Params de la table
    public $id_lieu;
    public $nom_lieu;
    public $adresse_lieu;
    public $codePostal_lieu;
    public $ville_lieu	;
    public $tel_lieu;
    public $description_lieu;
    public $verification_lieu;
    public $sousCat_lieu;

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
                'sousCatLieu' => $OutputData['sousCat_lieu']
            );
        }

        return json_encode($lieuinsolite);
    }


    //GetSpecific User
    public function showInfoLieu($idInsolite){
        $lieuinsolite = array();
        $query = 'SELECT * FROM lieuinsolite WHERE id_lieu ="'. $idInsolite . '"';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        var_dump($query);
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
                'sousCatLieu' => $OutputData['sousCat_lieu']
            );
        }

        return json_encode($lieuinsolite);
    }

    public function ajoutLieu($nom,$adresse,$codepostal,$ville,$telephone,$description){
      $lieuinsolite = array();
      $query = 'INSERT INTO  lieuinsolite (nom_lieu, adresse_lieu, codePostal_lieu, ville_lieu,
         tel_lieu, description_lieu) VALUES ("'.$nom .'","' .$adresse .'","'.$codepostal .'",
         "'.$ville .'","'.$telephone .'","'.$description .'")';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return 'ajout dans la BDD';
        }


    }
