<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>findnonloger</title>
</head>
<body>
<?php
            include ("menu.html")
        ?>
    </div> <br> <br>

    <center><h1 class="jumbotron"><i> Rechercher les non_logers </i></h1></center>
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

  foreach ($objet->Findallnonloge() as $tab) {
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
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
</body>
</html>