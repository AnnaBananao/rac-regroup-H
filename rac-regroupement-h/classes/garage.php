<?php
class Garage {
    private $nom;
    private $ville;
    private $adresse;
    private $telephone;

    function __construct($nom, $ville, $adresse, $telephone)
    {
        $this->nom = $nom;
        $this->ville = $ville;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
    }
        
    public function set_model($nom) {
        $this->nom = $nom;
    }

    public function get_nom() {
        return $this->nom;
    }

    public function set_ville($ville) {
        $this->ville = $ville;
    }

    public function get_ville() {
        return $this->ville;
    }

    public function set_adresse($adresse) {
        $this->adresse = $adresse;
    }

    public function get_adresse() {
        return $this->adresse;
    }

    public function set_telephone($telephone) {
        $this->telephone = $telephone;
    }

    public function get_telephone() {
        return $this->telephone;
    }
 } 
?>