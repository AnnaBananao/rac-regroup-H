<?php
$title = "Our products";
$contact_us = "index.php#contact-form";
$contact_us_mobile = "index.php#contact-form";
$our_services = "index.php#our-services";
$our_services_mobile = "index.php#our-services";
include("common/head.php"); 
include("classes/connection.php"); 
include("classes/recherche-voiture.php"); 
?>

<body> 

<?php
include("common/navbar.php"); 

$connection = New DatabaseConnection;
$rechercheVoiture = New RechercheVoiture($connection);

//Va chercher tous les manufacturiers dans la BD pour l'afficher dans le Select 
$manufacturiers = $rechercheVoiture->chercherManufacturiers();

?>

<div class="gutter-desktop container white--background">
    <h2>
        Recherche
    </h2>
</div>
<div class="gutter-desktop container">
    <form class="form-section" action="search.php" autocomplete="off" method="post">
        <label for="manufacturier"> Manufacturier * </label> <br><br>
        
        <select required id="manufacturier" name="manufacturier">
            <option value="">-- Veuillez faire un choix --</option>
            <?php foreach ($manufacturiers as $manufacturier): ?>
                <option value="<?php echo htmlspecialchars($manufacturier['manufacturier']); ?>">
                    <?php echo htmlspecialchars($manufacturier['manufacturier']); ?>
                </option>
            <?php endforeach; ?>
        </select> <br><br>

        <label for="annees[]"> Année(s) </label> <br><br>
        <input type="checkbox" id="2025" name="annees[]" value="2025">
        <label for="2025"> 2025 </label><br>
        <input type="checkbox" id="2024" name="annees[]" value="2024">
        <label for="2024"> 2024 </label><br>
        <input type="checkbox" id="2023" name="annees[]" value="2023">
        <label for="2023"> 2023 </label><br>
        <input type="checkbox" id="2022" name="annees[]" value="2022">
        <label for="2022"> 2022 </label><br>
        <input type="checkbox" id="2021" name="annees[]" value="2021">
        <label for="2021"> 2021 </label><br>
        <input type="checkbox" id="2020" name="annees[]" value="2020">
        <label for="2020"> 2020 </label><br><br>
        <div class="centered container">
            <input class="nom-section btn-soumettre" type="submit" value="Soumettre" />
        </div>
    </form>
</div>

<?php
include("common/footer.html"); ?>
</body>
    <script src="scripts/app.js"></script>
</html>