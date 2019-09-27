<?php
//  include("boursier.php");
class et_loge extends Boursier
{
   private $id_chambre;
   public function __construct( $nom ="", $prenom="", $tel="", $email="", $date_naissance="",$id_pension="", $id_chambre="" )
   {
      parent::__construct($id_pension);
      $this->id_chambre = $id_chambre;
   }
   public function getId_chambre()
   {
      return $this->id_chambre;
   }
   public function setId_chambre($id_chambre)
   {
      $this->id_chambre = $id_chambre;
   }
}
