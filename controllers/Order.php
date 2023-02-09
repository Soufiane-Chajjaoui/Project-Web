<?php 
 
require_once("../models/DAO.php");
use DATABASE_QUERY\DAO as DB ;
 
     class Order{

      private $id_command ;
      private $date_res  ;
      private $id_person ;
      private $statut ;
 

      function __construct($id_command , $date_res , $id_person , $statut)
      {
        $this->id_command = $id_command ;
        $this->date_res  =$date_res  ;
        $this->id_person = $id_person;
        $this->statut = $statut ;
 
         }
      function __get($name)
      {
        switch($name){

            case 'id_command' :return $this->id_command ; break  ;
            case 'date_res' :return $this->date_res  ; break ;
            case 'id_person' :return $this->id_person  ;break ;
            case 'statut' :return $this->statut ; break ;

        }
      }

      function storeOrder()
      
      {

       return DB::enregistrerOrder($this->id_person) ;

      }

       static function listeOrders()
      {
        return DB::ListeCommand() ;
      }

      static function lastRef(){

        return DB::getlastElement() ;
      }
      static function Invoice($id){

        return DB::getElement($id,"Facture") ;
      }
      static function infoProduct($id){

        return DB::getElement($id,"Prod") ;
      }

      static function  chart($data){


        switch($data){

          case 'month' : return DB::chartBarOne() ; break ;
          case 'command' : return DB::chartBarTwo() ; break ;
    
        }
      }
       

       

     }
 