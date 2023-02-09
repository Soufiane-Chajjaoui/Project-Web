<?php  
require_once("../models/DAO.php");
use DATABASE_QUERY\DAO ;

class Fournisseur{
	protected $id;
 	protected $nom;
	protected $prenom;
 	protected $telephone;
	protected $email;
    protected $adress ;
	protected $photo ;
	protected $role ;

//  protected $TimeDelete ;


	function __get($prop){
		switch ($prop) {
			case 'id': return $this->id;  break;
			case 'nom': return $this->nom;  break;
			case 'prenom': return $this->prenom;  break;
			case 'adress': return $this->adress;  break;
			case 'photo': return $this->photo;  break;
			case 'telephone': return $this->telephone;  break;
			case 'email': return $this->email;  break;
			case 'role': return $this->role;  break;

		//  case 'TimeDelete': return $this->TimeDelete;  break;

		}
	}
	function __construct($id,$n,$p,$t,$addr,$e,$photo,$r){
		    $this->id=$id;
 			$this->nom=$n;
			$this->prenom=$p;
            $this->adress = $addr ;
 			$this->photo=$photo;
 			$this->telephone=$t;
			$this->email=$e;
			$this->role=$r;

			

	}
	static function SoftDelete($id,$role){		
		 
		return DAO::DeletePerson($id,$role);
	}
	function save(){
		 
		return DAO::enregistrerFournisseur($this->prenom,$this->adress,$this->nom,$this->telephone,$this->email,$this->photo);
	}
	static function listeFournisseurs(){		
		 
		return DAO::listeFournisseur();
	}
	static function getperson($id){		
		 
		return DAO::getPerson($id);
	}


	function update(){
		 
	  return	DAO::updatePerson($this->id ,$this->nom, $this->prenom ,$this->telephone ,$this->adress,$this->email,$this->photo);
	}
}
?>

