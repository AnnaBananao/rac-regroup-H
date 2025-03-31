<?php 

class AffichageQuestion {
    private $gestionQuestion;

    public function __construct(GestionQuestion $gestionQuestion) {
        $this->gestionQuestion = $gestionQuestion;
    }

    public function displayQuestions() {
        $questions = $this->gestionQuestion->getQuestions();
        foreach ($questions as $question) {
            echo '
            <hr>
            <form id="handleQuestion" onsubmit="submitForm(event);">
                <div class="container">
                    <span class="bold">Identifiant question</span> : '.$question["id"].' <br><br>
                    <span class="bold">Prénom et nom :</span> '.$question["prenom"].' '.$question["nom"].'<br><br>
                    <span class="bold">Méthode de contact privilégiée :</span> '.$question["method_contact"].' <br><br>
                    <span class="bold">Courriel :</span> '.$question["courriel"].' <br><br>
                    <span class="bold">Téléphone :</span> '.$question["telephone"].' <br><br>
                    <span class="bold">Sujet :</span> '.$question["sujet"].' <br><br>
                    <span class="bold">Question :</span> <br> <em>'.$question["question"].'</em> <br><br>
                  <input type="hidden" name="id" value="'.$question["id"].'">
                  <input type="submit" name="submit" id="submit'.$question["id"].'" value="Marquer cette question comme répondue">
                </div>
            </form>
            <br><hr>';
        }        
    }
}

?>