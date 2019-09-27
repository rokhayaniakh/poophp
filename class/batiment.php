<?php
class batiment{
    private $id_batiment;
    private $nom_batiment;
    public function __construct($nom_batiment=""){
        $this->nom_batiment=$nom_batiment;
    }
    /**
     * Get the value of nom_batiment
     */ 
    public function getNom_batiment()
    {
        return $this->nom_batiment;
    }

    /**
     * Set the value of nom_batiment
     *
     * @return  self
     */ 
    public function setNom_batiment($nom_batiment)
    {
        $this->nom_batiment = $nom_batiment;

        return $this;
    }
}
?>