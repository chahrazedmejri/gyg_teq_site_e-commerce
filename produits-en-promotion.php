<?php 

include 'database_connection.php';

$query = "SELECT * FROM produit WHERE prix_promotion > '0' ";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);


$query2 = "SELECT * FROM produit WHERE dateCreation != 'NULL' and prix_promotion > '0' ORDER BY dateCreation DESC ";
$statement = $connect->prepare($query2);
$statement->execute();
$result2 = $statement->fetchAll(PDO::FETCH_ASSOC);


$query3 = "SELECT * FROM produit WHERE prix_promotion > '0' ORDER BY product_quantity DESC";
$statement = $connect->prepare($query3);
$statement->execute();
$result3 = $statement->fetchAll(PDO::FETCH_ASSOC);


?>


<body>

              
<!-- Page produits en promotion -->
          <!-- banner section -->
  <!-- popular section -->
<section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-15">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
              <nav class="nav nav-tabs aa-products-tab">
                <li><a class="nav-item nav-link active" href="#popular" data-toggle="tab" >PRODUITS SPECIAUX</a></li>
                <li><a class="nav-item nav-link" href="#featured" data-toggle="tab">OFFRE DU JOUR</a></li>
                <li><a class="nav-item nav-link"  href="#latest" data-toggle="tab">TOP VENTES</a></li>
              </nav>
                <!-- / popular product category -->
         <div class="tab-content">

                <div class="tab-pane fade in active" id="popular">

                 <div class="row no-gutters" >
                                  <?php foreach($result as $r): ?>
                                    <div class="col-2">
                  <!-- Start men popular category -->
                     <ul class="aa-product-catg aa-popular-slider" >
                    <!-- start single product item -->
                    <div class="col-3">
                      <li>
                      <figure >
                        <a class="aa-product-img" ><img src="img/produit/<?= $r['product_image']; ?>" alt="Image" height="180" width="180"></a>
                        <a class="aa-add-card-btn" class="col-2" href="addpanier.php?product_id=<?= $r['product_id'];?>" > <span class="fa fa-shopping-cart" class="col-2"></span>Ajouter Au Panier</a>
                        <figcaption>
                          <h4 class="aa-product-title"><B><?= $r['product_name'];?></B></h4>
                          <span class="aa-product-price">$<?=$r['prix_promotion'];?></span>
                          <span class="aa-product-price"><del class="texteenrouge">$<?=$r['product_price'];?></del></span>
                        </figcaption>
                      </figure>
                      <!-- product badge -->
                     
                      <!-- product badge -->
                      <span class="aa-badge aa-sold-out" href="#" >SOLDE !</span>
                        </li>
                        </div>
                         </ul>
                         </div>
                    <?php endforeach; ?>
                  </div>
                  </div>
                <!-- start featured product category -->
                <div class="tab-pane fade " id="featured">
               <div class="row no-gutters">
                  <?php foreach($result2 as $r2): ?>
                    <div class="col-2">
                  <ul class="aa-product-catg aa-featured-slider">
                    <!--start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" ><img src="img/produit/<?= $r2['product_image'] ?>" alt="Image" height="180" width="180"></a>
                        <a class="aa-add-card-btn addPanier" href="addpanier.php?product_id=<?= $r2['product_id']?>"><span class="fa fa-shopping-cart"></span>Ajouter Au Panier</a>
                        <figcaption>
                          <h4 class="aa-product-title"><B><?= $r2['product_name']?></B></h4>
                          <span class="aa-product-price">$<?=$r2['prix_promotion']?></span>
                          <span class="aa-product-price"><del class="texteenrouge">$<?=$r2['product_price']?></del></span>
                        </figcaption>
                      </figure>
                      <span class="aa-badge aa-sold-out" href="#">SOLDE!</span>
                        </li>
                  </ul>
                  </div>
                   <?php endforeach; ?>
                    </div>
                    </div>


               <!-- featured product category--> 
                <!-- start latest product category -->
              
                <div class="tab-pane fade" id="latest">
                    <div class="row no-gutters">
                                  <?php foreach($result3 as $r3): ?>
                                    <div class="col-2">
                  <!-- Start men popular category -->
                  <ul class="aa-product-catg aa-latest-slider">
                    <!-- start single product item -->
                      <li>
                      <figure>
                        <a class="aa-product-img" ><img src="img/produit/<?= $r3['product_image'] ?>" alt="Image" height="180" width="180"></a>
                        <a class="aa-add-card-btn addPanier" href="addpanier.php?product_id=<?=$r3['product_id']?>"><span class="fa fa-shopping-cart"></span>Ajouter Au Panier</a>
                        <figcaption>
                          <h4 class="aa-product-title"><B><?= $r3['product_name']?></B></h4>
                          <span class="aa-product-price">$<?=$r3['prix_promotion']?></span>
                          <span class="aa-product-price"><del class="texteenrouge">$<?=$r3['product_price']?></del></span>
                        </figcaption>
                      </figure>
                    
                      <span class="aa-badge aa-sold-out" href="#">SOLDE!</span>
                        </li>
                         </ul>
                     </div>
                    <?php endforeach; ?>
                  </div>
                  </div>

                  </div>
                  </div>
          </div>
        </div>
      </div>
    </div>
</section>            <!--/ latest product category -->
                   <!-- / popular section -->
</body>
</html>
