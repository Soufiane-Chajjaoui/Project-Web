<?php 
namespace DATABASE_QUERY  ;
    use \PDO;
 	use \Fournisseur;
	use \Product;
	use \Categoire;
	use \Client;
	use \LineCommand ;
    use \Order;

  require_once("../controllers/LineCommand.php") ;
  require_once("../controllers/Client.php");
  require_once("../controllers/Order.php");

  require_once("../controllers/Fournisseur.php");
  require_once("../controllers/Categorie.php");
  require_once("../controllers/Product.php");

class DAO{
	static function getPDO(){
		return new PDO("mysql:host=localhost;dbname=projet_bakkas","root","");
	}
	static function getUser($login , $password){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("SELECT * FROM admin where email =? and password =? ;");
		$res->execute(array($login,$password));
 		return   $res->fetchObject();
	}
	static function enregistrerAdmin($n,$p,$t,$e,$pass,$photo){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("insert into admin (	nom ,	prenom ,	phone ,	email 	,password ,	photo 	) values (?,?,?,?,?,?);");
		$res->execute(array($n,$p,$t,$e,$pass,$photo));
	}
	
	static function enregistrerClient($pre,$adr,$nom,$tele,$mail,$photo){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("insert into person (	prenom ,	nom ,	numero_tele ,	email ,	adress ,	photo , role_as	) values (?,?,?,?,?,?,?);");
		$res->execute(array($pre,$nom,$tele,$mail,$adr,$photo,0));
	}
	static function enregistrerFournisseur($pre,$adr,$nom,$tele,$mail,$photo){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("insert into person (	prenom ,	nom ,	numero_tele ,	email ,	adress ,	photo , role_as	) values (?,?,?,?,?,?,?);");
		$res->execute(array($pre,$nom,$tele,$mail,$adr,$photo,1));
	}
	static function listeFournisseur(){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("SELECT * FROM person WHERE role_as = 1 AND deleteAt IS NULL;");
		$res->execute();
		$lst=[];
		while($ligne=$res->fetch()){
			$lst[]=new Fournisseur($ligne["id"],$ligne["nom"],$ligne["prenom"],$ligne["numero_tele"],$ligne["adress"],$ligne["email"],$ligne["photo"],$ligne["role_as"]);
		}
		return $lst;
 	}
	 static function listeClient(){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("SELECT * FROM person WHERE role_as = 0 AND deleteAt IS NULL;");
		$res->execute();
		$lst=[];
		while($ligne=$res->fetch()){
			$lst[]=new Client($ligne["id"],$ligne["nom"],$ligne["prenom"],$ligne["numero_tele"],$ligne["adress"],$ligne["email"],$ligne["photo"],$ligne["role_as"]);
		}
		return $lst;
 	}
	
	static function authentification($login,$password){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("SELECT * FROM admin where email =? and password =? ;");
		$res->execute(array($login,$password));
		if($res->fetch()) return True;
		return False;
	}
	static function DeletePerson($id,$role){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("UPDATE person SET  deleteAt = ? where id=? AND role_as = ? ;");
		$res->execute(array(date("Y-m-d h:i:sa"),$id,$role));
 
	}
	static function updatePerson($id,$nom,$prenom,$tele,$adress,$email,$photo){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("UPDATE  person SET prenom = ? , 	nom = ? , 	numero_tele = ? , 	email = ? , 	adress = ? , 	photo = ?  WHERE id = ? ; ");
		$res->execute(array($prenom , $nom,$tele,$email,$adress,$photo,$id));
	}
	static function getPerson($id){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("SELECT * FROM person where id=?;");
		$res->execute(array($id));

		if($ligne=$res->fetch()){
			return new Fournisseur($ligne["id"],$ligne["nom"],$ligne["prenom"],$ligne["numero_tele"],$ligne["adress"],$ligne["email"],$ligne["photo"],$ligne["role_as"]);
		}
		return null;
	}

	static function enregistrerCategorie($titre){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("insert into categorie (	libelle ) values (?);");
		$res->execute(array($titre));
	}
	

	static   function listCategories()
	{
		$pdo = DAO::getPDO();
        $res = $pdo->prepare("SELECT * FROM categorie WHERE deleteAt IS NULL") ;
		$res->execute() ; 
		$lst = array() ;
		while($ligne = $res->fetch()){

			$lst[] = new Categoire($ligne['id_categorie'],$ligne['libelle']) ;
		}
		return $lst ;


	}


static function enregistrerProduct($lib ,$desc ,$qnt ,$PA ,$PV ,$photo ,$id_cat){
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("insert into produit ( libelle, description ,quantite ,prix_achat ,prix_vent ,photo_produit ,id_categorie ) values (?,?,?,?,?,?,?);");
		$res->execute(array($lib , $desc  , $qnt ,$PA ,$PV ,$photo ,$id_cat));
	}

	static function  UpdateProduct( $reference , $desc ,$libelle,$quantite,$id_cat,  $prix_achat , $prix_vent , $photo_produit   ) 
      {
		$pdo=DAO::getPDO();
		$res=$pdo->prepare("UPDATE produit SET  libelle = ? ,description = ? ,quantite = ? ,prix_achat = ? ,prix_vent = ?  ,id_categorie = ? , deleteAt =NULL  where reference = ?   ;");
	  
		$res->execute([ $libelle,$desc ,$quantite,  $prix_achat , $prix_vent  , $id_cat ,   $reference ]) ;
	}

	static function ListeProduct(){
      
		$pdo = DAO::getPDO();
        $res = $pdo->prepare("SELECT * FROM produit WHERE deleteAt IS  NULL AND quantite > 0") ;
		$res->execute() ; 
		$lst = array() ;
		while($ligne = $res->fetch()){

			$lst[] = new Product($ligne['reference'] , $ligne['libelle'], $ligne['description'] ,$ligne['quantite'],$ligne['prix_achat'],$ligne['prix_vent'],$ligne['photo_produit'],$ligne['id_categorie']) ;
		}
		return $lst ;
	}
	static function ListeProductBycat($id){
      
		$pdo = DAO::getPDO();
        $res = $pdo->prepare("SELECT * FROM produit WHERE deleteAt IS  NULL and id_categorie = ?") ;
		$res->execute(array($id)) ; 
		$lst = array() ;
		while($ligne = $res->fetch()){

			$lst[] = new Product($ligne['reference'] , $ligne['libelle'], $ligne['description'] ,$ligne['quantite'],$ligne['prix_achat'],$ligne['prix_vent'],$ligne['photo_produit'],$ligne['id_categorie']) ;
		}
		return $lst ;
	}

	static function SoftDeletes($id , $table){
		
		$pdo = DAO::getPDO();
		switch($table){
			case "produit" : 
				$res=$pdo->prepare("UPDATE produit SET  deleteAt = ? where reference=? ");
				$res->execute(array(date("Y-m-d h:i:sa"),$id)) ; break ;
				
			case "command" : 
				$res=$pdo->prepare("UPDATE command SET  deleteAt = ? where ref_command =? ");
				$res->execute(array(date("Y-m-d h:i:sa"),$id)) ; break ;
		}
	}

	static function getElement($id ,$table){

		$pdo = DAO::getPDO();
          switch($table){

			case "Quantite" : 
				$res=$pdo->prepare("SELECT quantite FROM produit where reference=?;") ;
	         	$res->execute(array($id)) ; 
		 
		      
               return $res->fetchObject()->quantite ; break ;

			case "produit" : 
				$res=$pdo->prepare("SELECT * FROM $table where reference=?;") ;
	         	$res->execute(array($id)) ; 
		 
		       $res = $res->fetch();
		       $element = new Product($res['reference'] , $res['libelle'], $res['description'] ,$res['quantite'],$res['prix_achat'],$res['prix_vent'],$res['photo_produit'],$res['id_categorie']) ;

               return $element ; break ;
			   
			   case "produit" : 
				$res=$pdo->prepare("SELECT * FROM $table where reference=?;") ;
	         	$res->execute(array($id)) ; 
		 
		       $res = $res->fetch();
		       $element = new Order($res['id_command'] , $res['date_res'], $res['id_person'] ,$res['id_product']) ;

               return $element ; break ;
              
			   case 'Facture' :
				$res= $pdo->prepare("SELECT * FROM command JOIN line_de_command JOIN person JOIN produit ON command.id = person.id AND command.ref_command = ? AND line_de_command.ref_command = ? AND line_de_command.reference = produit.reference; " ) ;
                $res->execute(array($id, $id));
				
				return $res->fetch() ; break ;
				case 'Prod' :
					$res= $pdo->prepare("SELECT * FROM command JOIN line_de_command JOIN person JOIN produit ON command.id = person.id AND command.ref_command = ? AND line_de_command.ref_command = ? AND line_de_command.reference = produit.reference; " ) ;
					$res->execute(array($id, $id));
					
					return $res ; break ;

	        }
	}

	static function enregistrerOrder($id_person)
	
	{
        $pdo = DAO::getPDO() ;
         $res = $pdo->prepare("INSERT INTO command (  `id` ) VALUES (?) ;") ;
		 $res->execute(array($id_person ));

	}



	static function getlastElement(){

		$pdo = DAO::getPDO() ;
         $res = $pdo->prepare(" SELECT ref_command FROM  command ORDER BY ref_command DESC LIMIT 1 ;") ;
		 $res->execute();
		  return $res->fetchObject()->ref_command  ;
      //  return new Order($last['ref_command'],$last['date'],$last['id'],$last['reference']) ;
	}

	static function ListeCommand(){
		
		$pdo = DAO::getPDO() ;
		$res = $pdo->prepare("SELECT DISTINCT(command.ref_command) , date , person.nom , person.prenom , statut FROM command JOIN person ON command.id = person.id; ") ;
		$res->execute();
         $lst = array() ;
		   while($ligne = $res->fetch()){

		 	$lst[] = new Order($ligne['ref_command'] , $ligne['date'] , strtoupper($ligne['nom'])  . "  " .$ligne['prenom']  , $ligne['statut'] ) ;
		   }

		   return $lst ;
	}

	static function enregistrerLine($id_command  ,$reference ,$qnt )
	
	{
		 $Qnt = DAO::getElement($reference , 'Quantite') ;
          
		 if($Qnt == 0) return "you can't take this product " ;
        //  elseif($qnt > $Qnt) return "you can't take this product " ;
		//  else 
         $pdo = DAO::getPDO() ;

         $res = $pdo->prepare("INSERT INTO line_de_command ( ref_command ,   reference  ,  qnt  ) VALUES (?,?,?) ;") ;
		 
		 $res->execute(array($id_command  ,$reference ,$qnt ));

		 $res = $pdo->prepare("UPDATE produit SET  quantite = ? , deleteAt = null WHERE  reference = ?;") ;

		 $res->execute(array($Qnt - $qnt , $reference  ));
             return true ;


	}

	

	static function ListeLineCommand()
	
	{
        $pdo = DAO::getPDO() ;
         $res = $pdo->prepare("SELECT * FROM line_de_command  ") ;
		 $res->execute();
         $list = [] ;
		 while($ligne = $res->fetch()){

			$list[] = new LineCommand($ligne['id_line'],$ligne['ref_command'],$ligne['reference'],) ;
		 }
		 return $list ;

	}

	static function chartBarOne(){
		$pdo = DAO::getPDO() ;
		$res = $pdo->prepare("SELECT MONTH(date) as nb , count(ref_command) as nb_command FROM command GROUP BY nb;  ") ;
		$res->execute();
          $month = array() ;
 
		foreach($res as $data) {

			$month[] = $data['nb'];
 		}
      return  $month ;

	}
	static function chartBarTwo(){
		$pdo = DAO::getPDO() ;
		$res = $pdo->prepare("SELECT MONTH(date) as nb , count(ref_command) as nb_command FROM command GROUP BY nb;  ") ;
		$res->execute();
           
		  $order = array() ;

		foreach($res as $data) {

			 
			$order[] = $data['nb_command'] ;
		}

     return $order ;
	}

	static function ProductByQnt(){
		$pdo = DAO::getPDO() ;
		$res = $pdo->prepare("SELECT produit.libelle as prod ,SUM(line_de_command.qnt) as qnt , COUNT(produit.reference) as nb , line_de_command.reference as nb_produit FROM produit JOIN line_de_command WHERE line_de_command.reference = produit.reference GROUP BY nb_produit; ") ;
		$res->execute();
           
		   return $res ;
	}

	// ########### QUERY FOR PRODUCT AND HIM QUANTITE ##########
	//  select produit.libelle as prod ,SUM(line_de_command.qnt) as qnt , COUNT(produit.reference) as nb , line_de_command.reference as nb_produit FROM produit JOIN line_de_command WHERE line_de_command.reference = produit.reference GROUP BY nb_produit; 





	
	// static function getName($login , $password){
	// 	$pdo=DAO::getPDO();
	// 	$res=$pdo->prepare("SELECT * FROM admin where email =? and password =? ;");
	// 	$res->execute(array($login,$password));
	// 	$res = $res->fetchObject() ;
	// 	return  $res->prenom;
	// }
	// static function getid($login , $password){
	// 	$pdo=DAO::getPDO();
	// 	$res=$pdo->prepare("SELECT * FROM admin where email =? and password =? ;");
	// 	$res->execute(array($login,$password));
	// 	$res = $res->fetchObject() ;
	// 	return  $res->id;
	// }

	
	 
	
	


}

//    $nar = DAO::getElement(101,'Facture') ;
//    $prod = $nar ;   
//     while($lign = $prod->fetchObject()  ){

//         echo $lign->libelle  . "  <br>" ;
//    }
   




?>