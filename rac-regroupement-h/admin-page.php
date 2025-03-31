<?php
$title = "Admin section";
$contact_us = "#contact-form";
$contact_us_mobile = "#contact-form";
$our_services = "#our-services";
$our_services_mobile = "#our-services";
include("common/head.php");
include("admin-section/nav.php") ?>

<div class="container">
    <h2>
        Section admin
    </h2>
    <form method="post" action="gestion-voiture.php">
        <div class="container">
            <input class="nom-section btn-soumettre" type="submit" value="Gérer une voiture" />
        </div>
    </form>
    <form method="post" action="gestion-temoignage.php">
        <div class="container">
            <input class="nom-section btn-soumettre" type="submit" value="Gérer les témoignages" />
        </div>
    </form>  
    <form method="post" action="gestion-question.php">
        <div class="container">
            <input class="nom-section btn-soumettre" type="submit" value="Gérer les questions" />
        </div>
    </form>
    <form method="post" action="gestion-garage.php">
        <div class="container">
            <input class="nom-section btn-soumettre" type="submit" value="Gérer un garage" />
        </div>
    </form>  
</div>
</body>
</html>