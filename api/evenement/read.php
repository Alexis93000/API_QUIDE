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
include_once '../../model/evenement.php';

//Connection BDD
$database = new Database();
$db = $database->connect();

//Instancier Utilisateur
$evenement = new evenement($db);

//Query Read

echo $evenement->readEvenement();


$db = null;

