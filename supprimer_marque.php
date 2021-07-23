<?php
//connection au serveur:
$cnx = mysqli_connect( "localhost", "root", "","gyc" ) ;
//récupération de la variable d'URL,
//qui va nous permettre de savoir quel enregistrement supprimer:
$id = $_GET["idMarque"] ;
//requête SQL:
$sql = "DELETE
FROM marque
WHERE marque_id = ".$id ;
echo $sql ;
//exécution de la requête:
$requete = mysqli_query($cnx, $sql ) ;
//affichage des résultats, pour savoir si la suppression a marchée:
if($requete)
{
header('Location: listemarque.php');
}
else
{
echo("La suppression à échouée") ;
}
?>