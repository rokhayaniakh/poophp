<?php
//   include("Etudiant.php");
class Boursier extends Etudiant
{
   private $id_pension;

   public function __construct($nom = "", $prenom = "", $tel = "", $email = "", $date_naissance = "", $id_pension = "")
   {
      parent::__construct($nom, $prenom, $tel, $email, $date_naissance);
      $this->id_pension = $id_pension;
   }
 
   
   public function infoetudiant()
   {
      return parent::infoetudiant() ."". $this->id_pension;
   }

   /**
    * Get the value of id_pension
    */ 
   public function getId_pension()
   {
      return $this->id_pension;
   }

   /**
    * Set the value of id_pension
    *
    * @return  self
    */ 
   public function setId_pension($id_pension)
   {
      $this->id_pension = $id_pension;

      return $this;
   }
}

