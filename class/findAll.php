<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <title>Document</title>
</head>

<body>

  <div>
    <?php
    include("menu.html")
    ?>
  </div> <br> <br>
  <center>
    <h1 class="jumbotron"><i> Liste des etudiant </i></h1>
  </center>
  <?php
  include("EtudiantSerTest.php");
  $objet = new EtudiantSerTest();
  echo  '<table class= "table table-striped table-bordered  style="width:100%">
  <thead> 
  <tr>
  <td>Id_etudiant </td>
  <td> Nom</td>
  <td>Prenom</td>
  <td>Tel</td>
  <td>Email </td>
  <td>Date_naissance</td>
  </tr>
  </thead>';

  foreach ($objet->Find() as $tab) {
    echo  '<tr>';
    echo  '<td>' . $tab['id_etudiant'] . '</td>';
    echo  '<td>' . $tab['nom'] . '</td>';
    echo  '<td>' . $tab['prenom'] . '</td>';
    echo  '<td>' . $tab['tel'] . '</td>';
    echo  '<td>' . $tab['email'] . '</td>';
    echo  '<td>' . $tab['date_naissance'] . '</td>';
    echo  '</tr>';
  }
  echo  '</table>';
  ?>
</body>

</html>