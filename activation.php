<?php
        
$iduser  = $_GET["iduser"] ;
$sql = "UPDATE utilisateur
            SET 
      etat = 1
           WHERE iduser = '$iduser' " ;
           
            $requete = mysql_query($sql, $cnx) ;
             echo "<script>alert('le compte a ete activer ')</script>";
            echo "<script>window.open('index.php','_self')</script>"; 
            ?>