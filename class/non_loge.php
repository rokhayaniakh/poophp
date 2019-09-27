<?php
class non_loge extends Etudiant{
    private $adresse;
    public function __construct($nom="",$prenom="",$tel="",$email="",$date_naissance="",$adresse="")
    {
        parent::__construct($nom,$prenom,$tel,$email,$date_naissance);
        $this->adresse=$adresse;
    }
    public function getAdresse(){
         return $this->adresse;
       }
   public function setAdresse($adresse){
        $this->adresse=$adresse;
   }
   public function infoetudiant()
{
  return parent:: infoetudiant() ."".$this->adresse;
}
}
