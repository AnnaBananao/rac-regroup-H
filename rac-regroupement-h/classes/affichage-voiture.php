<?php 

class AffichageVoiture {
    private $connection;

    public function __construct(DatabaseConnection $connection) {
        $this->connection = $connection->getConnection();
    }


//boucle pour afficher les images dans des cards responsive
//si l'image n'est pas dispo dans la banque d'images, image coming soon
    public function displayVoitures($resultat) {
        echo '    
        <div class="container centered flex-card-section">
            <div class="cards">
        ';
        while($row = $resultat->fetch_assoc()) {
            echo' 
                <div class="card">
                    <div class="card-header">
                        <p class="protection-name">'.$row["model"].'</p>
                    </div>
                    <div class="card-bottom">
                        <p class="protection-specifics">
                            <span class="price bold">'.$row["annee"].'</span><br><br>';
            if($row["image_chemin"] === null) {
                    echo '<img src="img\cars\AVenir.jpg" alt="Photo à venir">';
            } else {
                    echo '<img src="img/cars/'.$row["image_chemin"].'" alt="'.$row["model"].', '.$row["annee"].'"';
            }
            echo '
                        </p>
                    </div>
                </div>';
        }
        echo '</div>';
    }
}

?>