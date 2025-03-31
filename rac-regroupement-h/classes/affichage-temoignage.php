<?php 

class AffichageTemoignage {
    private $gestionTem;

    public function __construct(GestionTemoignage $gestionTem) {
        $this->gestionTem = $gestionTem;
    }

    public function displayTemoignages() {
        $temoignages = $this->gestionTem->getTemoignages();
        foreach ($temoignages as $temoignage) {
            echo '
            <hr>
            <form method="POST" action="handle-temoignage.php">
                <div class="container">
                    Identifiant témoignage : '.$temoignage["id"].' <br><br>
                    Témoignage : <br> <em>'.$temoignage["temoignage"].'</em> <br><br>
                  <input type="hidden" name="id" value="'.$temoignage["id"].'">
                  <input type="submit" name="submit" id="submit'.$temoignage["id"].'" value="Gérer">
                </div>
            </form>' ;
            echo' 
            <br><hr>';
        }        
    }

    public function displayTemoignage($id_tem) {
        $temoignage = $this->gestionTem->getTemoignage($id_tem);
        echo '<form id="handleTemoignage" onsubmit="submitForm(event);">
        <div class="container">
            Identifiant témoignage : '.$id_tem.' <br><br>
            Témoignage : <br><br> <em>'.$temoignage["temoignage"].'</em> <br><br>            
            <select id="action_tem" name="action_tem" required>
                <option value="">Veuillez choisir</option>
                <option value="approved" id="approuved">Approuver</option>
                <option value="declined" id="rejected">Rejeter</option>
            </select>
            <br><br>
            <input type="hidden" name="id" value="'.$id_tem.'">
            <input type="submit" name="submit_tem" id="submit_tem" value="Soumettre">
        </div>
    </form>';
    }

    public function displayCarrousel($resultat) {
        try {
            $index = 0;
            echo '<ul class="container-slider">';
            
            //si c'est le premier temoignage à être affiché, attribuer la class active afin qu'il s'affiche dans le carrousel
                foreach ($resultat as $temoignage) {
                    if ($index === 0) {
                        echo '<li class="active">';
                    } else {
                        echo '<li>';
                    }
                        echo $temoignage["temoignage"]; 
                    echo '</li>';
                    $index++;
                }
            echo '</ul>';
        } catch (Exception $e) {
            echo "There is an error $e";
        }

    }
}

?>