<?php
require_once("../routes/Route.php");
require_once("../controllers/Product.php") ;
 extract($_POST);
 $targetDir = "../Uploads/";
     $fileName = basename($_FILES["photo"]["name"]);
    $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if (in_array($fileType,$allowTypes)) {
                   $photo = $targetDir . time().".".$fileType;
                   move_uploaded_file($_FILES["photo"]["tmp_name"], $photo) ;
    }
 
     else {
        $photo = $targetDir."pngwing.png" ;
    } 
   $prod = new Product("",$libelle,$description,$quantite,$prix_achat,$prix_vent,$photo,$id_categorie) ;

    $prod->save() ;
     Route::Path("../views/products.php") ;
    ?>

