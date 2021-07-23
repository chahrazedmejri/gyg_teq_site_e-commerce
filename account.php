<?php 
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>GYC_TEQ | Compte </title>
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
  <body>
  <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
  
 
  <!-- header -->
  <?php include 'header_1.php';?>
  <!-- /header -->
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">

    <img src="img/slider/pro2.png" height="300" width="1400" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Créer ton compte!</h2>
        <ol class="breadcrumb">
          <li><a href="index.php"><button type="button" class="btn btn-link" >Home</button></a></li>                   
          <li class="active"><button type="button" class="btn btn-link" >Account</button></li>
        </ol>
      </div>
     </div>
   </div>

  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">

              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Deja inscrit ?</h4>
                 <form action="login.php" method="POST" class="aa-login-form">
                  <label for="">Adresse Email <span>*</span></label>
                   <input type="text" name="email" placeholder="votre nom ou email">
                   <label for="">Mot de passe<span>*</span></label>
                    <input type="password" name="pass_word" placeholder="Mot de passe">
                    <button type="submit" id="submit"  class="aa-browse-btn">Continue</button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> confirmer </label>
                    <p class="aa-lost-password"><a href="changepass.php">Mot de passe oublié?</a></p>
                    <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Email ou mot de passe incorrect</p>";

                }?>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>Nouveau chez GYCTECH ?</h4>
                 <form action="insert.php" method="POST" class="aa-login-form">
                 <label for="" >Nom et Prénom <span>*</span></label>
                 <input type="text" name='nom' placeholder="votre nom">
                 
                  <label for="" >Adresse<span></span></label>
                    <input type="text" name='adresse' placeholder="Adresse,code postal ou ville">

                    <label for="" >CIN<span>*</span></label>
                    <input type="text" name="cin" placeholder="********">
                    
                   <label for="" > Telephone<span></span></label>
                    <input type="text" name="telephone" placeholder="+216">

      <label for="" >Email (Identifiant) <span> *</span></label>
      <input type="text" name="email" placeholder="email@example.com">
             <label for="" >Mot de passe <span> *</span></label>
             <input type="password" name="pass_word" placeholder="**************">
           <button type="submit" class="aa-browse-btn">Continue</button>                    
                  </form>
                </div>
              </div>

            
       </div>
     </div>
   </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

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
