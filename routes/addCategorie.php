<?php
   
    require_once("../controllers/Categorie.php");
    require_once("../routes/Route.php");

   extract($_POST);
   if (!empty($libelle)){
   $Categorie = new Categoire("",$libelle);

   $Categorie->save() ;

   } 

   Route::Path("../views/categories.php") ;

