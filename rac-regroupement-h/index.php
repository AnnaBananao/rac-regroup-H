<?php
$title = "Bienvenue!";
$contact_us = "#contact-form";
$contact_us_mobile = "#contact-form";
$our_services = "#our-services";
$our_services_mobile = "#our-services";
include("common/head.php");
?>

<body> 

<?php include("common/navbar.php"); ?>

<!-- ***Hero section*** -->

<div class="hero-section">
    <div class="container text-section">
        <h1>
            Offering better protection
        </h1>
        <p class="italic bigger-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        </p>
        <br>
        <a href="our-products" class="btn btn-smaller white--text black--background">
            Voir nos produits
        </a> <br>
    </div>
    <div class="container img-section">
        <img src="img/car-hero.svg" alt="Voiture">
    </div>
</div>

<!-- ***Carrousel témoignages*** -->
<?php include("carrousel.php"); ?>

<!-- ***Our services*** -->

<div id="our-services" class="container centered flex-card-section green--background">
    <div>
        <h2>
            Pricing
        </h2>
        <p class="italic bigger-text bigger-container">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. 
        </p>
    </div>
    <div class="cards">
        <div class="card">
            <div class="card-header">
                    <p class="protection-name">Assurance au tiers</p>
            </div>
            <div class="card-bottom">
                <p class="protection-specifics">
                    <span class="price bold">$25</span> <span class="price"> / mo</span><br><br>
                    Dommages causés à des tiers <br>
                    Agents disponibles 24/7 <br><br>
                </p>
            <a href="#" class="btn white--text black--background">
                Inscrivez-vous
            </a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                    <p class="protection-name">Assurance tous risques</p>
            </div>
            <div class="card-bottom">
                <p class="protection-specifics">
                    <span class="price bold">$50</span> <span class="price"> / mo</span><br><br>
                    Dommages causés à des tiers <br>
                    Agents disponibles 24/7 <br><br>
                </p>
            <a href="#" class="btn white--text black--background">
                Appelez-nous
            </a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                    <p class="protection-name">Formule personnalisée</p>
            </div>
            <div class="card-bottom">
                <p class="protection-specifics">
                    <span class="price bold">Contactez-nous</span> <span class="price"></span><br><br>
                    Adaptées à vos besoins <br>
                    Agents disponibles 24/7 <br><br>
                </p>
            <a href="#" class="btn white--text black--background">
                Contactez-nous
            </a>
            </div>
        </div>    
    </div>
</div>

<!-- ***Questions*** -->

<div id="contact-form" class="gutter-desktop container white--background">
    <h2>
        Vous avez une question?
    </h2>
    <form class="form-section" action="merci.php" autocomplete="off" method="post">
        <p class="nom-section">
            Nom *
        </p>
        <div class="flex-section">
            <p class="form-response">
                <input required type="text" id="prenom" name="prenom" maxlength="50"/> <br>
                <span class="subtitle">Prénom</span> 
            </p>
            <p class="form-response">
                <input required type="text" id="nom" name="nom" maxlength="50"/> <br>
                <span class="subtitle">Nom de famille</span> 
            </p>
        </div>
        <p class="nom-section">
            Contact *
        </p>
        <div class="flex-section">
            <p class="form-response">
                <input required type="email" id="email" name="email" maxlength="50"/> <br>
                <span class="subtitle">Courriel</span> 
            </p>
            <p class="form-response">
                <input required class="gray--text" type="tel" id="tel" name="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="555-555-1234"> <br>
                <span class="subtitle">Numéro de téléphone</span> 
            </p>
        </div>
        <div>
            <p class="nom-section">
                Méthode de contact privilégiée *
            </p>
            <p class="form-response">
                <select required name="contact">
                    <option value="">Veuillez choisir</option>
                    <option value="courriel">Par courriel</option>
                    <option value="telephone">Par téléphone</option>
                </select>
            </p>
        </div>
        <div>
            <p class="nom-section">
                Sujet *
            </p>
            <p class="form-response">
                <input required id="sujet" name="sujet" type="text" maxlength="50">
            </p>
        </div>
        <div>
            <p class="nom-section">
                Votre question *
            </p>
            <p class="form-response">
                <textarea required name="question" id="question" cols="30" rows="10" maxlength="250"></textarea>
                <span class="subtitle">250 caractères maximum autorisés</span> 
            </p>
        </div>
        <div>
            <p class="nom-section">
                J'autorise la compagnie à me contacter *
            </p>
            <input required type="radio" id="autorisation" name="autorisation" />
        </div>
        <div class="centered container">
            <!-- name est le parametre utilise pour savoir quoi executer dans merci.php -->
            <input class="nom-section btn-soumettre" type="submit" name="soumettre-question" id="soumettre-question" value="Soumettre" />
        </div>
    </form>
</div>
<br>
<hr>

<!-- ***Soumettre témoignages*** -->

<div class="gutter-desktop container">
    <h2>
        Soumettre un témoignage
    </h2>
    <form class="form-section" action="merci.php" autocomplete="off" method="post">
        <p class="nom-section">
            Votre identifiant client * <br>
        </p>
            <p class="form-response">
                <input required type="number" id="client_id" name="client_id" maxlength="10"/> <br>            
                <span class="subtitle">Numéros seulement</span> 
            </p>
        <div>
            <p class="nom-section">
                Votre témoignage *
            </p>
            <p class="form-response">
                <textarea required name="message" id="message" cols="30" rows="10" maxlength="400"></textarea>
                <span class="subtitle">400 caractères maximum autorisés</span> 
            </p>
        </div>
        <div>
            <p class="nom-section">
                J'autorise la compagnie à diffuser mon message sur cette page *
            </p>
            <input required type="radio" id="autorisation" name="autorisation" />
        </div>
        <div class="centered container">
            <!-- name est le parametre utilise pour savoir quoi executer dans merci.php -->
            <input class="nom-section btn-soumettre" type="submit" name="soumettre-temoignage" id="soumettre-temoignage" value="Soumettre" />
        </div>
    </form>
</div>

<?php
include("common/footer.html"); ?>
<script src="scripts/app.js"></script>
</body>
</html>