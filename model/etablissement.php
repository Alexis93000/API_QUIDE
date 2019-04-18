<?php
/**
 * Created by PhpStorm.
 * User: Alec Portable
 * Date: 15/03/2019
 * Time: 09:28
 */

class etablissement
{
    //Params de la DB
    private $conn;
    private $table = 'categorie';

    //Params de la table
    public $id_etab;
    public $nom_etab;
    public $description_etab;
    public $adresse_etab;
    public $codePostal_etab;
    public $ville_etab;
    public $site_etab;
    public $sousCat_etab;

    //Constructeur
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //GetCategorie
    public function readEtablissement(){

        $etablissement = array();

        $req = $this->conn->prepare('SELECT *
                                     FROM etablissement
                                      ORDER BY id_etab');
        $req->execute();
        while ($OutputData = $req->fetch(PDO::FETCH_ASSOC)) {
            $etablissement[$OutputData['id_etab']] = array(
                'idEtab' => $OutputData['id_etab'],
                'nomEtab' => $OutputData['nom_etab'],
                'descriptionEtab' => $OutputData['description_etab'],
                'adresseEtab' => $OutputData['adresse_etab'],
                'codePostalEtab' => $OutputData['codePostal_etab'],
                'villeEtab' => $OutputData['ville_etab'],
                'siteEtab' => $OutputData['site_etab'],
                'sousCatEtab' => $OutputData['sousCat_etab']
            );
        }

        return json_encode($etablissement);
    }
}
