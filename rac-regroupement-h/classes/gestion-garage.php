<?php 
class GestionGarage {
    private $connection;

    public function __construct(DatabaseConnection $connection) {
        $this->connection = $connection->getConnection();
    }

    public function ajouterGarage(Garage $garage) {
        //Doit extraire les variables de l'objet, sinon :
        //Notice: Only variables should be passed by reference in ...
        
        try {
            $nom = $garage->get_nom();
            $ville = $garage->get_ville();
            $adresse = $garage->get_adresse();
            $telephone = $garage->get_telephone();

            $query = $this->connection->prepare('INSERT INTO assurance_auto.garages (nom, ville, adresse, numero_telephone) VALUES (?, ?, ?, ?)');
            $query->bind_param('ssss', $nom, $ville, $adresse, $telephone);
            $query->execute();            
            echo "<p> Added succesfully </p>
            <a href='/rac-regroupement-h/admin-page.php'>
                <button type='button'>Retour à l'admin</button>
            </a>
            ";
        } catch (Exception $e) {
            echo "There is an error: .$e";
        }
    }

    public function modifierGarage($id, Garage $garage) {
        //Doit extraire les variables de l'objet, sinon erreur suivante :
        //Notice: Only variables should be passed by reference in ...

        try {
            $nom = $garage->get_nom();
            $ville = $garage->get_ville();
            $adresse = $garage->get_adresse();
            $telephone = $garage->get_telephone();
            
            $query = $this->connection->prepare('UPDATE assurance_auto.garages SET nom = ?, ville = ?, adresse = ?, numero_telephone = ? WHERE (garage_id = ?)');

            $query->bind_param('ssssi', $nom, $ville, $adresse, $telephone, $id);
            $query->execute();
            echo "<p> Modified succesfully </p>
            <a href='/rac-regroupement-h/admin-page.php'>
                <button type='button'>Retour à l'admin</button>
            </a>
            ";
        } catch (Exception $e) {
            echo "There is an error: .$e";
        }
    }

    public function supprimerGarage($id) {
        try {
            $query = $this->connection->prepare('DELETE FROM assurance_auto.garages WHERE (garage_id = ?);');
            $query->bind_param('i', $id);
            $query->execute();            
            echo "<p> Deleted succesfully </p>
            <a href='/rac-regroupement-h/admin-page.php'>
                <button type='button'>Retour à l'admin</button>
            </a>
            ";
        } catch (Exception $e) {
            echo "There is an error: .$e";
        }
    }

    public function getGarages() {
        try {
            $result = $this->connection->query('SELECT * FROM assurance_auto.garages');
            return $result->fetch_all(MYSQLI_ASSOC);    
        } catch (Exception $e) {
            echo "There was an error : $e";
        }
    }
}

?>