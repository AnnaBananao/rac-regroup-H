<?php
include("../classes/connection.php");
include("../classes/garage.php");
include("../classes/gestion-garage.php");
include("../classes/gestion-bd.php");

$database = new DatabaseConnection;
$gestionBD = new GestionBD($database);
$gestionGarage = new GestionGarage($database);

$id = htmlspecialchars($_POST['id']);
$nom = htmlspecialchars($_POST['nom']);
$ville = htmlspecialchars($_POST['ville']);
$adresse = htmlspecialchars($_POST['adresse']);
$telephone = htmlspecialchars($_POST['telephone']);

//Valid le numero de l'ID avant de modifier
$nomBD = 'assurance_auto.garages';
$nomColonne = 'garage_id';
$idExist = $gestionBD->validerSiIdExist($id, $nomBD, $nomColonne);

if ($idExist) {    
    //delete
    echo '
    '.$nom.' <br>
    '.$ville.' <br>
    '.$adresse.' <br>
    '.$telephone.' <br>';
    
    $garage = new Garage($nom, $ville, $adresse, $telephone);
    $gestionGarage->modifierGarage($id, $garage);
} else {
    echo "Cannot modify, id does not exist <br>
    <a href='/rac-regroupement-h/admin-page.php'>
    <button type='button'>Retour à l'admin</button>
    </a>";
}

?>