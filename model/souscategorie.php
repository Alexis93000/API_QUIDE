<?php
/**
 * Created by PhpStorm.
 * User: Alec Portable
 * Date: 14/03/2019
 * Time: 15:31
 */

class souscategorie
{
    //Params de la DB
    private $conn;
    private $table = 'souscategorie';

    //Params de la table
    public $idSouCat;
    public $nomSouCat;

    //Constructeur
    public function __construct($db)
    {
        $this->conn = $db;
    }


    //GetCategorie
    public function readSousCategorie(){

        $sousCategorie = array();

        $req = $this->conn->prepare('SELECT * FROM souscategorie');
        $req->execute();
        while ($OutputData = $req->fetch(PDO::FETCH_ASSOC)) {
            $sousCategorie[$OutputData['id_sou']] = array(
                'idSouCat' => $OutputData['id_sou'],
                'nomSouCat' => $OutputData['nom_sou']
            );
        }

        return json_encode($sousCategorie);
    }
}
