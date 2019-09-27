<?php
    class Etudiant{
    private $id_etudiant;
    private $nom;
    private $prenom;
    private $tel;
    private $email;
    private $date_naissance;

    public function __construct($nom="",$prenom="",$tel="",$email="",$date_naissance=""){
//$this->id_etudiant=$id_etudiant;
$this->nom=$nom;
$this->prenom=$prenom;
$this->tel= $tel;
$this->email=$email;
$this->date_naissance=$date_naissance;

    }
    
// les setters
    // public function setId_etudiant($id_etudiant){
    //     $idetudiant=(int)$id_etudiant;
    //     if($id_etudiant>0){
    //      $this->id_etudiant=$id_etudiant;
    //     }
    // }
    public function setNom($nom){
        if(is_string($nom)){
         $this->nom=$nom;
        }
    }
    public function setPrenom($prenom){
        if(is_string($prenom)){
         $this->prenom=$prenom;
        }
    }
    public function setTel($tel){
$tel=(int)$tel;
        if($tel>0){
         $this->tel=$tel;
        }
    }
    public function setEmail($email){
        if(is_string($email)){
         $this->email=$email;
        }
    }
    public function setDate_naissance($date_naissance){
        $datenaissance=(int)$date_naissance;
         $this->date_naissance=$date_naissance;
    }
    // les getters
    
    public function getNom(){
        return $this->nom;

    }
    public function getPrenom(){
        return $this->prenom;

    }
    public function getTel(){
        return $this->tel;

    }
    public function getEmail(){
        return $this->email;

    }
    public function getDate_naissance(){
        return $this->date_naissance;

    }
     public function infoetudiant(){
         return $this->id_etudiant.",". $this->nom.",". $this->prenom.",". $this->tel.",". $this->email.",".$this->date_naissance;
     }
}
// $etudiant1 =new Etudiant;
// $etudiant1->setId_etudiant(2);
// $etudiant2 =new Etudiant;
// $etudiant2->setId_etudiant(1);
// echo"le matricule de l'etudiant 1 est : " .$etudiant1->getId_etudiant() ."</br>";
// echo"le matricule de l'etudiant 2 est : " .$etudiant2->getId_etudiant();
