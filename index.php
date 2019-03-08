<?php
require_once __DIR__ .'/config.php';
class API{
    function Select(){
        $db = new Connect;
        $users =array();
        
               // REQUETE UTILISATEURS
       
//$data = $db->prepare("UPDATE utilisateur SET nom = 'changement' WHERE id = 4" );
//$data = $db->prepare("DELETE FROM utilisateur WHERE id = 1" );
//$data = $db->prepare("INSERT INTO `utilisateur` (`id_uti`, `type_uti`, `civilite_uti`, `nom_uti`, `prenom_uti`, `dateNaissance_uti`, `tel_uti`, `mdp_uti`, `email_uti`, `adresse_uti`, `codePostal_uti`, `ville_uti`) VALUES ('1', 'test', 'test', 'test', 'test', '2019-03-07', '0625854120', 'ertyu', 'test@hotmail.fr', 'azerty', '75000', 'Paris')");
$data = $db->prepare('SELECT* FROM utilisateur ORDER BY id_uti');
        
        $data->execute();
        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
            $users[$OutputData['id_uti']] = array(
                'id'  => $OutputData['id_uti'],
                'type'  => $OutputData['type_uti'],
                'civilite'  => $OutputData['civilite_uti'],
                'nom'  => $OutputData['nom_uti'],
                'prenom'  => $OutputData['prenom_uti'],
                'dateNaissance'  => $OutputData['dateNaissance_uti'],
                'tel'  => $OutputData['tel_uti'],
                'mdp'  => $OutputData['mdp_uti'],
                'email'  => $OutputData['email_uti'],
                'adresse'  => $OutputData['adresse_uti'],
                'codePostal'  => $OutputData['codePostal_uti'],
                'ville'  => $OutputData['ville_uti']
        
        
                // REQUETE CATEGORIES
        
//$data = $db->prepare('SELECT* FROM categorie ORDER BY id_cat');
//        $data->execute();
//        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
//            $users[$OutputData['id_cat']] = array(
//                'id'  => $OutputData['id_cat'],
//                
//                'nom'  => $OutputData['nom_cat'],
                //'prenom'  => $OutputData['prenom_uti']
                    );
        }
        return json_encode($users);
    }
}

$API = new API;
header('Content-Type: application/json');
echo $API->Select();
?>


