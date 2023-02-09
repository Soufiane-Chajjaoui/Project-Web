<?php 
   require_once "../models/DAO.php" ;
   use DATABASE_QUERY\DAO as DB ;

   class auth{
   public $email ;
    public $password ;

      function __construct($mail , $pass)
     {
     

         $this->email = $mail ;
         $this->password = $pass ;

     }

     function __get($name)
     {
      switch($name){

         case 'email' : return $this->email ; break ;
         case 'password' : return $this->password ; break ;

      }
     }

    
   function CheckAdmin(){
    
       return DB::authentification($this->email , $this->password) ;

    }
   
     function User(){
       $lname =  DB::getUser($this->email , $this->password)->nom  ; 
             
       $name =   DB::getUser($this->email , $this->password)->prenom ; 

      return strtoupper($lname) ." ". ucfirst($name) ;
    }
    function id(){
       
    return  DB::getUser($this->email , $this->password)->id  ;
     }
      function ImageUser(){
       
        return  DB::getUser($this->email , $this->password)->photo  ;
         }
    

   }
?>