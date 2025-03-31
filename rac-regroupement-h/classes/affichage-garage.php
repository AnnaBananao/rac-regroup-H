<?php 

class AffichageGarage {
    private $gestionGarage;

    public function __construct(GestionGarage $gestionGarage) {
        $this->gestionGarage = $gestionGarage;
    }

    public function displayGarages() {
        $garages = $this->gestionGarage->getGarages();
        foreach ($garages as $garage) {
            echo '
            <hr>
            <div class="container">
                <p class="bold">Identifiant garage: '.$garage["garage_id"].' </p> <br>
                <p class="bold">Nom :</p> '.$garage["nom"].'<br><br>
                <p class="bold">Ville :</p> '.$garage["ville"].' <br><br>
                <p class="bold">Adresse :</p> '.$garage["adresse"].' <br><br>
                <p class="bold">Téléphone :</p> '.$garage["numero_telephone"].' <br><br>
            </div>
            <br><hr>';
        }        
    }
}

?>