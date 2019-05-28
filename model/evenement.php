<?php
/**
 * Created by PhpStorm.
 * User: Alec Portable
 * Date: 15/03/2019
 * Time: 09:43
 */

class evenement
{
    //Params de la DB
    private $conn;
    private $table = 'categorie';

    //Params de la table
    public $id_etab;
    public $nom_eve;
    public $description_eve;
    public $adresse_eve;
    public $codePostal_eve;
    public $ville_eve;
    public $prix_eve;
    public $paiement_eve;
    public $iduti_eve;
    public $dateDebut_eve;
    public $dateFin_eve;
    public $tel_eve;


    //Constructeur
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GetCategorie
    public function readEvenement(){

        $evenement = array();

        $req = $this->conn->prepare('SELECT *
                                     FROM evenement
                                      ORDER BY id_eve');
        $req->execute();
        while ($OutputData = $req->fetch(PDO::FETCH_ASSOC)) {
            $evenement[$OutputData['id_eve']] = array(
                'idEve' => $OutputData['id_eve'],
                'nomEve' => $OutputData['nom_eve'],
                'descriptionEve' => $OutputData['description_eve'],
                'adresseEve' => $OutputData['adresse_eve'],
                'codePostalEve' => $OutputData['codePostal_eve'],
                'villeEve' => $OutputData['ville_eve'],
                'prixEve' => $OutputData['prix_eve'],
                'paiementEve' => $OutputData['paiement_eve'],
                'idutiEve' => $OutputData['iduti_eve'],
                'dateDebutEve' => $OutputData['dateDebut_eve'],
                'dateFinEve' => $OutputData['dateFin_eve'],
                'telEve' => $OutputData['tel_eve']
            );
        }

        return json_encode($evenement);
    }
}
