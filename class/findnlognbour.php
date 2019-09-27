<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>findallnlogboursier</title>
</head>
<body>
<?php
  include("EtudiantSerTest.php");
  $objet = new EtudiantSerTest();
  echo  '<table  id="example" class= "table table-striped table-bordered  style="width:100%">
      <thead> 
      <tr>
      <td>Id_etudiant </td>
      <td>Adresse</td>
      <td> Nom</td>
      <td>Prenom</td>
      <td>Tel</td>
      <td>Email </td>
      <td>Date_naissance</td>
      </tr>
      </thead>';

  foreach ($objet->FindAllnbnl() as $tab) {
    echo  '<tr>';
    echo  '<td>' . $tab['id_etudiant'] . '</td>';
    echo  '<td>' . $tab['adresse'] . '</td>';
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
</body>
</html>