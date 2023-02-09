<?php

use DATABASE_QUERY\DAO as DB;

        require_once("../controllers/Fournisseur.php");
        require_once("../controllers/Client.php");
        require_once ("Route.php") ;
        require_once("../controllers/Product.php");

      // function Delete(){
      //     $args = func_get_arg(0);
          
        if(array_key_exists("id",$_GET)){
          extract($_GET);
             if ($role_as == 1) 
             { 
               Fournisseur::SoftDelete($id,$role_as);
             
               Route::Path('../views/fournisseurs.php');
             }
             if ($role_as == 0)
             { 
               Client::SoftDelete($id,$role_as);
   
               Route::Path('../views/clients.php');
             } 
       }
   
       if(array_key_exists("id_product",$_GET)){
         extract($_GET);
   
         DB::SoftDeletes($id_product,$table);
         Route::Path('../views/products.php');
       }
      // }
   
    
    // if((isset($_GET['id_cat']))){
    //     Product::SoftDelete($_GET['id_cat']);
    //     Route::Path('../views/clients.php');

    // }

?>