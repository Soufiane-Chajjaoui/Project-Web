<?php 
    require_once("../Session/TestSession.php") ;         
    require_once("../controllers/Categorie.php");

       IncluceNav() ;
      $categories = Categoire::listeCategorie() ;
     
?>   

   <main>
                  <div class="container-fluid px-4 ">

                     <h1 class="mt-4">Categories</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Categories</li>
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
                                                <form action="../routes/addCategorie.php" method="POST" >
                                                
                                            
                                                
                                    
                                                <div class="row">
                                                    <div class="col-md-12 mb-4 d-flex align-items-center">
                                    
                                                    <div class="form-outline datepicker w-100">
                                                        <label for="libelle" class="form-label">Libelle *</label>
                                                        <input required type="text"  class="form-control form-control-lg" id="libelle" placeholder="Libelle " name="libelle"/>
                                                        
                                                    </div>
                                    
                                                    </div>
                                                    </div>
                                                     
                                    
                                                
                                    
                                                    
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

                   </div>
                        <div class="row m-2">
                <?php foreach($categories as $element) { ?>
                            <div class="col-xl-2 col-md-2">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><?= $element->libelle?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../views/products.php?id_categorie=<?= $element->id_cat?>">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>


          </div>
   </main>

<?=   IncluceFooter() ;?>
