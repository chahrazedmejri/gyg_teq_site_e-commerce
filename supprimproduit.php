<?php
//connection au serveur:
$cnx = mysqli_connect( "localhost", "root", "" ,"gyc") ;
//récupération de la variable d'URL,
//qui va nous permettre de savoir quel enregistrement supprimer:
$id = $_GET["idProd"] ;
//requête SQL:
$sql = "DELETE
FROM produit
WHERE product_id = ".$id ;

//exécution de la requête:
$requete = mysqli_query($cnx, $sql ) ;
//affichage des résultats, pour savoir si la suppression a marchée:
if($requete)
{
 echo "<script>window.open('verifstock.php','_self')</script>";
}
else
{
echo("La suppression à échouée") ;
}
?>