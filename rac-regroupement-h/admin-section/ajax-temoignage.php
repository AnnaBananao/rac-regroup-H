<?php 

include("../classes/connection.php");

$id = $_POST['id'];
$statut_approbation = null;
$database = new DatabaseConnection;
$conn = $database->GetConnection();

$submit_tem = $_POST["action_tem"];

if ($submit_tem == "approved") {
    echo "Item #$id is : $submit_tem <br>" ;
    $statut_approbation = "approuved";
}

if ($submit_tem == "declined") {
    echo "Item #$id is : $submit_tem <br>";
    $statut_approbation = "denied"; 
}

try {
    $update_temoignage = $conn->prepare("update assurance_auto.temoignages set statut_approbation = ? where id = ? ");
    $update_temoignage->bind_param("si", $statut_approbation, $id);
    $update_temoignage->execute();    
    $update_temoignage->close();
    echo "Item updated";
} catch (Exception $e) {
    echo "This is an error : $e <br>";
} finally {
    $conn->close();
}

?>