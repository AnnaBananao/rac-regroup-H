<?php 

include("../classes/connection.php");

$id = $_POST['id'];
$statut_approbation = null;
$database = new DatabaseConnection;
$conn = $database->GetConnection();

try { 
    $query = $conn->prepare('UPDATE assurance_auto.questions SET statut_question = "answered" WHERE id = ?');
    $query->bind_param('i', $id);
    $query->execute();
    echo "<p class='container'> Statut changé </p>
    <a class='container' href='/rac-regroupement-h/admin-page.php'>
        <button type='button'>Retour à l'admin</button>
    </a>
    ";} catch (Exception $e) { 
    echo "There is an error $e";
}

?>