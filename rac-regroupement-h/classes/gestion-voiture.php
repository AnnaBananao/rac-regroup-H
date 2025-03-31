<?php 
//CLEAN QUERYS SO GOOD DB
class GestionVoiture {
    private $connection;

    public function __construct(DatabaseConnection $connection) {
        $this->connection = $connection->getConnection();
    }

    public function ajouterVoiture(Voiture $voiture) {
        //Doit extraire les variables de l'objet, sinon :
        //Notice: Only variables should be passed by reference in ...
        //remonter finally just mettre bouton retour a l\admin
        try {
            $annee = $voiture->get_annee();
            $manufacturier = $voiture->get_manufacturier();
            $model = $voiture->get_model();
            $img = $voiture->get_img();

            $query = $this->connection->prepare('INSERT INTO assurance_auto.automobilestest (annee, manufacturier, model, image_chemin) VALUES (?, ?, ?, ?)');
            $query->bind_param('isss', $annee, $manufacturier, $model, $img);
            $query->execute();
        } catch (Exception $e) {
            echo "There is an error: .$e";
        }
        finally {
            echo "<p> Added succesfully </p>
            <a href='/rac-regroupement-h/admin-page.php'>
                <button type='button'>Retour à l'admin</button>
            </a>
            ";
        }
    }

    public function modifierVoiture($id, Voiture $voiture) {
        //Doit extraire les variables de l'objet, sinon erreur suivante :
        //Notice: Only variables should be passed by reference in ...

        try {
            $annee = $voiture->get_annee();
            $manufacturier = $voiture->get_manufacturier();
            $model = $voiture->get_model();
            $img = $voiture->get_img();

            $query = $this->connection->prepare('UPDATE assurance_auto.automobilestest SET annee = ?, manufacturier = ?, model = ?, image_chemin = ? WHERE (auto_id = ?)');

            $query->bind_param('isssi', $annee, $manufacturier, $model, $img, $id);
            $query->execute();
        } catch (Exception $e) {
            echo "There is an error: .$e";
        }
        finally {
            echo "<p> Modified succesfully </p>
            <a href='/rac-regroupement-h/admin-page.php'>
                <button type='button'>Retour à l'admin</button>
            </a>
            ";
        }
    }

    public function supprimerVoiture($id) {
        try {
            $query = $this->connection->prepare('DELETE FROM assurance_auto.automobilestest WHERE (auto_id = ?);');
            $query->bind_param('i', $id);
            $query->execute();
        } catch (Exception $e) {
            echo "There is an error: .$e";
        } 
        finally {
            echo "<p> Deleted succesfully </p>
            <a href='/rac-regroupement-h/admin-page.php'>
                <button type='button'>Retour à l'admin</button>
            </a>
            ";
        }
    }
}

?>