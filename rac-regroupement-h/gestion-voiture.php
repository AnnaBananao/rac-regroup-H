<?php
$title = "Admin section - Gestion voiture";
$contact_us = "#contact-form";
$contact_us_mobile = "#contact-form";
$our_services = "#our-services";
$our_services_mobile = "#our-services";
include("common/head.php");
include("admin-section/nav.php");
include("classes/connection.php") ?>

<?php
$database = new DatabaseConnection;
$conn = $database->getConnection(); ?>


<h3 class="container">
    Gestion d'une voiture
</h3>
<form method="post" action="gestion-voiture.php" class="container">
    <select name="action" id="action" required>
        <option value="">Choose value</option>
        <option value="Add">Add</option>
        <option value="Modify">Modify</option>
        <option value="Delete">Delete</option>
    </select>
    <br><br>
    <input type="submit" name="submit" id="submit">
</form>
<br>
<hr>

<?php

//Quoi afficher dépendant du Select 
    if(isset($_POST["submit"])) {
        $selected_value = $_POST["action"];
        
        if($selected_value == "Delete") {
            echo '
            <h4 class="container">
            Supprimer une voiture 
            </h4>
            <form class="container" method="post" action="admin-section/delete-car.php" autocomplete="off">
            <div>
                <label for="id">ID:</label>
                <input type="number" id="id" name="id" required> <br><br>
            </div>
            <input type="submit" name="submit" id="submit" value="Supprimer">
            </form>
            ';
        }

        if($selected_value == "Modify") {
            echo '
            <h4 class="container">
            Modifier une voiture 
            </h4>
            <form class="container" method="post" action="admin-section/modify-car.php" enctype="multipart/form-data" autocomplete="off">
            <div>
            <label for="id">ID:</label>
            <input type="number" id="id" name="id" required> <br><br>
            </div>
            <div>
                <label for="model">Modèle:</label>
                <input type="text" id="model" name="model" maxlength="50" required> <br><br>
            </div>
            <div>
                <label for="manufacturier">Manufacturier:</label>
                <input type="text" id="manufacturier" name="manufacturier" maxlength="50" required> <br><br>
            </div>
            <div>
                <label for="annee">Année:</label>
                <input type="text" id="annee" name="annee" pattern="[0-9]{4}" required> <br><br>
            </div>
            <div>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept=".png, .jpg, .jpeg" required>
                <input type="text" name="alt" id="alt" placeholder="Alt text" required> <br><br>
            </div>
            <input type="submit" name="submit" id="submit" value="Ajouter voiture">
            </form>';
        }

        if($selected_value == "Add") {
            echo '
            <h4 class="container">
            Ajouter une voiture 
            </h4>
            <form class="container" method="post" action="admin-section/add-car.php" enctype="multipart/form-data" autocomplete="off">
            <div>
                <label for="model">Modèle:</label>
                <input type="text" id="model" name="model" maxlength="50" required> <br><br>
            </div>
            <div>
                <label for="manufacturier">Manufacturier:</label>
                <input type="text" id="manufacturier" name="manufacturier" maxlength="50" required> <br><br>
            </div>
            <div>
                <label for="annee">Année:</label>
                <input type="text" id="annee" name="annee" pattern="[0-9]{4}" required> <br><br>
            </div>
            <div>
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" accept=".png, .jpg, .jpeg" required>
                <input type="text" name="alt" id="alt" placeholder="Alt text" required> <br><br>
            </div>
            <input type="submit" name="submit" id="submit" value="Ajouter voiture">
            </form>';
        }
    }
?>

</body>
</html>