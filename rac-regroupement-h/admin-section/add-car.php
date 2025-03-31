<?php
include("../classes/connection.php");
include("../classes/voiture.php");
include("../classes/gestion-voiture.php");

$database = new DatabaseConnection;
$gestionVoiture = new GestionVoiture($database);

$model = htmlspecialchars($_POST['model']);
$manufacturier = htmlspecialchars($_POST['manufacturier']);
$annee = htmlspecialchars($_POST['annee']);
$image = htmlspecialchars($_FILES['image']['name']);

//delete
echo '
'.$model.' <br>
'.$manufacturier.' <br>
'.$annee.' <br>
'.$image.' <br>';

$nouvelleVoiture = new Voiture($model, $manufacturier, $annee, $image);
$gestionVoiture->ajouterVoiture($nouvelleVoiture);

?>