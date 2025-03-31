<?php
$title = "Merci!";
$contact_us = "#contact-form";
$contact_us_mobile = "#contact-form";
$our_services = "#our-services";
$our_services_mobile = "#our-services";
include("common/head.php");
?>

<body> 

<?php
include("common/navbar.php"); 

if (isset($_POST['soumettre-temoignage'])) {
    include("merci-section/add-temoignage.php");
} 

if (isset($_POST['soumettre-question'])) {
    include("merci-section/add-question.php");
}

?>