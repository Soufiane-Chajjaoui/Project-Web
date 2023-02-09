<?php  
require_once("../models/DAO.php");
require_once("../controllers/Fournisseur.php");
   use DATABASE_QUERY\DAO ;
class Client extends Fournisseur{
 	

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

	function save(){
		 
		return DAO::enregistrerClient($this->prenom,$this->adress,$this->nom,$this->telephone,$this->email,$this->photo);
	}
       static function listeClients(){		
		 
		return DAO::listeClient();
	 }
	static function SoftDelete($id,$role){		
		 
		return DAO::DeletePerson($id,$role);
	}


	// function update(){
		 
	// 	DAO::updateClient($this->id,$this->nom,$this->adresse,$this->telephone,$this->email);
	// }
}
?>

