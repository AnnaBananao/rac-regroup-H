<?php 
class RechercheVoiture {
    private $connection;

    public function __construct(DatabaseConnection $connection) {
        $this->connection = $connection->getConnection();
    }

    public function chercherManufacturiers() {
    $resultats = [];

        try {
            $query = "SELECT DISTINCT manufacturier FROM assurance_auto.automobiles ORDER BY manufacturier ASC";
            $result = $this->connection->query($query);
            
            if($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $resultats[] = $row;
                }
            }
            }  catch (Exception $e) {
            echo "There in an error $e";
        }

    return $resultats;
    }

    public function getSearchResultsWithYears($manufacturier, $yearsList) {
        try {
            $query = "SELECT model, annee, image_chemin FROM assurance_auto.automobiles WHERE manufacturier = '$manufacturier' AND annee IN ($yearsList) ORDER BY annee DESC";
            $result = $this->connection->query($query);
            return $result;
        } catch (Exception $e) {
            echo "Il y a une erreur, veuillez ressayer";
        }
    }
    
    public function getSearchResultsWithoutYears($manufacturier) {
        try {
            $query = "SELECT model, annee, image_chemin FROM assurance_auto.automobiles WHERE manufacturier = '$manufacturier' ORDER BY annee DESC";
            $result = $this->connection->query($query);
            return $result;
        } catch (Exception $e) {
            echo "Il y a une erreur, veuillez ressayer";
        }
    }
}
?>