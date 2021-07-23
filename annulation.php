<?php
		$cnx = @mysql_connect( "localhost", "root", "" ) ;
       $db  = mysql_select_db( "gyc" ) ;
$iduser  = $_GET["iduser"] ;
$sql = "UPDATE utilisateur
            SET 
      etat = 0
           WHERE iduser = '$iduser' " ;
		   
			$requete = mysql_query($sql, $cnx) ;
			 echo "<script>alert('le compte a ete annuler ')</script>";
			echo "<script>window.open('index.php','_self')</script>";
			?>