<?php
class Voiture {
    private $model;
    private $manufacturier;
    private $annee;
    private $img;

    function __construct($model, $manufacturier, $annee, $img)
    {
        $this->model = $model;
        $this->manufacturier = $manufacturier;
        $this->annee = $annee;
        $this->img = $img;
    }
        
    public function set_model($model) {
        $this->model = $model;
    }

    public function get_model() {
        return $this->model;
    }

    public function set_manufacturier($manufacturier) {
        $this->manufacturier = $manufacturier;
    }

    public function get_manufacturier() {
        return $this->manufacturier;
    }

    public function set_annee($annee) {
        $this->annee = $annee;
    }

    public function get_annee() {
        return $this->annee;
    }

    public function set_img($img) {
        $this->img = $img;
    }

    public function get_img() {
        return $this->img;
    }
 } 
?>