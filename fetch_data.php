<html>
<head>
<style>
.styled {
    border: 0;
    line-height: 2.5;
    padding: 0 20px;
    font-size: 1rem;
    text-align: center;
    color: #fff;
    text-shadow: 1px 1px 1px #000;
    border-radius: 10px;
    background-color: rgba(220, 0, 0, 1);
    background-image: linear-gradient(to top left,
                                      rgba(0, 0, 0, .2),
                                      rgba(0, 0, 0, .2) 30%,
                                      rgba(0, 0, 0, 0));
    box-shadow: inset 2px 2px 3px rgba(255, 255, 255, .6),
                inset -2px -2px 3px rgba(0, 0, 0, .6);
}

.styled:hover {
    background-color: rgba(255, 0, 0, 1);
}

.styled:active {
    box-shadow: inset -2px -2px 3px rgba(255, 255, 255, .6),
                inset 2px 2px 3px rgba(0, 0, 0, .6);
}
</style>
</head>
<?php

//fetch_data.php

include('database_connection.php');


if(isset($_POST["action"]))
{
  $query = "
    SELECT * FROM produit WHERE product_status = '1'
  ";
  if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
  {
    $query .= "
     AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
    ";
  }
  if(isset($_POST["categ"]))
  {
    $brand_filter = implode("','", $_POST["categ"]);
    $query .= "
     AND product_cat IN('".$brand_filter."')
    ";
  }
  if(isset($_POST["brand"]))
  {
    $brand_filter = implode("','", $_POST["brand"]);
    $query .= "
     AND product_brand IN('".$brand_filter."')
    ";
  }
  if(isset($_POST["ram"]))
  {
    $ram_filter = implode("','", $_POST["ram"]);
    $query .= "
     AND product_ram IN('".$ram_filter."')
    ";
  }
  if(isset($_POST["storage"]))
  {
    $storage_filter = implode("','", $_POST["storage"]);
    $query .= "
     AND product_storage IN('".$storage_filter."')
    ";
  }

  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();
  $output = '';
  
  if($total_row > 0)
  {
    foreach($result as $row)
    {
      $output .= '
      <div class="col-sm-4 col-lg-3 col-md-3">
        <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
        
          <img src="img/produit/'. $row['product_image'] .'" alt="" class="img-responsive" >
          <p align="center"><strong><a href="#">'. $row['product_name'] .'</a></strong></p>
          <h4 style="text-align:center;" class="text-danger" >'. $row['product_price'] .'</h4>
          <p>Camera : '. $row['product_camera'].' MP<br />
          categ : '. $row['product_cat'] .' <br />
          Brand : '. $row['product_brand'] .' <br />
          RAM : '. $row['product_ram'] .' GB<br />
          Storage : '. $row['product_storage'] .' GB </p> 
         <tr> <a href="addpanier.php?product_id='. $row['product_id'] .' " class="button blue_alt">Ajouter à votre panier</a>
         </div>
      </div>
      ';
    }
  }

  else
  {
    $output = '<h3>No Data Found</h3>';
  }
  echo $output;
}