<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
include ("EtudiantSerTest.php");
$objet =new EtudiantSerTest();
echo  '<table  id="example" class= "table table-striped table-bordered style="width:100%">
<thead> 
<tr>
<td>Id_Etudiant </td>
<td>Id_Chambre</td>
<td>Nom Chambre</td>
<td>Nom Batiment</td>
<td> Id_Pension</td>
<td>Type</td>
<td>Nom</td>
<td>Prenom</td>
<td>Tel</td>
<td>Email</td>
<td>Date_Naissance</td>
</tr>
</thead>';
foreach($objet-> FindAllbousloge() as $tab){
    echo  '<tr>';
    echo  '<td>' . $tab['id_etudiant'] . '</td>';
    echo  '<td>' . $tab['id_chambre'] . '</td>';
    echo  '<td>' . $tab['nom_chambre'] . '</td>';
    echo  '<td>' . $tab['nom_batiment'] . '</td>';
    echo  '<td>' . $tab['id_pension'] . '</td>';
    echo  '<td>' . $tab['type'] . '</td>';
    echo  '<td>' . $tab['nom'] . '</td>';
    echo  '<td>' . $tab['prenom'] . '</td>';
    echo  '<td>' . $tab['tel'] . '</td>';
    echo  '<td>' . $tab['email'] . '</td>';
    echo  '<td>' . $tab['date_naissance'] . '</td>';
    echo  '</tr>';
}
    echo  '</table>';

?>