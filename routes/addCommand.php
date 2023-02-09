<?php
    // error_reporting(E_ERROR | E_PARSE);

     require_once("../controllers/Order.php") ;
     require_once("../controllers/LineCommand.php") ;
     require_once("../routes/Route.php");


   
     extract($_GET) ;

//      foreach($qnt as $key => $value_qnt){
//       if ($value_qnt != 0) {
//   echo $value_qnt;
//   // echo $value ;
//    ;
//       }
// }
      //  print_r($qnt) ;
      //  print_r($id_prod) ;
//      if(!empty($client) && !empty($id_prod)  ) {

//            TestLine($client , $id_prod);

//      } elseif (!empty($client)){

//       $errors = "Obligie Choise Un Personne" ;

//      } elseif (!empty($id_prod)) {

//         $errors = "En moins Choise Un Produit" ;

//      } else {
//   }
    //  TestLine($client , $id_prod , $qnt) ;

    


        

 
      $id_client =   explode(":",$client);
      $id_client = reset($id_client) ;
      $newOrder = new Order(null , null ,  $id_client , null) ;
      $newOrder->storeOrder();
       $id_order = Order::lastRef() ;
        
         for ( $i=0 ; $i<count($id_prod) ; $i++){

          $newLine = new LineCommand(NULL , $id_order ,$id_prod[$i] , $qnt[$i]);
          // echo $value_qnt ;
          $newLine->storeLineCommand() ;
        }
 

  
       Route::Path("../views/caisse.php") ;

    

     // $order = new Order(null , null ,$id_per , $id_pro);
