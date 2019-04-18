<?php
/**
 * Created by PhpStorm.
 * User: Alec Portable
 * Date: 14/03/2019
 * Time: 15:31
 */

class categorie
{
    //Params de la DB
    private $conn;
    private $table = 'categorie';

    //Params de la table
   public $idCat;
   public $nomCat;

    //Constructeur
    public function __construct($db)
    {
        $this->conn = $db;
    }


    //GetCategorie
    public function readCategorie(){

        $categorie = array();

        $req = $this->conn->prepare('SELECT * FROM categorie');
        $req->execute();
        while ($OutputData = $req->fetch(PDO::FETCH_ASSOC)) {
            $categorie[$OutputData['id_cat']] = array(
                'idCat' => $OutputData['id_cat'],
                'nomCat' => $OutputData['nom_cat']
            );
        }

        return json_encode($categorie);
    }
}
