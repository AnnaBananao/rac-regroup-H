<?php 
class GestionTemoignage {
    private $connection;
//addtrycatch

    public function __construct(DatabaseConnection $connection) {
        $this->connection = $connection->getConnection();
    }

    public function getNumberOfTemoignages() {
        $query = 'SELECT * FROM assurance_auto.temoignages WHERE statut_approbation = "pending"';
        $run_query = mysqli_query($this->connection, $query);
        $total = mysqli_num_rows($run_query);
        return $total;
    }

    public function getTemoignages() {
        $result = $this->connection->query('SELECT * FROM assurance_auto.temoignages WHERE statut_approbation = "pending"');
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTemoignage($id_tem) {
        $query = $this->connection->prepare("SELECT temoignage from assurance_auto.temoignages WHERE id = ?");
        $query->bind_param('i', $id_tem);
        $query->execute();
        $result = $query->get_result();
        return $result->fetch_assoc();
    }

    public function ajouterTemoignage(Temoignage $temoignage) {
        $message = $temoignage->get_message();
        
        try {
        $query = $this->connection->prepare('INSERT INTO assurance_auto.temoignages (temoignage) VALUES (?)');
        $query->bind_param('s', $message);
        $query->execute();
        echo '<p class="container">Merci pour votre temoignage <i class="fa-regular fa-face-smile"><i></p>';
        } catch (Exception $e) {
            //message erreur plus propre, puisque montre au client
            echo "Une erreur non spécifiée s'est produite. Veuillez réessayer ou contacter le support technique. Nous sommes désolé de l'inconvénient.";
        }
    }

    public function getCarrousel() {
        try {
            $result = $this->connection->query("SELECT * FROM assurance_auto.temoignages WHERE statut_approbation = 'approuved' ORDER BY date_creation DESC LIMIT 4");
            return $result->fetch_all(MYSQLI_ASSOC);    
        } catch (Exception $e) {
            echo "There was an error : $e";
        }
    }
}

?>