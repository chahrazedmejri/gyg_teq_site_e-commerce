<?php
//connection au serveur:
$con = mysqli_connect( "localhost", "root", "" ,"gyc") ;

//récupération de la variable d'URL,
//qui va nous permettre de savoir quel enregistrement supprimer:
$id = $_GET["idCat"] ;
//requête SQL:
$sql = "DELETE
FROM sous_categorie
WHERE sous_cat_id = ".$id ;
echo $sql ;
//exécution de la requête:
$requete = mysqli_query($con, $sql) ;
//affichage des résultats, pour savoir si la suppression a marchée:
if($requete)
{
 echo "<script>window.open('listecat.php','_self')</script>";
}
else
{
echo("La suppression à échouée") ;
}
?>