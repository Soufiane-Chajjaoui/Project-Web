<?php
 require_once("../controllers/Fournisseur.php");
 require_once("../routes/Route.php");

 extract($_POST);
 if(!empty($name)&&!empty($second_name)&&!empty($email)&&!empty($tele)&&!empty($adress)){
    $targetDir = "../Uploads/";
     $fileName = basename($_FILES["photo"]["name"]);
    $fileType = pathinfo($fileName,PATHINFO_EXTENSION);
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if (in_array($fileType,$allowTypes)) {
            $photo = $targetDir . time().".".$fileType;
            move_uploaded_file($_FILES["photo"]["tmp_name"], $photo) ;
    }
 
     else {
        $photo = $targetDir."285655_user_icon.png" ;
    } 
      $f = new Fournisseur(NULL,$name,$second_name,$tele,$adress,$email,$photo,NULL) ;
      $f->save() ;
       Route::Path("../views/fournisseurs.php") ;

  }else  Route::Path("../views/fournisseurs.php") ;
