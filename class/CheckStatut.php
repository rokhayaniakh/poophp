<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <title>Document</title>
    <style>
    </style>
</head>
<body>
    <?php
    include("menu.html");
    ?>
    </div> <br> <br>
    <center>
        <h1 class="jumbotron">Liste des Boursier logers</h1>
    </center>
    <?php
    include("FindAllbousloge.php");
    ?>
    <center>
        <h1 class="jumbotron">Liste des Boursier non_logers</h1>
    </center>
    <?php
    $objet = new EtudiantSerTest();
    echo  '<table class= "table table-striped table-bordered  style="width:100%">
    <thead> 
    <tr>
    <td>Id_etudiant </td>
    <td>Id_Pension</td>
    <td> Nom</td>
    <td>Prenom</td>
    <td>Tel</td>
    <td>Email </td>
    <td>Date_naissance</td>
    </tr>
    </thead>';
    foreach ($objet->FindAllbousnonlog() as $tab) {
        echo  '<tr>';
        echo  '<td>' . $tab['id_etudiant'] . '</td>';
        echo  '<td>' . $tab['id_pension'] . '</td>';
        echo  '<td>' . $tab['nom'] . '</td>';
        echo  '<td>' . $tab['prenom'] . '</td>';
        echo  '<td>' . $tab['tel'] . '</td>';
        echo  '<td>' . $tab['email'] . '</td>';
        echo  '<td>' . $tab['date_naissance'] . '</td>';
        echo  '</tr>';
    }
    echo  '</table>';
    ?>
    <center>
        <h1 class="jumbotron">Liste des non_logers</h1>
    </center>
    <?php
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
    foreach ($objet->FindAllnbnl() as $tab) {
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