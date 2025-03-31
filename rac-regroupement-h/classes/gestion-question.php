<?php 

class GestionQuestion {
    private $connection;

    public function __construct(DatabaseConnection $connection) {
        $this->connection = $connection->getConnection();
    }

    public function ajouterQuestion(Question $question) {
        //Doit extraire les variables de l'objet, sinon :
        //Notice: Only variables should be passed by reference in ...
        
        try {
            $nom = $question->get_nom();
            $prenom = $question->get_prenom();
            $courriel = $question->get_courriel();
            $telephone = $question->get_telephone();
            $contact = $question->get_contact();
            $sujet = $question->get_sujet();
            $question = $question->get_question();

            $query = $this->connection->prepare('INSERT INTO assurance_auto.questions (nom, prenom, courriel, telephone, method_contact, sujet, question) VALUES (?, ?, ?, ?, ?, ?, ?)');
            
            $query->bind_param('sssssss', $nom, $prenom, $courriel, $telephone, $contact, $sujet, $question);
            $query->execute();
            echo '<p class="container">Merci pour votre question <i class="fa-regular fa-face-smile"></i><br><br>
                    Un agent vous contactera sous peu.</p>';

        } catch (Exception $e) {
            //message erreur + beau, puisque montre au client
            echo "Une erreur non spécifiée s'est produite. Veuillez réessayer ou contacter le support technique. Nous sommes désolé de l'inconvénient.";
        }
    }

    public function getQuestions() {
        $result = $this->connection->query('SELECT * FROM assurance_auto.questions WHERE statut_question = "pending"');
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNumberOfQuestions() {
        try {
            $query = 'SELECT * FROM assurance_auto.questions WHERE statut_question = "pending"';
            $run_query = mysqli_query($this->connection, $query);
            $total = mysqli_num_rows($run_query);
            return $total;
        } catch (Exception $e) {
            echo "There is an error $e";
        }
    }
}

?>