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

//Instancier Utilisateur
$lieu = new lieuinsolite($db);

//Query Read

if(!empty($_GET['id'])){
    echo $lieu->showInfoLieu($_GET['id']);
}else {
    echo $lieu->showLieu();
}

$db = null;
