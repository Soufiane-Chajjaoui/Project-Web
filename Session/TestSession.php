  <?php 
         session_start() ;
         function TestSession(){
      if (isset($_SESSION['auth'])) {
          if( time() - $_SESSION['time_to_out'] > 60*60*4 )  {
             session_destroy() ;
             header("location:../") ;

             return false ;
         
         }else  
           return true ;
        } else  return header("location:../") ;
        }

      function IncluceNav() {
          
        if(TestSession()){
              include "../nav/navbar.php";  

        }

      }
      function IncluceFooter() {
          
        if(TestSession()){
              include "../nav/footer.html";  

        }

      }
      
?>  