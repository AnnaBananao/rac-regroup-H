<?php
include("../classes/connection.php");
$database = new DatabaseConnection;
$conn = $database->GetConnection();

$username = $_POST['username'];
$pwd = $_POST['pwd'];

try {
    $query = $conn->prepare("SELECT * FROM assurance_auto.administrateurs WHERE username = ? AND password = ?");
    $query->bind_param('ss', $username, $pwd);
    $query->execute();
    $result = $query->get_result();
    
    if ($result->num_rows === 0) {
        echo 'Login échoué, veuillez réessayer <br><br>'; 
        echo '<button>
                <a href="../login.php"> Retour </a>
              </button>';

    } else {
        header("Location: ../admin-page.php"); 
    }

    $conn -> close();

} catch (Exception $e) {
    echo "There is an error $e";
    $conn -> close();
}
?>