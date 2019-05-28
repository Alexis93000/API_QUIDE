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
include_once '../../model/lieuinsolite.php';

//Connection BDD
$database = new Database();
$db = $database->connect();

//Instancier lieuinsolite
$lieu = new lieuinsolite($db);

//Query Read

if(!empty($_GET['nom'])){
    echo $lieu->ajoutLieu($_GET['nom'],$_GET['adresse'],$_GET['codepostal'],$_GET['ville']
    ,$_GET['telephone'],$_GET['description']);
}else{
    echo 'Erreur ajout';
}

$db = null;
