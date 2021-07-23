<?php
include("connexiondb.php");
                        $id = $_GET["idCmnd"] ;
                        
                        $get_pro1 =" SELECT * FROM commande WHERE Idcmnd = ".$id ;
                        $run_pro1 = mysqli_query($con,$get_pro1 )  ;

                        while ($row_pro1=mysqli_fetch_array($run_pro1))
                        {
                            $c= $row_pro1 ['CINClient'];
                           $t= $row_pro1['Telclient'];
                        $get_pro =" SELECT * FROM commande_item2 WHERE Idcmnd = ".$id ;
                        $run_pro = mysqli_query($con,$get_pro )  ;
                        while ($row_pro=mysqli_fetch_array($run_pro))
        {
           $id=$row_pro['Idcmnd'];
           $n= $row_pro ['produit'];
           $p= $row_pro ['QT'];
           $p2= $row_pro ['prixCommande'];
        

        $sql2 ="INSERT INTO commandelivr (Idcmndliv,nomproduit,QtCommande,prixCommande,CINclient,Telclient) VALUES ('$id','$n','$p','$p2','$c','$t')";
        $run_pro2 = mysqli_query($con,$sql2)  ;
        }
      }




                     $sql3 =" DELETE FROM commande WHERE Idcmnd = ".$id ;
                     $sql4 =" DELETE FROM commande_item2 WHERE Idcmnd = ".$id ;

                    $run_pro3 = mysqli_query($con,$sql3)  ;
                    $run_pro4 = mysqli_query($con,$sql4)  ;

                    if(($run_pro3)&&($run_pro4))
                    {
                     echo "<script>window.open('listeCmndliv.php','_self')</script>";
                    }  ?>                     