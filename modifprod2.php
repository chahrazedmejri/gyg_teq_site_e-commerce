<?php
//connection au serveur
$cnx = mysqli_connect("localhost", "root", "" , "gyc") ;

//récupération des valeurs des champs:

$nom = $_POST["product_name"] ;

$id = $_POST["product_id"] ;

$qt = $_POST["product_quantite"] ;

$cat = $_POST["product_cat"] ;

$brand = $_POST["product_brands"] ;

$img = $_POST["product_image"] ;

$prix = $_POST["product_price"] ;

$promo = $_POST["prix_promotion"] ;

$desc = $_POST["product_desc"] ;

$key = $_POST["product_keywords"] ;

//création de la requête SQL:
$sql = " UPDATE produit SET product_name = '$nom', product_id = '$id', product_quantity = '$qt', product_cat = '$cat',product_brand = '$brand',product_image = '$img' ,product_price = '$prix',prix_promotion = '$promo',
product_desc ='$desc', product_keywords = '$key' WHERE product_id = '$id' " ;
//exécution de la requête SQL:
$requete = mysqli_query($cnx ,$sql) ;
//affichage des résultats, pour savoir si la modification a marchée:
if($requete)
{
header('Location: verifstock.php');
}
else
{
echo("La modification à échouée") ;
}
?>