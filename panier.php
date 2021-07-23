<?php
include ('_header.php');
if(isset($_GET['del'])) 
{
  $panier->del($_GET['del']);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>GYC_TEQ | Panier</title>
    <link rel="icon"  sizes="16x16" href="img/logo.png">

    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/lite-blue-theme.css" rel="stylesheet">
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


  </head> 
  <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
  <!-- header -->

  <?php include 'header_1.php';?>
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/x.jpg" height='300' width="1400" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Votre Panier</h2>
        <ol class="breadcrumb">
        <li><a href="index.php"> <button type="button" class="btn btn-link" >Home</button></a></li>      
          <li class="active"><button type="button" class="btn btn-link" >Panier</button></li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">

             <form method="post" action="panier.php">
                          <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>prix final</th>
                        <th> </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $ids = array_keys($_SESSION['panier']);
                    if(empty($ids))
                    {
                      $products=array();
                    }
                    else
                    {   
                      $products = $DB->queery('SELECT * FROM produit WHERE product_id IN (' .implode(',',$ids).') ');  
                    }
                   foreach($products as $product ): ?>    
                   
   <?php 
        
    if($product->prix_promotion==0)
    {$rs=number_format($product->product_price,3,',','');}
    else
    {$rs=number_format($product->prix_promotion,3,',','');  }
 ?>
                      <tr>
                        <td><a href="#"><img  src="img/produit/<?= $product->product_image ;?>" > </a></td>
                        <td><a class="aa-cart-title" name="product_name" href="#"><?= $product->product_name ;?></a></td>
                        <td><span class="quantity"><input width='10' height='5' type="text" name="panier[quantity][<?= $product->product_id; ?>]" value="<?=$_SESSION['panier'][$product->product_id]; ?>"></span></td>
                        <td ><?= number_format($product->product_price,3,',',''); ?> </td>
                        <td ><?= $rs;?> </td>
                        <td><span class="action"><a href="panier.php?del=<?= $product->product_id; ?>"><img src="img/del.png" height="13" width="13">  </a></span></td>
                      </tr>
                      <?php endforeach; ?>
                      </tbody>
                  </table>
             </div>
             <center> <input class="aa-cart-view-btn" type="submit" value="Recalculer"></center>
             </form>


             <!-- Cart Total view -->
             <div class="cart-view-total">
              <h4>     Panier</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>nombre des produits</th>

                     <td id="count"><?= $panier->count();?></td>
                   </tr>
                   <tr>
                     <th>Grand Total</th>
                     <td id="total"><?= number_format($panier->total(),2,',',' ');?> </td>
                     </tr>
                 </tbody>
                 </table>
                 <a  class="aa-cart-view-btn"  href="" data-toggle="modal" data-target="#login-modal2">Commander<img src="img/ic.png" height='40' width='45'> </a>
             </div>

             
         </div>
       </div>
     </div>
   </div>
 </section>


  <!-- Login Modal -->
  <div class="modal fade" id="login-modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <center><h3 class="form-signin-heading">Vous devez inscrire pour commander !</h3></center>
          <form class="aa-login-form" action="login2Cmd.php" method="POST">
            <label for="">Adresse Email<span>*</span></label>
            <input type="text" placeholder="votre nom ou email" name="email">
            <label for="">Mot de passe<span>*</span></label>
            <input type="password" placeholder="Mot de passe" name="pass_word">
         <button class="aa-browse-btn" type="submit" id="submit">   Connecter</button></br>
            <p class="aa-lost-password"><a href="changepass.php">Mot de passe oublié?</a></p><br>
            <div class="aa-register-now">
            Nouveau chez GYCTECH ?<a href="account.php">  Créer un compte!</a>
            </div>
            <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Email ou mot de passe incorrect</p>";
                }?>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
 <!-- / Cart view section -->

  <!-- / Subscribe section -->



  <!-- footer -->
<?php include 'footer_1.php';?>





    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>  
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
    <!-- To Slider JS -->
    <script src="js/sequence.js"></script>
    <script src="js/sequence-theme.modern-slide-in.js"></script>  
    <!-- Product view slider -->
    <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
    <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="js/slick.js"></script>
    <!-- Price picker slider -->
    <script type="text/javascript" src="js/nouislider.js"></script>
    <!-- Custom js -->
    <script src="js/custom.js"></script> 

  </body>
</html>