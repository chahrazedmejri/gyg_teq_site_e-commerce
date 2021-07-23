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
   <form class="form-signin" action="" method="POST">

   <center><a href="index.php">
                    <p><img src="img/logo.png" width="8%" style="margin: 0%,">
                    GYC <strong> Tech </strong><span> Your Shopping Partner </span></p>
                    </a>
                    </center><br/>

    <center>  <h4 class="form-signin-heading">Changer mot de passe</h4></center>

      <label for="" >Email<span>*</span> </label>
      <input type="text" class="form-control" name="email"  required/></br>

      <label for=""> Ancien mot de passe <span>*</span></label><br>
      <input type="password" class="form-control" name="current_pass" required/>      

      
      <label for=""> Nouveau mot de passe <span>*</span></label><br>
      <input type="password" class="form-control" name="new_pass" required/> 
      
      <label for=""> Repeter le Nouveau mot de passe <span>*</span></label><br>
      <input type="password" class="form-control" name="new_pass_again" required/> <br/>


      <button class="btn btn-lg btn-primary btn-block "  name="change_pass">Confirmer</button>   </br></br>
  </form>
</div>
</body>

<?php
 
 $connect = mysqli_connect("localhost","root","","gyc");

   if(isset($_POST['change_pass'])) {
   	
        $user = $_POST['email'];
        $current_pass= $_POST['current_pass'];
        $new_pass= $_POST['new_pass'];
        $new_again=$_POST['new_pass_again'];

        $sel_pass = "SELECT * from client where pass_word='$current_pass' AND email='$user' ";

       $run_pass = mysqli_query($connect, $sel_pass);

 	   $check_pass = mysqli_num_rows($run_pass);

 	if ($check_pass==0) {
 		
 		echo "<script>alert('ton ancien Mot de passe incorrecte')</script>";
 		exit();
 	}

 	if ($new_pass!=$new_again) {
 		
 		echo "<script>alert('repeter ton mot de passe')</script>";
 		exit();
 	}

 	else {

 		$update_pass = "update client set pass_word='$new_pass' where email='$user'";

 		$run_update = mysqli_query($connect, $update_pass);

 		echo "<script>alert('le mot de passe a été modifiè avec succèe')</script>";
 		echo "<script>window.open('index.php','_self')</script>";


 	}

 }

?>