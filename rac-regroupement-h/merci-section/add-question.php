<?php
include("classes/connection.php");
include("classes/question.php");
include("classes/gestion-question.php");

$database = new DatabaseConnection;
$gestionQuestion = new GestionQuestion($database);

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$courriel = htmlspecialchars($_POST['email']);
$telephone = htmlspecialchars($_POST['tel']);
$contact = htmlspecialchars($_POST['contact']);
$sujet = htmlspecialchars($_POST['sujet']);
$question = htmlspecialchars($_POST['question']);

$nouvelleQuestion = new Question($nom, $prenom, $courriel, $telephone, $contact, $sujet, $question);
$gestionQuestion->ajouterQuestion($nouvelleQuestion);

?>