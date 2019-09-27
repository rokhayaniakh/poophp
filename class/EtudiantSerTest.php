<?php
require_once "connexion.php";
class EtudiantSerTest
{
    public function add(Etudiant $etudiant)
    {
        $BD = connexion();
        $requet = $BD->prepare("INSERT INTO `etudiant`(`nom`, `prenom`, `tel`, `email`, `date_naissance`)
            values(:nom, :prenom, :tel, :email, :date_naissance)");
        $requet->bindValue(':nom', $etudiant->getNom(), PDO::PARAM_STR);
        $requet->bindValue(':prenom', $etudiant->getPrenom(), PDO::PARAM_STR);
        $requet->bindValue(':tel', $etudiant->getTel(), PDO::PARAM_INT);
        $requet->bindValue(':email', $etudiant->getEmail(), PDO::PARAM_STR);
        $requet->bindValue(':date_naissance', $etudiant->getDate_naissance());
        $inserer = $requet->execute();
        if ($inserer) {
            echo "bien inserer dans la table etudiant </br>";
        } else {
            echo "Erreur  d'insertion dans la table etudiant </br> ";
        }
        // recupération  d l'id du dernier etudiant
        $requette = $BD->query("SELECT MAX(id_etudiant) AS id FROM etudiant");
        while ($der = $requette->fetch()) {
            $id = $der["id"];
        }
        // ajout non_loge
        if (get_class($etudiant) == 'non_loge') {
            $requette = $BD->prepare("INSERT INTO non_loge( adresse ,id_etudiant)
        values(:adresse ,:id_etudiant )");
            $requette->bindValue(':id_etudiant', $id);
            $requette->bindValue(':adresse', $etudiant->getAdresse());
            $insere = $requette->execute();
            if ($insere) {
                echo "bien inserer dans la table non_loge </br>";
            } else {
                echo "Erreur d'insertion dans la table  non_loge </br>";
            }
        } 
        // ajout boursier
        else  if (get_class($etudiant) == 'Boursier') {
            $re = $BD->prepare("INSERT INTO boursier (id_etudiant,id_pension)
            values (:id_etudiant,:id_pension)");
            $re->bindValue(':id_etudiant', $id);
            $re->bindValue(':id_pension', $etudiant->getId_pension());
            $in = $re->execute();
            if ($in) {
                echo "bien inserer dans la table boursier !!! </br>";
            } else {
                echo "Erreur d'insertion dans la table boursier !!! </br>";
            }
        } else if (get_class($etudiant) == 'et_loge') {
            $req = $BD->prepare("INSERT INTO et_loge(id_etudiant,nom_chambre)
        values (:id_etudiant,:nom_chambre)");
            $req->bindValue(':id_etudiant', $id);
            $req->bindValue(':nom_chambre', $etudiant->getNom_chambre());
            $ins = $req->execute();
            if ($ins) {
                echo "bien inserer dans la table loge !!! </br>";
            } else {
                echo "Erreur d'insertion dans la table loge !!! </br>";
            }
        }
    }
    // retrouver un etudiant
    public function Find()
    {
        $BD = connexion();
        $retr = $BD->query("SELECT * FROM etudiant ");
        $etu = [];
        while ($tab = $retr->fetch()) {
            $etu[] = $tab;
        }
        return $etu;
    }
    // liste tous les etudiants
    public function FindAll()
    {
        $BD = connexion();
        $sql = $BD->query("SELECT  * FROM  etudiant ");
        $etud = [];
        while ($data = $sql->fetch()) {
            $etud[] = $data;
        }
        return $etud;
    }
    // lister tous les non_loger
    public function Findallnonloge()
    {
        $BD = connexion();
        $nl = $BD->query("SELECT * FROM etudiant,non_loge WHERE etudiant.id_etudiant=non_loge.id_etudiant ");
        $etunlog = [];
        while ($tab = $nl->fetch()) {
            $etunlog[] = $tab;
        }
        return $etunlog;
    }
    // lister tous les etudiants loger
    public function FindAlloge()
    {
        $BD = connexion();
        $nl = $BD->query("SELECT * FROM etudiant,et_loge WHERE etudiant.id_etudiant=et_loge.id_etudiant ");
        $etulog = [];
        while ($ta = $nl->fetch()) {
            $etulog[] = $ta;
        }
        return $etulog;
    }

    public function FindAllBoursier()
    {
        $BD = connexion();
        $nl = $BD->query("SELECT * FROM etudiant,boursier WHERE etudiant.id_etudiant=boursier.id_etudiant ");
        $etulog = [];
        while ($ta = $nl->fetch()) {
            $etulog[] = $ta;
        }
        return $etulog;
    }

    // lister tous les boursiers loger
    public function FindAllbousloge()
    {
        $BD = connexion();
        $ebl = $BD->query("SELECT DISTINCT etudiant.id_etudiant,etudiant.nom ,etudiant.prenom,etudiant.tel,etudiant.email,etudiant.date_naissance,boursier.id_pension,et_loge.id_chambre,pension.type,batiment.nom_batiment,chambre.nom_chambre 
        FROM boursier,et_loge ,etudiant ,pension,batiment,chambre WHERE 
        boursier.id_etudiant=et_loge.id_etudiant AND
        etudiant.id_etudiant=et_loge.id_etudiant AND
        boursier.id_pension=pension.id_pension AND et_loge.id_chambre=chambre.id_chambre AND 
        chambre.id_batiment=batiment.id_batiment ");
        $etubl = [];
        while ($bl = $ebl->fetch()) {
            $etubl[] = $bl;
        }
        return $etubl;
    }
    // lister tous les boursiers non_loger
    public function FindAllbousnonlog()
    {
        $BD = connexion();
        $nl = $BD->query("SELECT * FROM boursier,non_loge ,etudiant ,pension WHERE
        boursier.id_etudiant=non_loge.id_etudiant  AND
        etudiant.id_etudiant=non_loge.id_etudiant AND
        boursier.id_pension=pension.id_pension");
        $bnl = [];
        while ($tab = $nl->fetch()) {
            $bnl[] = $tab;
        }
        return $bnl;
    }
    public function FindAllnbnl()
    {
        $BD = connexion();
        $nl = $BD->query("SELECT DISTINCT etudiant.id_etudiant, etudiant.nom,etudiant.prenom,etudiant.tel,etudiant.email,etudiant.date_naissance,non_loge.adresse FROM
        etudiant,non_loge ,boursier WHERE 
        etudiant.id_etudiant=non_loge.id_etudiant AND
        non_loge.id_etudiant!=boursier.id_etudiant
        ");
        $bnl = [];
        while ($tab = $nl->fetch()) {
            $bnl[] = $tab;
        }
        return $bnl;
    }
}
