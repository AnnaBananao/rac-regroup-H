<?php

$title = "Gestion question";

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
    event.preventDefault();

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "admin-section/ajax-question.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("response").innerHTML = xhr.responseText;
        }
    };

    var formData = new FormData(event.target);
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

include("common/head.php");
include("admin-section/nav.php");
include("classes/connection.php"); 
include("classes/gestion-question.php"); 
include("classes/affichage-question.php"); 
?>

<?php
$database = new DatabaseConnection;

$gestionQuestion = new GestionQuestion($database);
$nombreQuestion = $gestionQuestion->getNumberOfQuestions();

echo'<div class="container">
    <h3>
        Gestion des questions
    </h3>
    <p>
        Nombre de questions : '.$nombreQuestion.'
    </p>
</div>';

if ($nombreQuestion === 0) {
    echo'<p class="container">
            Rien à gérer
        </p>';
    }

$afficherQuestions = new AffichageQuestion($gestionQuestion);
$afficherQuestions->displayQuestions();

echo'
<!-- Emplacement pour les echos du admin-section/ajax-question.php -->
<div id="response"></div> ';
?>
</body>
</html>