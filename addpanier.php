<?php
require '_header.php';
if(isset($_GET['product_id']))
{
  $product = $DB->queery('SELECT product_id FROM produit WHERE product_id =:product_id', array('product_id'=>$_GET['product_id']) );
    if(empty($product))
  {
    echo '<script>alert("ce produit nexiste pas")</script>';  
  }
  $panier->add($product[0]->product_id);
  echo '<script>alert("le produit a été ajouté à votre panier ")</script>';  
  echo '<script>window.location="index.php"</script>';  
}
  else
      {  
        echo '<script>alert("vous navez pas selectionné de produit a ajouter au panier")</script>';  

      }