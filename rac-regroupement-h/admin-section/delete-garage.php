<?php
include("../classes/connection.php");
include("../classes/garage.php");
include("../classes/gestion-garage.php");
include("../classes/gestion-bd.php");

$database = new DatabaseConnection;
$gestionBD = new GestionBD($database);
$gestionGarage = new GestionGarage($database);

$id = htmlspecialchars($_POST['id']);

//Valid le numero de l'ID avant de modifier
$nomBD = 'assurance_auto.garages';
$nomColonne = 'garage_id';
$idExist = $gestionBD->validerSiIdExist($id, $nomBD, $nomColonne);

if ($idExist) {    
    //delete
    $gestionGarage->supprimerGarage($id);
} else {
    echo "Cannot delete, id does not exist <br>
    <a href='/rac-regroupement-h/admin-page.php'>
    <button type='button'>Retour à l'admin</button>
    </a>";
}

?>