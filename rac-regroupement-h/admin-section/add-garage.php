<?php
include("../classes/connection.php");
include("../classes/garage.php");
include("../classes/gestion-garage.php");

$database = new DatabaseConnection;
$gestionGarage = new GestionGarage($database);

$nom = htmlspecialchars($_POST['nom']);
$ville = htmlspecialchars($_POST['ville']);
$adresse = htmlspecialchars($_POST['adresse']);
$telephone = htmlspecialchars($_POST['telephone']);

$nouveauGarage = new Garage($nom, $ville, $adresse, $telephone);
$gestionGarage->ajouterGarage($nouveauGarage);

?>