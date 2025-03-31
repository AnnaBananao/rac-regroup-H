<?php
$title = "Admin section - Gestion témoignages";
$contact_us = "#contact-form";
$contact_us_mobile = "#contact-form";
$our_services = "#our-services";
$our_services_mobile = "#our-services";
include("common/head.php");
include("admin-section/nav.php");
include("classes/connection.php"); 
include("classes/gestion-temoignage.php"); 
include("classes/affichage-temoignage.php"); 
?>

<?php
$database = new DatabaseConnection;

$gestionTem = new GestionTemoignage($database);
$nombreTemoignage = $gestionTem->getNumberOfTemoignages();

echo'<div class="container">
    <h3>
        Gestion des témoignages
    </h3>
    <p>
        Nombre de témoignages à approuver : '.$nombreTemoignage.'
    </p>
</div>';

if ($nombreTemoignage === 0) {
    echo'<p class="container">
            Rien à approuver
        </p>';
    }

$afficherTemoignages = new AffichageTemoignage($gestionTem);
$afficherTemoignages->displayTemoignages();

?>
</body>
</html>