<?php
/**
 * Created by PhpStorm.
 * User: Alec Portable
 * Date: 14/03/2019
 * Time: 15:14
 */


//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config.php';
include_once '../../model/utilisateur.php';

//Connection BDD
$database = new Database();
$db = $database->connect();

//Instancier Utilisateur
$user = new utilisateur($db);

//Query Read

if(!empty($_GET['login']) && !empty($_GET['pwd'])){
    echo $user->connexion($_GET['login'],$_GET['pwd']);
}else{
    echo 'Erreur connexion';
}

$db = null;
