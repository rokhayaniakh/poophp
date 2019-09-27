<?php
class chambre{
    private $id_batiment;
    private $nom_chambre;  
    public function __construct($nom_chambre="" ,$id_batiment="")
    {
    $this->nom_chambre =$nom_chambre;
    $this->id_batiment =$id_batiment;

    }  
    /**
     * Get the value of id_batiment
     */ 
    public function getId_batiment()
    {
        return $this->id_batiment;
    }

    /**
     * Set the value of id_batiment
     *
     * @return  self
     */ 
    public function setId_batiment($id_batiment)
    {
        $this->id_batiment = $id_batiment;

        return $this;
    }

    /**
     * Get the value of nom_chambre
     */ 
    public function getNom_chambre()
    {
        return $this->nom_chambre;
    }

    /**
     * Set the value of nom_chambre
     *
     * @return  self
     */ 
    public function setNom_chambre($nom_chambre)
    {
        $this->nom_chambre = $nom_chambre;

        return $this;
    }
}
?>