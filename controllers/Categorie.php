<?php
require_once("../models/DAO.php");
use DATABASE_QUERY\DAO ;

  class Categoire {

    private $id_cat ;
    private $libelle ;


    function __get($name)
    {
        switch($name){

            case "id_cat":return $this->id_cat ; break ;
            case "libelle":return $this->libelle ; break ;
        }
    }
    function __construct($id , $titre)
    {
        $this->id_cat = $id ; 
        $this->libelle = $titre ;
    }

    function save(){

        return DAO::enregistrerCategorie($this->libelle) ;
    }

    static function listeCategorie(){

        return DAO::listCategories() ;
    }
    

  }
  