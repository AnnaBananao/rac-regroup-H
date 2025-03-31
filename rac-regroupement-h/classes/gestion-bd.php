<?php 

class GestionBD {
    private $connection;

    public function __construct(DatabaseConnection $connection) {
        $this->connection = $connection->getConnection();
    }

    public function validerSiIdExist($id, $nomBD, $nomColonne) {
        //avant de faire une manipulation, verifie si la donnée avec id correspondant exist
        $idExist = false;
        
        try {
            $stmt = "SELECT 1 FROM $nomBD WHERE $nomColonne = ? LIMIT 1";
            $query = $this->connection->prepare($stmt);
            $query->bind_param('i', $id);
            $query->execute();
            $query->store_result();
            if ($query->num_rows > 0) {
                $idExist = true;
            }
        } catch (Exception $e) {
            echo "There is an error: .$e";
        }
        finally {
            return $idExist;
        }
    }
}

?>