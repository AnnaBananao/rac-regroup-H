<?php
$title = "Recherche";
$contact_us = "index.php#contact-form";
$contact_us_mobile = "index.php#contact-form";
$our_services = "index.php#our-services";
$our_services_mobile = "index.php#our-services";
include("common/head.php");
require_once("classes/connection.php");
require_once("classes/recherche-voiture.php");
require_once("classes/affichage-voiture.php"); 
?>

<body> 

<?php
include("common/navbar.php"); 

$manufacturier = htmlspecialchars($_POST['manufacturier']);
$connection = New DatabaseConnection();
$recherche = New RechercheVoiture($connection);

//Gestion des années, va aussi servir pour savoir s'il faut faire recherche en incluant ou non les années
$getYears = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['annees']) && is_array($_POST['annees'])) {
        $selectedYears = $_POST['annees'];
        //s'assure que les valeures sont conformes + ajoute la virgule
        $escapedYears = array_map('intval', $selectedYears);
        $yearsList = implode(', ', $escapedYears); 
        $getYears = true;
    } else {
        $getYears = false;
    }
}

echo '
    <div class="container">
        <h2>
            Résultats
        </h2>
        <p>
            Manufacturier : <span class="italic"> '.$manufacturier.' </span> <br>
            Année(s) : ';

        
        //Dépend selon ce qui a été choisi du Forms
        if ($getYears === true) {
            echo '<span class="italic">'.$yearsList.'</span></p>';
        } else {
            echo 'Aucune <br><br></p>';
        }
        
    echo '
    <a href="our-products.php"> 
        <button class="container bold black--background white--text">
            Effecuter une autre recherche
        </button> 
    </a>
        <br>
    </div>
    <hr>';

//Fait la recherche selon input de l'utilisateur
if($getYears === true) {
    $resultat = $recherche->getSearchResultsWithYears($manufacturier, $yearsList);
    if ($resultat && $resultat->num_rows > 0) {
        echo "<div class='container'> 
                Nombre de résultats : $resultat->num_rows 
            </div>"; 

        $affichage = New AffichageVoiture($connection);
        $affichage->displayVoitures($resultat);
    } else {
        echo "<div class='container'>
                Il n'y a aucun résultats, veuillez réessayer.
            </div>";
    }
} else {
    //if getYears = false
    $resultat = $recherche->getSearchResultsWithoutYears($manufacturier);
    if ($resultat && $resultat->num_rows > 0) {
        echo "<div class='container'> 
                Nombre de résultats : $resultat->num_rows 
            </div>"; 

        $affichage = New AffichageVoiture($connection);
        $affichage->displayVoitures($resultat);
    } else {
        echo "<div class='container'>
                Il n'y a aucun résultats, veuillez réessayer.
            </div>";
    }

}

?>