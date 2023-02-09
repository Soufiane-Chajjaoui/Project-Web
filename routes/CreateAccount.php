<?php
	require_once("../controllers/user.php");
	require_once "Route.php" ;
	session_start() ;

	extract($_POST);
	if (!empty($nom)&&!empty($prenom)&&!empty($phone)&&!empty($email)&&!empty($password) ){
				$targetDir = "../Uploads/";
				$fileName = basename($_FILES["photo"]["name"]);
				$fileType = pathinfo($fileName,PATHINFO_EXTENSION);
				$_SESSION['auth'] = $prenom ;
				$allowTypes = array('jpg','png','jpeg','gif','pdf');
					if (in_array($fileType,$allowTypes)) {
						$photo = $targetDir . time().".".$fileType;
						move_uploaded_file($_FILES["photo"]["tmp_name"], $photo) ;
				} else {
					$photo = $targetDir."user_profil.png" ;
				} 

			$c=new person($nom,$prenom,$phone,$email,$password ,$photo);
			$c->save();
			Route::Path("../") ;

		}
		else {
			Route::Path("../views/registre.php") ;
	
}
?>