<html>
                <head>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
                <!-- Bootstrap JS -->
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
                <style>
                .wrapper {
                  margin-top: 80px;
                  margin-bottom: 80px;
                }
                 
                .form-signin {
                  max-width: 380px;
                  padding: 15px 35px 45px;
                  margin: 0 auto;
                  background-color: #fff;
                  border: 1px solid rgba(0, 0, 0, 0.1);
                }
                 
                .form-signin .form-signin-heading,
                .form-signin .checkbox {
                  margin-bottom: 30px;
                }
                 
                .form-signin .checkbox {
                  font-weight: normal;
                }
                 
                .form-signin .form-control {
                  position: relative;
                  font-size: 16px;
                  height: auto;
                  padding: 10px;
                  -webkit-box-sizing: border-box;
                  -moz-box-sizing: border-box;
                  box-sizing: border-box;
                }
                 
                .form-signin .form-control:focus {
                  z-index: 2;
                }
                 
                .form-signin input[type="text"] {
                  margin-bottom: -1px;
                  border-bottom-left-radius: 0;
                  border-bottom-right-radius: 0;
                }
                 
                .form-signin input[type="password"] {
                  margin-bottom: 20px;
                  border-top-left-radius: 0;
                  border-top-right-radius: 0;
                }
                </style>
                </head>
<?php               
require 'database_connection.php';
require '_header.php';

    if(isset($_POST['cin']) && isset($_POST['tel']) )
    {
        // connexion à la base de données
        // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'gyc';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');    
        // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
        // pour éliminer toute attaque de type injection SQL et XSS
        $Cin = mysqli_real_escape_string($db,htmlspecialchars($_POST['cin'])); 
        $Tel = mysqli_real_escape_string($db,htmlspecialchars($_POST['tel']));

        if($Cin !== "" && $Tel !== "")
        {
            $requete = "SELECT count(*) FROM client WHERE cin = '$Cin' and telephone = '$Tel' ";
            $exec_requete = mysqli_query($db,$requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];
            if($count!=0) // cin et tel correctes
            {
              
$x = $_POST['cin'];         
$t = $_POST['tel'] ;
$Telclient=$t;                  
$CINClient=$x;


$servname = "localhost"; $dbname = "gyc"; $user = "root"; $pass = "";
$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//On utilise les requêtes préparées et des marqueurs nommés 
$sth = $dbco->prepare(
"INSERT INTO commande (CINClient,Telclient) VALUES (:CINClient ,:Telclient)"
);

$sth->execute(array(
':CINClient' => $CINClient,
':Telclient' => $Telclient,
));


}

else
{
header('Location: commande.php?erreur=3'); // utilisateur ou mot de passe incorrect

}
}
else
{
header('Location: commande.php?erreur=4'); // utilisateur ou mot de passe vide

}
}
else
{
header('Location: account.php');
}

$ids = array_keys($_SESSION['panier']);
if(empty($ids))
{
  $products=array();
}else
{
$products = $DB->queery('SELECT * FROM produit WHERE product_id IN (' .implode(',',$ids).') ');
}

foreach($products as $product): 
     $nom= $product->product_name;
     $quantity=$_SESSION['panier'][$product->product_id]; 
  
        if ($product->prix_promotion == 0)
        {
            $x=$product->product_price;

        }
            else
            {
                $x=$product->prix_promotion;
            }            
            $prix = $x * $_SESSION['panier'][$product->product_id] ;
            $servname = "localhost"; $dbname = "gyc"; $user = "root"; $pass = "";
            $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
            $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          
   $requete3 = "SELECT MAX(Idcmnd) FROM commande ";
   $exec_requete3 = mysqli_query($db,$requete3);
   $reponse3      = mysqli_fetch_array($exec_requete3);
   $max = $reponse3['MAX(Idcmnd)'];
   if($max!=0) 
   {
$id=$max;}


   
            $sth2 = $dbco->prepare(
              "INSERT INTO commande_item2 (produit,QT,prixCommande,Idcmnd) VALUES (:nom ,:quantity, :prix,:Idcmnd)" );
              
              $sth2->execute(array(
              ':nom' => $nom,
              ':quantity' => $quantity,
              ':prix' => $prix,
             ':Idcmnd' =>$id,
));
          endforeach;
            mysqli_close($db);





            $_SESSION['panier']= array();
?>
 


                               <body>
                                </br>

                              <div class="wrapper">
   <form class="form-signin"  method="POST">

      <h4 class="form-signin-heading">l'insertion est effectué avec succée !</h4>
        </br></br>
      
      <center>
      <a href="index.php">
                    <p><img src="img/logo.png" width="8%" style="margin: 0%,">
                    GYC <strong> Tech </strong><span> Your Shopping Partner </span></p>
                    </a>
                    </center>   </br></br>
	  
	  
				
  </form>


<?php   