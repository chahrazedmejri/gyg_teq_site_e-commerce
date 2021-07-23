
<?php
//connection au serveur:
$cnx = mysqli_connect( "localhost", "root", "" ,"gyc") ;

//récupération de la variable d'URL,
//qui va nous permettre de savoir quel enregistrement supprimer:
$id = $_GET["idCmnd"] ;
//requête SQL:
$sql = "DELETE
FROM commande
WHERE Idcmnd = ".$id ;
echo $sql ;
//exécution de la requête:
$requete = mysqli_query($cnx,$sql) ;
//affichage des résultats, pour savoir si la suppression a marchée:
if($requete)
{
 echo "<script>window.open('listecmnd.php','_self')</script>";
}
else
{
echo("La suppression à échouée") ;
}
?>