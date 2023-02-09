<?php
       
  require_once("../controllers/Client.php");
  require_once("../controllers/Fournisseur.php");
  require_once("../routes/Route.php");
  require_once("../controllers/Product.php");

  
 

  if(array_key_exists("id",$_POST)){
    extract($_POST) ;

    $targetDir = "../Uploads/";
    $fileName = basename($_FILES["photo"]["name"]);
    $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if (in_array($fileType,$allowTypes)) {
            $photo = $targetDir . time().".".$fileType;
            move_uploaded_file($_FILES["photo"]["tmp_name"], $photo) ;
    }

    else {
        $photo = $targetDir . "285655_user_icon.png" ;
    } 
     $DataToUp =  new Fournisseur($id,$nom,$prenom,$tele,$adress,$email,$photo,"");
    $DataToUp->update();
    
    if ($role == 1 ) return   Route::Path("../views/fournisseurs.php") ;

    if ($role == 0 ) return Route::Path("../views/clients.php");
  }

 if (array_key_exists("reference",$_POST)){
    extract($_POST) ;

    $targetDir = "../Uploads/";
    $fileName = basename($_FILES["photo"]["name"]);
    $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if (in_array($fileType,$allowTypes)) {
            $photo = $targetDir . time().".".$fileType;
            move_uploaded_file($_FILES["photo"]["tmp_name"], $photo) ;
    }

    else {
        $photo = $targetDir . "pngwing.png" ;
    }   
     Product::update($reference , $description,$libelle,$quantite,$id_categorie,$prix_achat,$prix_vent);
    Route::Path("../views/products.php");


    

  }
 
?>