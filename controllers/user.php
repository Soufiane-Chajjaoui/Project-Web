<?php  
require_once("../models/DAO.php");
use DATABASE_QUERY\DAO ;

class person{
 	private $nom;
	private $prenom;
 	private $telephone;
	private $email;
	private $password ;
	private $photo ;

	// function __get($prop){
	// 	switch ($prop) {
	// 		case 'id': return $this->id;  break;
	// 		case 'nom': return $this->nom;  break;
	// 		case 'prenom': return $this->prenom;  break;
	// 		case 'password': return $this->password;  break;
	// 		case 'photo': return $this->photo;  break;
	// 		case 'telephone': return $this->telephone;  break;
	// 		case 'email': return $this->email;  break;
	// 	}
	// }
	function __construct($n,$p,$t,$e,$pass,$photo){
 			$this->nom=$n;
			$this->prenom=$p;
			$this->password=$pass;
			$this->photo=$photo;
 			$this->telephone=$t;
			$this->email=$e;
	}
	function save(){
		 
		return DAO::enregistrerAdmin($this->nom,$this->prenom,$this->telephone,$this->email,$this->password,$this->photo);
	}
	// static function listeDesClients(){		
		 
	// 	return DAO::listeClients();
	// }
	// static function getClient($id){		
		 
	// 	return DAO::getClient($id);
	// }


	// function update(){
		 
	// 	DAO::updateClient($this->id,$this->nom,$this->adresse,$this->telephone,$this->email);
	// }
}
?>

