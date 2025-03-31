<?php
$title = "Admin section - Gestion garage";
$contact_us = "#contact-form";
$contact_us_mobile = "#contact-form";
$our_services = "#our-services";
$our_services_mobile = "#our-services";
include("common/head.php");
include("admin-section/nav.php");
include("classes/connection.php") ?>

<h3 class="container">
    Gestion d'un garage
</h3>
<form method="post" action="gestion-garage.php" class="container">
    <select name="action" id="action" required>
        <option value="">Choose value</option>
        <option value="Add">Add</option>
        <option value="Modify">Modify</option>
        <option value="Delete">Delete</option>
        <option value="Voir">Voir tous les garages</option>
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
            Supprimer un garage 
            </h4>
            <form class="container" method="post" action="admin-section/delete-garage.php" autocomplete="off">
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
            Modifier un garage 
            </h4>
            <form class="container" method="post" action="admin-section/modify-garage.php" autocomplete="off">
            <div>
            <label for="id">ID:</label>
            <input type="number" id="id" name="id" required> <br><br>
            </div>
            <div>
                <label for="nom">Nom garage:</label>
                <input type="text" id="nom" name="nom" maxlength="50" required> <br><br>
            </div>
            <div>
                <label for="ville">Ville:</label>
                <input type="text" id="ville" name="ville" maxlength="50" required> <br><br>
            </div>
            <div>
                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse" name="adresse" required> <br><br>
            </div>
            <div>
                <label for="telephone">Numéro téléphone:</label>
                <input type="text" name="telephone" id="telephone" required> <br><br>
            </div>
            <input type="submit" name="submit" id="submit" value="Ajouter garage">
            </form>';
        }

        if($selected_value == "Add") {
            echo '
            <h4 class="container">
            Ajouter un garage 
            </h4>
            <form class="container" method="post" action="admin-section/add-garage.php" autocomplete="off">
            <div>
                <label for="nom">Nom garage:</label>
                <input type="text" id="nom" name="nom" maxlength="50" required> <br><br>
            </div>
            <div>
                <label for="ville">Ville:</label>
                <input type="text" id="ville" name="ville" maxlength="50" required> <br><br>
            </div>
            <div>
                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse" name="adresse" required> <br><br>
            </div>
            <div>
                <label for="telephone">Numéro téléphone:</label>
                <input type="text" name="telephone" id="telephone" required> <br><br>
            </div>
            <input type="submit" name="submit" id="submit" value="Ajouter garage">
            </form>';
        }

        if($selected_value == "Voir") {
            include("admin-section/show-garages.php");
        }

    }
?>
</body>
</html>