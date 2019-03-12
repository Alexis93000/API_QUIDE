<?php

require_once __DIR__ . '/config.php';

function inscription()
{
    $db = new Connect;

    // REQUETE CATEGORIE
    $data = $db->prepare('INSERT INTO utilisateur(type_uti,civilite_uti,nom_uti,prenom_uti,tel_uti,mdp_uti,email_uti)
                                    VALUES(:type_uti,:civilite_uti,:nom_uti,:prenom_uti,:tel_uti,:mdp_uti,:email_uti)');
    $data->execute();

}


?>
