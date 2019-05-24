<?php
/**
 * Created by PhpStorm.
 * User: Alec Portable
 * Date: 14/03/2019
 * Time: 15:06
 */

class utilisateur
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
    public function readProfile(){
        $utilisateur = array();
        $query = 'SELECT * FROM utilisateur';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        while ($OutputData = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $utilisateur[$OutputData['id_uti']] = array(
                'idUser' => $OutputData['id_uti'],
                'typeUser' => $OutputData['type_uti'],
                'nom' => $OutputData['nom_uti'],
                'prenom' => $OutputData['prenom_uti'],
                'dateNaissance' => $OutputData['dateNaissance_uti'],
                'tel' => $OutputData['tel_uti'],
                'email' => $OutputData['email_uti'],
                'adresse' => $OutputData['adresse_uti'],
                'codePostal' => $OutputData['codePostal_uti'],
                'ville' => $OutputData['ville_uti']
            );
        }

        return json_encode($utilisateur);
    }


    //GetSpecific User
    public function showProfile($idProfile){
        $utilisateur = array();
        $query = 'SELECT * FROM utilisateur WHERE id_uti ='. addslashes($idProfile);

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        while ($OutputData = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $utilisateur[$OutputData['id_uti']] = array(
                'idUser' => $OutputData['id_uti'],
                'typeUser' => $OutputData['type_uti'],
                'nom' => $OutputData['nom_uti'],
                'prenom' => $OutputData['prenom_uti'],
                'dateNaissance' => $OutputData['dateNaissance_uti'],
                'tel' => $OutputData['tel_uti'],
                'email' => $OutputData['email_uti'],
                'adresse' => $OutputData['adresse_uti'],
                'codePostal' => $OutputData['codePostal_uti'],
                'ville' => $OutputData['ville_uti']
            );
        }

        return json_encode($utilisateur);
    }


    //Connexion
    public function connexion($login,$password){

        $utilisateur = array();
        $query = 'SELECT * FROM utilisateur WHERE email_uti ="'. addslashes($login) .'" AND mdp_uti = "' . addslashes($password) .'"';

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        while ($OutputData = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $utilisateur[$OutputData['id_uti']] = array(
                'idUser' => $OutputData['id_uti'],
                'typeUser' => $OutputData['type_uti'],
                'nom' => $OutputData['nom_uti'],
                'prenom' => $OutputData['prenom_uti'],
            );
        }

        return json_encode($utilisateur);
    }

    public function inscription($typeUser,$civUser,$nomUser,$prenomUser,$dateUser,$telUser,$mdpUser,$emailUser){

        $query = 'INSERT INTO utilisateur(type_uti,civilite_uti,nom_uti,prenom_uti,dateNaissance_uti,tel_uti,mdp_uti,email_uti)
                  VALUES("'.addslashes($typeUser).'","'.addslashes($civUser).'","'.addslashes($nomUser).'","'.addslashes($prenomUser).'","'.addslashes($dateUser).'","'.addslashes($telUser).'","'.addslashes($mdpUser).'","'.addslashes($emailUser).'")';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return 'Insertion dans la BDD';
    }

}
