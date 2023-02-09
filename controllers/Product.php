<?php
 require_once("../models/DAO.php");
  use DATABASE_QUERY\DAO ;
  
 class  Product {

private $reference ;
private $description ;

private $libelle ;
private $quantite ;
private $prix_achat ;
private $prix_vent ;
private $photo_produit ;
private $id_categorie ;

          function __construct($ref ,$lib ,$desc,$qnt ,$PA ,$PV ,$photo ,$id_cat )
          {
            $this->description = $desc ;
            $this->reference = $ref ;
            $this->libelle = $lib;
            $this->quantite = $qnt;
            $this->prix_achat = $PA;
            $this->prix_vent = $PV;
            $this->photo_produit = $photo;
            $this->id_categorie = $id_cat;
            
          }

          function __get($name)
          {
            switch($name){
              case "description" :return $this->description ;break;

                case "reference" :return $this->reference ;break;
                case "libelle" :return $this->libelle ;break;
                case "quantite" :return $this->quantite ;break;
                case "prix_achat" :return $this->prix_achat ;break;
                case "prix_vent" :return  $this->prix_vent;break;
                case "photo_produit" :return $this->photo_produit;break;
                case "id_categorie" :return $this->id_categorie ;break;
            }
          }
           function save(){

            return DAO::enregistrerProduct( $this->libelle ,$this->description ,$this->quantite,  $this->prix_achat , $this->prix_vent , $this->photo_produit, $this->id_categorie) ;
          }
         static function update($reference,$libelle,$description,$quantite,$prix_achat,$prix_vent, $id_categorie){

            return DAO::UpdateProduct($reference,$libelle,$description,$quantite,$prix_achat,$prix_vent,$id_categorie,NULL) ;
          }
           static function ListeProducts(){
             return DAO::ListeProduct() ;
          }
          static function ListeProductsById($id){
            return DAO::ListeProductBycat($id) ;
         }
         static function dashProd(){

          return DAO::ProductByQnt() ;
         }
       
          static function SoftDelete($reference){

            return DAO::SoftDeletes($reference , "produit");
          }
          static function getProduct($id){

            return DAO::getElement($id , "produit");
          }



 }