<?php 
 session_start();

if(isset($_POST['login']))      $login=$_POST['login'];
else      $login="";

if(isset($_POST['pwd']))      $pwd=$_POST['pwd'];
else      $pwd="";

$con = new PDO("mysql:host=localhost;dbname=gyc", "root", "");
 
if ($login==''){
     echo "<script>alert('Votre login est vide')</script>";
     echo "<script>window.open('index.php','_self')</script>";
  }
    else if ($pwd=='') {  
        echo "<script>alert('Votre password est vide')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    else{

$req = "SELECT login,password FROM admin WHERE login='$login'  and password='$pwd' ";
$statement = $con->prepare($req);
$statement->execute();
$res = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
     foreach($res as $nb): 
        if($nb) {
            $_SESSION['login']=$login;
            echo "<script>alert('Vous ete bien connecter')</script>";
            echo "<script>window.open('index1.php','_self')</script>";
        }
        else { 
            echo "<script>alert('Connexion echouee !! Veuillez verifier votre login et password.')</script>";
            echo "<script>window.open('index.php','_self')</script>";
            
        }
    endforeach;
?>