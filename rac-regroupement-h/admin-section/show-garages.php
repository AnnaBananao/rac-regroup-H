<?php
require_once("classes/connection.php");
require_once("classes/garage.php");
require_once("classes/gestion-garage.php");
require_once("classes/affichage-garage.php");

$connection = new DatabaseConnection;
$gestionGarage = new GestionGarage($connection);
$affichageGarage = new AffichageGarage($gestionGarage);

$affichageGarage->displayGarages();

?>