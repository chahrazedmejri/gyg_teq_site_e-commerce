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
<head>
<body>
<div class="wrapper">
   <form class="form-signin" action="login3Cmd.php" method="POST">

      <h4 class="form-signin-heading">Confirmer votre commande</h4>
      <label for="" >CIN<span>*</span></label>
      <input type="text" class="form-control" name="cin" placeholder="Votre CIN" required="" autofocus="" /></br>
      <label for=""> Numéro de Téléphone <span>*</span></label><br>
      <input type="text" class="form-control" name="tel" placeholder="+216 Votre Téléphone mobile" required=""/>      
      <label class="checkbox"><br>
      <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Rester connectè
      </label>
      <button class="btn btn-lg btn-primary btn-block "  type="submit"  id="submit">Envoyer</button>   </br></br>
	  
	  <center><a href="index.php">
                    <p><img src="img/logo.png" width="8%" style="margin: 0%,">
                    GYC <strong> Tech </strong><span> Your Shopping Partner </span></p>
                    </a>
                    </center>
					<?php
					if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                        if($err==3 || $err==4)
                        echo "<p style='color:red'>Code CIN ou Tel incorrect</p>";

                }?>
  </form>
</div>
</body>
