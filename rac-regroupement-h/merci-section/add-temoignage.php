<?php
include("classes/connection.php");
include("classes/temoignage.php");
include("classes/gestion-temoignage.php");

$database = new DatabaseConnection;
$gestionTemoignage = new GestionTemoignage($database);

$message = htmlspecialchars($_POST['message']);

$nouveauTemoignage = new Temoignage($message);
$gestionTemoignage->ajouterTemoignage($nouveauTemoignage);

?>