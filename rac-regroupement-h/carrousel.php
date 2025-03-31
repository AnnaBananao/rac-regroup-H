<div class="container pink--background slider-section">
    <h2 class="centered">
        Témoignages
    </h2>
    <p class="centered italic">
        Voyez ce que nos abonnés disent sur nous!
    </p>

<?php 
require_once("classes/connection.php");
require_once("classes/gestion-temoignage.php");
require_once("classes/affichage-temoignage.php");

//aller chercher ce qu'il y a dans la BD pour l'afficher

$connection = New DatabaseConnection;
$gestionTem = New GestionTemoignage($connection);
$resultat = $gestionTem->getCarrousel();

$affichage = New AffichageTemoignage($gestionTem);
$affichage->displayCarrousel($resultat);

?>

<div class="button-container">
    <button id="prev">
        <i class="white--text fa-solid fa-arrow-left"></i>
    </button>
    <button id="next">
        <i class="white--text fa-solid fa-arrow-right"></i>
    </button> <br><br>
</div>
<div class="container">
    <a href="#soumettre-temoignage" class="btn btn-responsive white--text black--background">
        Soumettre un témoignage
    </a>
</div>
</div>
