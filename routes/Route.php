<?php 
  class Route{

       static function Path($chemin)
      {
        return header("location:".$chemin) ;
      }

  }

?>