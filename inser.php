<?php
  
  $cnx = mysqli_connect( "localhost", "root", "" ,"gyc" ) ;


    $product_name = $_POST["product_name"] ;  
    $product_quantity = $_POST["product_quantity"] ;
    $product_cat = $_POST['product_cat'];
    $product_sous_cat = $_POST['product_sous_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_image = $_POST['product_image'];
    $product_keywords = $_POST['product_keywords'];
    $product_ram = $_POST['product_ram'];
    $product_storage = $_POST['product_storage'];
    $product_camera = $_POST['product_camera'];
    $prix_promotion = $_POST['prix_promotion'];





   $sql = "INSERT into produit (product_name , product_quantity , product_cat, product_sous_cat, product_brand, product_price, product_desc, product_image, file_url, product_keywords, product_status, product_ram, product_storage, product_camera , prix_promotion) values ('$product_name', '$product_quantity','$product_cat', '$product_sous_cat','$product_brand','$product_price','$product_desc','$product_imag',' ','$product_keywords','1','$product_ram','$product_storage','$product_camera','$prix_promotion')";

    $requete = mysqli_query($cnx,$sql) or die( mysql_error() ) ;
     if($requete)
  {
    echo "<script>window.open('verifstock.php','_self')</script>";
  }
  else
  {
    echo("L'insertion a e echoue") ;
  }
   

/*
     


if (isset($_POST['b1'])) {

    
    $product_name = $_POST["product_name"] ;  
    $product_quantity = $_POST["product_quantity"] ;
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_ram = $_POST['product_ram'];
    $product_storage = $_POST['product_storage'];
    $product_camera = $_POST['product_camera'];
    

      //getting the image from the field
      $product_image = $_FILES['product_image']['name'];
       $product_image_tmp = $_FILES['product_image']['tmp_name'];
     
    move_uploaded_file($product_image_tmp,"files/$product_image");




   $insert_product = "INSERT into produit (product_name , product_quantity , product_cat, product_sous_cat, product_brand, product_price, product_desc, product_image, product_keywords, product_state, product_ram, product_storage, product_camera) value ('$product_name', '$product_quantity','$product_cat', '$product_brand','$product_price','$product_desc','$product_image','$product_keywords','1','$product_ram','$product_storage','$product_camera')";

    $insert_pro = mysql_query ($insert_product ,$con);
    if ($insert_pro) {
    echo "<script>alert('Product Has been inserted!')</script>";
    echo "<scrip>window.open('verifstock.php','_self')</script>";


    }else{
        echo"<script>alert('Product Has been inserted!')</script>";
    }
   

}
     


*/




  

 
?>