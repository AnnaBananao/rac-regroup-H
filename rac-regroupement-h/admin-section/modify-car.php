<?php
include("../classes/connection.php");
include("../classes/voiture.php");
include("../classes/gestion-voiture.php");
include("../classes/gestion-bd.php");

$database = new DatabaseConnection;
$gestionBD = new GestionBD($database);
$gestionVoiture = new GestionVoiture($database);

$id = htmlspecialchars($_POST['id']);
$model = htmlspecialchars($_POST['model']);
$manufacturier = htmlspecialchars($_POST['manufacturier']);
$annee = htmlspecialchars($_POST['annee']);
$image = htmlspecialchars($_FILES['image']['name']);

//Valid le numero de l'ID avant de modifier
$nomBD = 'assurance_auto.automobilestest';
$nomColonne = 'auto_id';
$idExist = $gestionBD->validerSiIdExist($id, $nomBD, $nomColonne);

if ($idExist) {
    //créer objet voiture pour passer les param, slmt 1 argument à gérer
    
    //delete
    echo '
    '.$model.' <br>
    '.$manufacturier.' <br>
    '.$annee.' <br>
    '.$image.' <br>';

    $voiture = new Voiture($model, $manufacturier, $annee, $image);
    $gestionVoiture->modifierVoiture($id, $voiture);
} else {
    echo "Cannot modify, id does not exist <br>
    <a href='/rac-regroupement-h/admin-page.php'>
    <button type='button'>Retour à l'admin</button>
    </a>";
}

?>