<?php 
 //error_reporting(E_ERROR | E_PARSE);

    require_once("../Session/TestSession.php") ;         
    require_once("../controllers/Categorie.php");
    require_once("../controllers/Product.php");
       IncluceNav() ;
      $categories = Categoire::listeCategorie() ;
       if(array_key_exists("id_categorie",$_GET)){
        $products = Product::ListeProductsById($_GET['id_categorie']) ;

        ?>
<main>
<div class="container-fluid px-4 ">

   <h1 class="mt-4">Produits</h1>
      <ol class="breadcrumb mb-4">
          <li class="breadcrumb-item  "><a  href='../views/products.php' >Listes de Produits</a></li>
          <li class="breadcrumb-item active"> Produits de Categorie <?php foreach($categories as $cat) {
             if($_GET['id_categorie']==$cat->id_cat) {
                echo $cat->libelle ;
             }
            }
             ?>
              </li>
      </ol>
      <hr>
      <div class="row mb-2">
      <div class="d-flex justify-content-end mb-2">
                          <div class="ml-auto mt-2 ">
                              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Ajoute">
                                  <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                  Ajouter
                               </button>
                              </div>
                  </div>  

          </div>

          


  <!-- Ajoute form modal -->
  <div class="modal fade" id="Ajoute" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Ajouter un Produit</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                  <section class=" gradient-custom">
                  <div class="container ">
                      <div class="row justify-content-center align-items-center">
                      <div class="col-12 col-lg-12 col-xl-12">
                          <div class="card">
                          <div class="card-body p-2 p-md-4 shadow p-0 mb-0 bg-body rounded">


                              <!-- Form in model-->
                              <form action="../routes/addProduct.php" method="POST" enctype="multipart/form-data">
                              
                          
                              <div class="row">
                                  <div class="col-md-8 mb-4">
                  
                                  <div class="form-outline">
                                  <label class="form-label" for="firstName">Libelle *</label> 
                                  <input required type="text" id="firstName" class="form-control form-control-lg" name="libelle" />
                                      
                                  </div>
                  
                                  </div>
                                          <div class="col-md-4 mb-4">
                          
                                              <div class="form-outline">
                                              <label class="form-label" for="Qnt">Quantite</label> 
                                              <input required type="number" id="Qnt" class="form-control form-control-lg" name="quantite" />
                                              
                                              </div>
                          
                                          </div>
                                  </div>
                                  <div class="row d-flex justify-content-evenly">
                                  <div class="col-md-4 mb-4 d-flex align-items-center">
                  
                                  <div class="form-outline datepicker w-100">
                                      <label for="prix_achat" class="form-label">Prix achat *</label>
                                      <input required type="text" class="form-control form-control-lg" id="Email" placeholder="" name="prix_achat"/>
                                      
                                  </div>
                  
                                  </div>
                                  <div class="col-md-4 mb-4 d-flex align-items-center">
                  
                  <div class="form-outline datepicker w-100">
                      <label for="prix_vent" class="form-label">Prix vent *</label>
                      <input required type="text" class="form-control form-control-lg" id="prix_vent" placeholder="" name="prix_vent"/>
                      
                  </div>
  
                  </div>
                                  </div>
                                  <div class="row">

                                
                                 <div class="col-12 mb-4">
                  
                                      <div class="form-outline">
                                      <label class="form-label" for="profil">Photo de Produit*</label>
                                      <input required type="file" id="profil" class="form-control form-control-lg" name="photo"/>
                                      </div>
                                </div>
                              
                              </div>
                              <div class="row">                                                  
                                 <div class="col-12 mb-4">
                                 <div class="form-outline">
                                 <label class="form-label" for="categorie">Categorie de Produit*</label>
                              <select class="form-select form-select-lg mb-3" id="categorie" name="id_categorie" aria-label=".form-select-lg example">
                                  <?php foreach($categories as $cat) { ?>
                                  <option value="<?= $cat->id_cat?>"><?= $cat->libelle ;}?></option>
                                  
                                  </select>
                                 </div>
                                 </div>
                              </div>
                              <div class="row">
                                  
                                  
                                  <div class="col-12 mb-2">
                  
                                      <div class="form-outline">
                                      <label class="form-label" for="description">Description</label>
                                      <textarea required maxlength="255" id="description" class="form-control"    name="description"></textarea>
                                      </div>
                                      </div>
                                  
                              
                                  </div>
                                  
                  
                                  
                              
                  
                                  <hr>
                                  <div class="row" >
          
                                
                                 </div>
                                  <div class="d-flex justify-content-end mt-3">
                                      <input  type="submit" class="btn btn-primary" value="Ajoute">
                                          </div> 
                              
                                  
                                              
                                      
                                              
                              </form>
                              </div>
                          </div>
                          </div>
                      </div>
                      </div>
                  </section>
                  
                  </div>
              </div>
          </div>   
          </div> 
          <div class="row">
              <?php 

                    foreach($products as $product){
                        ?>
                        <div class="col-4">
                    
                      <div class="card card-body ">
                      <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                          <div class="m-0 mb-lg-3">
                              
                                  <img src="<?=$product->photo_produit?>" width="90%" height="90%" alt="">
                        
                          </div>

                          <div class="media-body">
                              <h6 class="media-title font-weight-semibold">
                                  <a href="#" data-abc="true"><?=$product->description?></a>
                              </h6>

                              <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                  <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Categorie :</a></li>
                                       <?php
                              
                                   foreach($categories as $cat) { 
                                      if($product->id_categorie == $cat->id_cat){
                                          echo "<li class='list-inline-item'><a href='#' class='text-muted' data-abc='true'>" .$cat->libelle ;
                                      }
                                  
                                    } ?></a></li>
                              </ul>
                                  <hr>
                              <p class="mb-3"><?=$product->libelle?></p>
                                  <hr>
                              <!-- <ul class="list-inline list-inline-dotted mb-0">
                                  <li class="list-inline-item">All items from <a href="#" data-abc="true">Mobile point</a></li>
                                  <li class="list-inline-item">Add to <a href="#" data-abc="true">wishlist</a></li>
                              </ul> -->
                          </div>

                          <div class="mt-3 mt-lg-1 ml-lg-3 text-center">
                              <h3 class="mb-0 font-weight-semibold">$<?=$product->prix_vent?></h3>

                              <!-- <div>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>

                              </div> -->

                              <div class="text-muted">Quantite : <?=$product->quantite?></div>

                              <div class="d-flex justify-content-between ">
                                  <a href="../views/Update.php?id_product=<?=$product->reference?>" ><i class="fa fa-wrench fa-2x" aria-hidden="true"></i></a>
                                  <a href="../routes/SoftDelete.php?id_product=<?=$product->reference?>&table=produit" onclick="return confirm('Are you sure you want to delete this Product <?= strtoupper($product->libelle ) ;?>')"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>

                              </div>

                          </div>
                      </div>
                  </div>

               </div>
                <?php }?>
          </div>
 </div>




</main>

 <?php
       } ?>
       <?php
          if (!array_key_exists("id_categorie",$_GET)){ 
            $products = Product::ListeProducts() ;
        

?>   
<main>
                  <div class="container-fluid px-4 ">

                     <h1 class="mt-4">Produits</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Listes de Produits</li>
                        </ol>
                        <hr>
                        <div class="row mb-2">
                        <div class="d-flex justify-content-end mb-2">
                                            <div class="ml-auto mt-2 ">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Ajoute">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                    Ajouter
                                                 </button>
                                                </div>
                                    </div>  

                            </div>

                            
                  

                    <!-- Ajoute form modal -->
                    <div class="modal fade" id="Ajoute" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter un Produit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <section class=" gradient-custom">
                                    <div class="container ">
                                        <div class="row justify-content-center align-items-center">
                                        <div class="col-12 col-lg-12 col-xl-12">
                                            <div class="card">
                                            <div class="card-body p-2 p-md-4 shadow p-0 mb-0 bg-body rounded">


                                                <!-- Form in model-->
                                                <form action="../routes/addProduct.php" method="POST" enctype="multipart/form-data">
                                                
                                            
                                                <div class="row">
                                                    <div class="col-md-8 mb-4">
                                    
                                                    <div class="form-outline">
                                                    <label class="form-label" for="firstName">Libelle *</label> 
                                                    <input required type="text" id="firstName" class="form-control form-control-lg" name="libelle" />
                                                        
                                                    </div>
                                    
                                                    </div>
                                                            <div class="col-md-4 mb-4">
                                            
                                                                <div class="form-outline">
                                                                <label class="form-label" for="Qnt">Quantite</label> 
                                                                <input required type="number" id="Qnt" class="form-control form-control-lg" name="quantite" />
                                                                
                                                                </div>
                                            
                                                            </div>
                                                    </div>
                                                    <div class="row d-flex justify-content-evenly">
                                                    <div class="col-md-4 mb-4 d-flex align-items-center">
                                    
                                                    <div class="form-outline datepicker w-100">
                                                        <label for="prix_achat" class="form-label">Prix achat *</label>
                                                        <input required type="text" class="form-control form-control-lg" id="Email" placeholder="" name="prix_achat"/>
                                                        
                                                    </div>
                                    
                                                    </div>
                                                    <div class="col-md-4 mb-4 d-flex align-items-center">
                                    
                                    <div class="form-outline datepicker w-100">
                                        <label for="prix_vent" class="form-label">Prix vent *</label>
                                        <input required type="text" class="form-control form-control-lg" id="prix_vent" placeholder="" name="prix_vent"/>
                                        
                                    </div>
                    
                                    </div>
                                                    </div>
                                                    <div class="row">

                                                  
                                                   <div class="col-12 mb-4">
                                    
                                                        <div class="form-outline">
                                                        <label class="form-label" for="profil">Photo de Produit*</label>
                                                        <input required type="file" id="profil" class="form-control form-control-lg" name="photo"/>
                                                        </div>
                                                  </div>
                                                
                                                </div>
                                                <div class="row">                                                  
                                                   <div class="col-12 mb-4">
                                                   <div class="form-outline">
                                                   <label class="form-label" for="categorie">Categorie de Produit*</label>
                                                <select class="form-select form-select-lg mb-3" id="categorie" name="id_categorie" aria-label=".form-select-lg example">
                                                    <?php foreach($categories as $cat) { ?>
                                                    <option value="<?= $cat->id_cat?>"><?= $cat->libelle ;}?></option>
                                                    
                                                    </select>
                                                   </div>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                    
                                                    
                                                    <div class="col-12 mb-2">
                                    
                                                        <div class="form-outline">
                                                        <label class="form-label" for="description">Description</label>
                                                        <textarea required maxlength="255" id="description" class="form-control"    name="description"></textarea>
                                                        </div>
                                                        </div>
                                                    
                                                
                                                    </div>
                                                    
                                    
                                                    
                                                
                                    
                                                    <hr>
                                                    <div class="row" >
                            
                                                  
                                                   </div>
                                                    <div class="d-flex justify-content-end mt-3">
                                                        <input  type="submit" class="btn btn-primary" value="Ajoute">
                                                            </div> 
                                                
                                                    
                                                                
                                                        
                                                                
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </section>
                                    
                                    </div>
                                </div>
                            </div>   
                            </div> 
                            <div class="row">
                                <?php 

                                      foreach($products as $product){
                                          ?>
                                          <div class="col-4">
                                      
                                        <div class="card card-body ">
                                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                                            <div class="m-0 mb-lg-3">
                                                
                                                    <img src="<?=$product->photo_produit?>" style="max-width: 100%;max-height:100%"   alt="Picture Product">
                                          
                                            </div>

                                            <div class="media-body">
                                                <h6 class="media-title font-weight-semibold">
                                                    <a href="#" data-abc="true"><?=$product->libelle?></a>
                                                </h6>

                                                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Categorie :</a></li>
                                                         <?php
                                                
                                                     foreach($categories as $cat) { 
                                                        if($product->id_categorie == $cat->id_cat){
                                                            echo "<li class='list-inline-item'><a href='../views/products.php?id_categorie=". $cat->id_cat."' class='text-muted' data-abc='true'>" .$cat->libelle ;
                                                        }
                                                    
                                                      } ?></a></li>
                                                </ul>
                                                    <hr>
                                                <p class="mb-3"><?=$product->description?></p>
                                                    <hr>
                                                <!-- <ul class="list-inline list-inline-dotted mb-0">
                                                    <li class="list-inline-item">All items from <a href="#" data-abc="true">Mobile point</a></li>
                                                    <li class="list-inline-item">Add to <a href="#" data-abc="true">wishlist</a></li>
                                                </ul> -->
                                            </div>

                                            <div class="mt-3 mt-lg-1 ml-lg-3 text-center">
                                                <h3 class="mb-0 font-weight-semibold">$<?=$product->prix_vent?></h3>

                                                <!-- <div>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>

                                                </div> -->

                                                <div class="text-muted">Quantite : <?=$product->quantite?></div>

                                                <div class="d-flex justify-content-between ">
                                                    <a href="../views/Update.php?id_product=<?=$product->reference?>" ><i class="fa fa-wrench fa-2x" aria-hidden="true"></i></a>
                                                    <a href="../routes/SoftDelete.php?id_product=<?=$product->reference ;?>&table=produit" onclick="return confirm('Are you sure you want to delete this Product <?= strtoupper($product->libelle ) ;?>')"><i class="fa fa-trash fa-2x" aria-hidden="true"></i></a>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                 </div>
                                  <?php }?>
                            </div>
                   </div>




   </main>

<?php }
 IncluceFooter() ;
?>
