<?php
class Question {
    private $nom;
    private $prenom;
    private $courriel;
    private $telephone;
    private $contact;
    private $sujet;
    private $question;

    function __construct($nom, $prenom, $courriel, $telephone, $contact, $sujet, $question)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->courriel = $courriel;
        $this->telephone = $telephone;
        $this->contact = $contact;
        $this->sujet = $sujet;
        $this->question = $question;
    }
        
    public function set_nom($nom) {
        $this->nom = $nom;
    }

    public function get_nom() {
        return $this->nom;
    }

    public function set_prenom($prenom) {
        $this->prenom = $prenom;
    }

    public function get_prenom() {
        return $this->prenom;
    }

    public function set_courriel($courriel) {
        $this->courriel = $courriel;
    }

    public function get_courriel() {
        return $this->courriel;
    }

    public function set_telephone($telephone) {
        $this->telephone = $telephone;
    }

    public function get_telephone() {
        return $this->telephone;
    }

    public function set_contact($contact) {
        $this->contact = $contact;
    }

    public function get_contact() {
        return $this->contact;
    }

    public function set_sujet($sujet) {
        $this->sujet = $sujet;
    }

    public function get_sujet() {
        return $this->sujet;
    }

    public function set_question($question) {
        $this->question = $question;
    }

    public function get_question() {
        return $this->question;
    }
 } 
?>