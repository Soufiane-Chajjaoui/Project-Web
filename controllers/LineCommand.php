<?php

use DATABASE_QUERY\DAO as DB;

    require_once("../models/DAO.php");
    
class LineCommand {

    private $id_line ;
    private $ref_command ;
    private $reference ;
    private $qnt ;



    function __construct(   $id_line ,$ref_command ,$reference ,$qnt = 1 )
    {

        $this->id_line  = $id_line;
        $this->ref_command = $ref_command;
        $this->reference = $reference  ;
        $this->qnt = $qnt;

     }

    function __get($name)
    {
        switch($name){

            case 'id_line' : return $this->id_line;break;
            case 'ref_command' : return $this->ref_command;break;
            case 'reference' : return $this->reference;break;
            case 'qnt' :return $this->qnt ;

        }
    }

       function storeLineCommand(){

        return DB::enregistrerLine($this->ref_command , $this->reference , $this->qnt ) ;
    }



}