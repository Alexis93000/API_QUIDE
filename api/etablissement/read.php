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
include_once '../../model/etablissement.php';

//Connection BDD
$database = new Database();
$db = $database->connect();

//Instancier Utilisateur
$etab = new etablissement($db);

//Query Read

if(!empty($_GET['id'])){
    echo $etab->readInfoEtablissement($_GET['id']);
}else {
    echo $etab->readEtablissement();
}

$db = null;

