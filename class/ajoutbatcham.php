<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
    <?php
    include("menu.html")
    ?>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h4>
                <marquee behavior="horizontal" direction="horizontal"> <i> Veuillez ajouter les Batiments et les chambres </i></marquee>
            </h4>
            <div class="jumbotron">
                <form action="ajoutbatcham.php" method="post">
                    <div class="form-group">
                        <table class="">
                            <tr>
                                <td>
                                    <input type="radio" name="b" id="a">
                                </td>
                                <td>
                                    <label for=""> <i>Ajout chambre</i></label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="radio" name="b" id="b">
                                </td>
                                <td>
                                    <label for=""> <i>Ajout batiment </i></label><br>
                                </td>
                            </tr>
                        </table>
                        <label for="">Nom Chambre</label>
                        <input type="text" class="form-control" name="nom_chambre" placeholder="  Nom chambre" id="nomch">
                        <label for="">Batiment</label>
                        <input type="text" class="form-control" name="nom_batiment" placeholder="Batiment" id="nombat">
                        <label for="">Id_Batiment</label>
                        <Select name="id_batiment" class="form-control" placeholder="type" id="idbat" require>
                            <?php
                            include "connexion.php";
                            $BD = connexion();
                            foreach ($BD->query('SELECT * FROM  batiment') as $val) {
                                echo '<option value="' . $val['id_batiment'] . '">' . $val['nom_batiment'] . '</option>';
                            }
                            ?>
                        </select>
                        <br>
                        <button type="submit" name="ok" class="btn btn-secondary">Ajouter </button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            // appel des id 
            var bt1 = document.getElementById("a");
            var bt2 = document.getElementById("b");
            var nom_chambre = document.getElementById("nomch");
            var nom_batiment = document.getElementById("nombat");
            var id_Batiment = document.getElementById("idbat");
            // chambre
            bt1.onchange = function() {
                nom_chambre.disabled = false;
                nom_batiment.disabled = true;
                id_Batiment.disabled = false;
            }
            // batiment
            bt2.onchange = function() {
                nom_chambre.disabled = true;
                nom_batiment.disabled = false;
                id_Batiment.disabled = true;
            }
        </script>
</body>

</html>
<?php
include "batiment.php";
include "chambre.php";
require_once "connexion.php";
class ajoutbatcham
{
    public function add(batiment $bat)
    {
        $BD = connexion();
        // insertion dans batiment
        $requet = $BD->prepare("INSERT INTO `batiment`(`nom_batiment`)
            values(:nom_batiment)");
        $requet->bindValue(':nom_batiment', $bat->getNom_batiment(), PDO::PARAM_STR);
        $inserer = $requet->execute();
        if ($inserer) {
            echo "bien inserer dans la table batiment </br>";
        } else {
            echo "Erreur  d'insertion dans la table batiment </br> ";
        }
    }
    // insertion dans chambre
    public function addcham(chambre $cham)
    {
        $BD = connexion();
        $req = $BD->prepare("INSERT INTO `chambre`(`nom_chambre`, `id_batiment`)
        values(:nom_chambre ,:id_batiment)");
        $req->bindValue(':nom_chambre', $cham->getNom_chambre(), PDO::PARAM_STR);
        $req->bindValue(':id_batiment', $cham->getId_batiment(), PDO::PARAM_INT);
        $ins = $req->execute();
        if ($ins) {
            echo "bien inserer dans la table chambre </br>";
        } else {
            echo "Erreur  d'insertion dans la table chambre </br> ";
        }
    }
}
if (isset($_POST['ok']) && empty($_POST['nom_chambre']) && empty($_POST['id_batiment'])) {
    $nom_batiment = $_POST['nom_batiment'];
    $obj = new batiment($nom_batiment);
    $objet = new ajoutbatcham();
    $objet->add($obj);
}
if (isset($_POST['ok']) && empty($_POST['nom_batiment'])) {
    $nom_chambre = $_POST['nom_chambre'];
    $id_batiment = $_POST['id_batiment'];
    $ob = new chambre($nom_chambre, $id_batiment);
    $objt = new ajoutbatcham();
    $objt->addcham($ob);
}
?>