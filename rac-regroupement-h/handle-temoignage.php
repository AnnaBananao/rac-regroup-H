<?php
$title = "Handle temoignage";

echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylesheets/styles.css">

<!-- ***AJAX SCRIPT*** -->

<script>
function submitForm(event) {
    event.preventDefault(); // Prevent the default form action

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "admin-section/ajax-temoignage.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("response").innerHTML = xhr.responseText;
        }
    };

    var formData = new FormData(document.getElementById("handleTemoignage"));
    var data = new URLSearchParams();
    for (var pair of formData) {
        data.append(pair[0], pair[1]);
    }

    xhr.send(data);
}
</script>

<!-- ***END AJAX SCRIPT*** -->

<script src="https://kit.fontawesome.com/5fab74318f.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="img\favicon.ico">
<title>'.$title.'</title>
</head>';
?>

<?php
include("admin-section/nav.php");
include("classes/connection.php"); 
include("classes/gestion-temoignage.php"); 
include("classes/affichage-temoignage.php"); 
?>

<?php
$id_tem = $_POST['id'];

$database = new DatabaseConnection;
$gestionTem = new GestionTemoignage($database);
$temoignage = $gestionTem->getTemoignage($id_tem);


echo'<div class="container">
    <h3>
        <a href="gestion-temoignage.php">Gestion des témoignages</a> > Validation
    </h3>
</div>';

$afficherTemoignage = new AffichageTemoignage($gestionTem);
$afficherTemoignage->displayTemoignage($id_tem);

?>

<!-- Emplacement pour les echos du admin-section/ajax-temoignage.php -->
<div id="response"></div>

</body>
</html>