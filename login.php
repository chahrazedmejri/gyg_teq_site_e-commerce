<?php
session_start();
if(isset($_POST['email']) && isset($_POST['pass_word']) )
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
    $email = mysqli_real_escape_string($db,htmlspecialchars($_POST['email'])); 
    $pass_word = mysqli_real_escape_string($db,htmlspecialchars($_POST['pass_word']));
    
    if($email !== "" && $pass_word !== "")
    {
        $requete = "SELECT count(*) FROM client WHERE email = '$email' and pass_word = '$pass_word' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['email'] = $email;
           header('Location: index.php');
        }
        else
        {
           header('Location: account.php?erreur=1'); // utilisateur ou mot de passe incorrect

        }
    }
    else
    {
       header('Location: account.php?erreur=2'); // utilisateur ou mot de passe vide

    }
}

else
{
   header('Location: account.php');
}

mysqli_close($db);
?>