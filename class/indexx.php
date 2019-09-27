<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>formulaire ajout etudiant</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>

  <?php
  include("../class/menu.html")
  ?>

  <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <center>
        <h2><i> AJOUTER UN ETUDIANT</i> </h2>
      </center>
      <div class="jumbotron">
        <form action="indexx.php" method="post">
          <div class="form-group">
            <label for="">Nom</label>
            <input type="text" class="form-control" name="nom" placeholder="Nom" id="nom">
            <label for="">Prenom</label>
            <input type="text" class="form-control" required name="prenom" placeholder="Prenom" id="prenom">
            <label for="">Téléphone</label>
            <input type="number" class="form-control" required name="tel" placeholder="Tel" id="tel">
            <label for="">Email</label>
            <input type="text" class="form-control" required name="email" placeholder="Email" id="mail">
            <label for="">date_naissance</label>
            <input type="date" class="form-control" required name="date_naissance" placeholder="date_naissance" id="date" />
            <table class="">
              <tr>
                <td>
                  <input type="radio" name="b" id="a">
                </td>
                <td>
                  <label for="a"><i> Boursier </i></label>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="radio" name="b" id="b">
                </td>
                <td>
                  <label for="b"> <i> Non_Boursier </i></label><br>
                </td>
              </tr>
            </table>
            <label for="">Type de Bourse</label>
            <Select name="id_pension" class="form-control" placeholder="type" id="pen">
              <?php
              include "connexion.php";
              $BD = connexion();
              foreach ($BD->query('SELECT * FROM  pension') as $val) {
                echo '<option value="' . $val['id_pension'] . '">' . $val['type'] . '</option>';
              }
              ?>
            </select>
            <table class="">
              <tr>
                <td>
                  <input type="radio" name="" id="c">
                </td>
                <td>
                  <label for="c"> <i>loge </i></label>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="radio" name="ss" id="d">
                </td>
                <td>
                  <label for="d"><i> Non_loge </i></label><br>
                </td>
              </tr>
            </table>
            <label for="">Adresse</label>
            <input type="text" class="form-control" require name="adresse" placeholder="Adresse" id="e">
            <label for="">Numéro Chambre</label>
            <input type="text" class="form-control" require name="nom_chambre" placeholder="numéro chambre" id="g">
            <label for="">Batiment</label>
            <input type="text" class="form-control" require name="" placeholder="Batiment" id="f">
            <br>
            <button type="submit" name="ok" class="btn btn-secondary">Ajouter </button>
          </div>
        </form>
      </div>
    </div>
</body>

</html>
<script>
  //--------appel des Id
  var boursier = document.getElementById("a");
  var non_boursier = document.getElementById("b");
  var pansion = document.getElementById("pen");
  var loge = document.getElementById("c");
  var non_loger = document.getElementById("d");
  var chambre = document.getElementById("g");
  var batiment = document.getElementById("f");
  var adresse = document.getElementById("e");
  //------------------------------------
  boursier.onchange = function() {
    pansion.disabled = false;
    chambre.disabled = false;
    batiment.disabled = false;
    adresse.disabled = false;
    loge.disabled = false;
    non_loger.disabled = false;
  }
  loge.onchange = function() {
    chambre.disabled = false;
    batiment.disabled = false;
    adresse.disabled = true;
  }
  non_loger.onchange = function() {
    chambre.disabled = true;
    batiment.disabled = true;
    adresse.disabled = false;
  }
  non_boursier.onchange = function() {
    pansion.disabled = true;
    chambre.disabled = true;
    batiment.disabled = true;
    adresse.disabled = false;
    loge.disabled = true;
    non_loger.disabled = false;
  }
</script>
<?php
include "Etudiant.php";
include "Boursier.php";
include "et_loge.php";
include "non_loge.php";
include "EtudiantSerTest.php";
// ajout non_loge 
if (isset($_POST['ok']) && $_POST['adresse'] != "") {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $tel = $_POST['tel'];
  $email = $_POST['email'];
  $date_naissance = $_POST['date_naissance'];
  $adresse = $_POST['adresse'];
  $objet = new EtudiantSerTest();
  $obj = new non_loge($nom, $prenom, $tel, $email, $date_naissance, $adresse);
  $objet->add($obj);
} 
  // ajout boursier
  if (isset($_POST['ok']) && $_POST['id_pension'] != "") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $date_naissance = $_POST['date_naissance'];
    $id_pension = $_POST['id_pension'];
    $bou = new  Boursier($nom, $prenom, $tel, $email, $date_naissance, $id_pension );
    $bours = new EtudiantSerTest();
    $bours->add($bou);
  } 
    // ajout loger
    if (isset($_POST['ok'])) {
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $tel = $_POST['tel'];
      $email = $_POST['email'];
      $date_naissance = $_POST['date_naissance'];
      $id_pension = $_POST['id_pension'];
      $nom_chambre = $_POST['nom_chambre'];
      $et = new et_loge($nom, $prenom, $tel, $email, $date_naissance, $id_pension, $nom_chambre);
      $tes = new EtudiantSerTest();
      $tes->add($et);
    }
?>