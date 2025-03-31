<?php
include("../classes/connection.php");
include("../classes/voiture.php");
include("../classes/gestion-voiture.php");
include("../classes/gestion-bd.php");

$database = new DatabaseConnection;
$gestionVoiture = new GestionVoiture($database);
$gestionBD = new GestionBD($database);

$id = htmlspecialchars($_POST['id']);

//Valid le numero de l'ID avant de supprimer
$nomBD = 'assurance_auto.automobilestest';
$nomColonne = 'auto_id';
$idExist = $gestionBD->validerSiIdExist($id, $nomBD, $nomColonne);

if ($idExist) {
    $gestionVoiture->supprimerVoiture($id);
} else {
    echo "Cannot delete, id does not exist <br>
    <a href='/rac-regroupement-h/admin-page.php'>
    <button type='button'>Retour à l'admin</button>
    </a>";
}

?>