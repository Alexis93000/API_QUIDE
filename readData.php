<?php

require_once __DIR__ . '/config.php';

class API
{
    function selectCategorie()
    {
        $db = new Connect;
        $categorie = array();

        // REQUETE CATEGORIE
        $data = $db->prepare('SELECT * FROM categorie ORDER BY id_cat');
        $data->execute();
        while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)) {
            $categorie[$OutputData['id_cat']] = array(
                'id' => $OutputData['id_cat'],
                'nom_cat' => $OutputData['nom_cat']
            );
        }
        return json_encode($categorie);
    }

    function selectUtilisateur()
    {
        $db = new Connect;
        $users = array();

        $data = $db->prepare('SELECT * FROM utilisateur ORDER BY id_uti');
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
            );
        }

        return json_encode($users);
    }

    function selectListeLieux($idEtab = 5)
    {
        $db = new Connect;
        $etab = array();

        // REQUETE CATEGORIE
        $data = $db->prepare('SELECT id_etab,nom_etab,nom_sou 
                                        FROM etablissement, souscategorie,souscategorieetab
                                        WHERE etablissement.idsou_etab = souscategorie.id_sou
                                        AND  souscategorie.id_sou = souscategorieetab.idsou_sce
                                        AND souscategorieetab.idcat_sce = "'.$idEtab.'"
                                        ORDER BY id_etab');
        $data->execute();
        while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)) {
            $etab[$OutputData['id_etab']] = array(
                'id' => $OutputData['id_etab'],
                'nomEtab' => $OutputData['nom_etab'],
                'nomSou' => $OutputData['nom_sou']
            );
        }
        return json_encode($etab);
    }

    function selectLieux($idEtab = 2)
    {
        $db = new Connect;
        $etab = array();

        // REQUETE CATEGORIE
        $data = $db->prepare('SELECT * FROM etablissement WHERE id_etab = "'.$idEtab.'"');
        $data->execute();
        while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)) {
            $etab[$OutputData['id_etab']] = array(
                'id' => $OutputData['id_etab'],
                'nomEtab' => $OutputData['nom_etab'],
                'description' => $OutputData['description_etab'],
                'adresse' => $OutputData['adresse_etab'],
                'codePostal' => $OutputData['codePostal_etab'],
                'ville' => $OutputData['ville_etab'],
                'tel' => $OutputData['tel_etab'],
                'note' => $OutputData['note_etab'],
                'avis' => $OutputData['avis_etab'],
                'site' => $OutputData['site_etab']
            );
        }
        return json_encode($etab);
    }

    function connexion($login = '',$pwd = '')
    {
        $db = new Connect;
        $utilisateur = array();
        $login = addslashes('alec.mohamedbtssio@gmail.com');
        $pwd = 'azerty123';

        // REQUETE CATEGORIE
        $data = $db->prepare('SELECT * FROM utilisateur WHERE email_uti = "'.$login.'" AND mdp_uti = "'.$pwd.'"');
        $data->execute();
        while ($OutputData = $data->fetch(PDO::FETCH_ASSOC)) {
            $utilisateur[$OutputData['id_uti']] = array(
                    'idUser' => $OutputData['id_uti'],
                    'typeUser' => $OutputData['type_uti'],
                    'nom' => $OutputData['nom_uti'],
                    'prenom' => $OutputData['prenom_uti']
            );
            $_SESSION['id'] = $OutputData['id_uti'];
        }

        return json_encode($utilisateur);
    }

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


}

$API = new API;
header('Content-Type: application/json');
echo $API->connexion();
?>




