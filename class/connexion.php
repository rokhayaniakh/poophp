<?php
function connexion(){
try{
   $BD=new PDO('mysql:host=localhost;dbname=POOPHP;charset=utf8','root','Niakh@261297');
   if($BD){
      // echo "bien connecter ";
      
   }
   }
   catch(PDOException $e){
       echo $e->getMessage();
    } 
 return $BD;
   }
?>
