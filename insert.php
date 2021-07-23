 <?php
            $servname = "localhost"; $dbname = "gyc"; $user = "root"; $pass = "";
            
            try{
                $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
                //On utilise les requêtes préparées et des marqueurs nommés 
                $sth = $dbco->prepare(
                  "INSERT INTO client  (nom,adresse,cin,telephone,email,pass_word) VALUES (:nom, :adresse, :cin, :telephone, :email, :pass_word)"
                );
                $sth->execute(array(
                  ':nom' => $_POST['nom'],
                  ':adresse' => $_POST['adresse'],
                    ':cin' => $_POST['cin'],
              ':telephone' => $_POST['telephone'],
              ':email' => $_POST['email'],
              ':pass_word' => $_POST['pass_word']
                ));
                
           header('Location: insert2.php');
             }
                  
            catch(PDOException $e){
                echo "l'insertion à echouée" . $e->getMessage();
            }
        ?>