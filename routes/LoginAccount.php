<?php
    require_once ("../controllers/user.php") ;
    require_once ("../controllers/AuthLogin/auth.php") ;
    require_once ("Route.php") ;
   
  
         extract($_POST) ; 
    if (!empty($email)&&!empty($password) ){
      $Auth = new auth($email,$password) ;
        if($Auth->CheckAdmin()){
            session_start();
            $_SESSION['photo'] = $Auth->ImageUser()   ;
            $_SESSION['id'] = $Auth->id()      ;
            $_SESSION['auth'] = $Auth->User();
            if ($LongTimeUse==1){
                $_SESSION['time_to_out'] = time() + 60 * 60 *12;

            } else {
                $_SESSION['time_to_out'] = time() ;

            }
            Route::Path("../views/dashboard.php") ;
        }
        else { 
            Route::Path("location:../index.php") ;
         }
        
    }else { 
        Route::Path("location:../index.php") ;
         }


//   function name(){
//             extract($_POST) ;

//             $Auth = new auth($email,$password) ;
//            return $Auth->User();
//          } 
        
      
?>