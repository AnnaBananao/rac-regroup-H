<?php
$title = "Login admin";
$contact_us = "#contact-form";
$contact_us_mobile = "#contact-form";
$our_services = "#our-services";
$our_services_mobile = "#our-services";
include("common/head.php");
include("admin-section/nav.php") ?>

<div class="container">
    <h2>
        Section admin - sécurisé
    </h2>
    <p>
        Veuillez entrer votre nom d'utilisateur et mot de passe afin d'accèder à la section admin.
    </p>
    <form method="post" action="admin-section/login.php" autocomplete="off">
        <label for="username">Nom d'utilisateur:</label> <br>
        <input type="text" id="username" name="username" maxlength="50" required> <br><br>
        <label for="pwd">Mot de passe:</label> <br>
        <input type="password" id="pwd" name="pwd" maxlength="50" required> <br><br>
        <input class="nom-section" type="submit" value="Me connecter" />
    </form>
</div>
</body>
</html>