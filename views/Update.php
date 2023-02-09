<?php 
    require_once("../Session/TestSession.php") ;     
    require_once("../controllers/Client.php");
    require_once("../controllers/Fournisseur.php");
    
    IncluceNav() ;
	if (array_key_exists("id",$_GET)){
    extract($_GET) ;
    $data = Fournisseur::getperson($id);
     
 ?>
              <!-- Update Person -->

        <main>  
			<div class="container-fluid px-4 ">

					<h1 class="mt-4">Modifie les Données</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item "><?php if($data->role == 1)
						{echo "<a  href='../routes/ListeFournisseur.php'>Fourniseurs</a>" ;
						 }else echo "<a  href='../routes/ListeClients.php' style='underline:none;'>Clients</a>"?></li>
						<li class="breadcrumb-item active">Modifie les Données</li>

					</ol>
			 

			  </div>
			  <hr>
        <div class="container pt-3">
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="<?= $data->photo;?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
								<div class="mt-3">
									<h4><?= $data->nom . " " . $data->prenom ;?></h4>
									<p class="text-secondary mb-1"><?php if ($data->role==1) echo "Fournisseur" ;else echo "Client" ?></p>
									<p class="text-muted font-size-sm"><?= $data->adress ;?></p>
									<button class="btn btn-primary">Follow</button>
									<button class="btn btn-outline-primary">Message</button>
								</div>
							</div>
							 
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card"> 
                        <form action="../routes/Update_data.php" method="POST"  enctype="multipart/form-data">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
                                   
									<h6 class="mt-1">Nom</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?= $data->nom?>" name="nom">
                                    <input type="hidden" class="form-control" value="<?= $data->id?>" name="id">
                                    <input type="hidden" class="form-control" value="<?= $data->role?>" name="role">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mt-1">Prénom</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?= $data->prenom?>" name="prenom">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mt-1">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?= $data->email?>" name="email">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mt-1">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?= $data->telephone?>" name="tele">
								</div>
							</div>
                            <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mt-1">Photo Profil</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="file" class="form-control" value="<?= $data->photo?>" name="photo">
								</div>
							</div>
							
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mt-1">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="<?= $data->adress?>" name="adress">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3  "></div>
								<div class="col-sm-9 text-secondary d-flex justify-content-end ">
									<input type="submit" class="btn btn-primary px-4" value="Save Changes">
								</div>
							</div>
						</div>
                        </form>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">
									<h5 class="d-flex align-items-center mb-3">Project Status</h5>
									<p>Web Design</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>Website Markup</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>One Page</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>Mobile Template</p>
									<div class="progress mb-3" style="height: 5px">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<p>Backend API</p>
									<div class="progress" style="height: 5px">
										<div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
        </main>

         <!-- Update Product -->

		<?php   }
		else  if (array_key_exists("id_product",$_GET)) { 
			extract($_GET) ;
			$proUp = Product::getProduct($id_product) ;
		 
?>

		<main>  
		<div class="container-fluid px-4 ">

				<h1 class="mt-4">Modifie les Données</h1>
				<ol class="breadcrumb mb-4">
					<li class="breadcrumb-item "> 
					   <a  href='../views/products.php' >Produits</a></li>
					<li class="breadcrumb-item active">Modifie les Données</li>

				</ol>
		 

		  </div>
		  <hr>
	<div class="container pt-3">
	<div class="main-body">
		<div class="row">
			<div class="col-lg-4">
				<div class="card">
					<div class="card-body">
						<div class="d-flex flex-column align-items-center text-center">
							<img src="<?= $proUp->photo_produit;?>" alt="photo_product" class="rounded-circle p-1 bg-primary" width="110"  >
							<div class="mt-3">
								<h4><?= $proUp->libelle ;?></h4>
								<p class="text-secondary mb-1"><?= $proUp->description ;?></p>
								<p class="text-muted font-size-sm"><?= $proUp->quantite ;?></p>
								</div>
						</div>
						 
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="card"> 
					<form action="../routes/Update_data.php" method="POST"  enctype="multipart/form-data">
					<div class="card-body">
						<div class="row mb-3">
							<div class="col-sm-3">
							   
								<h6 class="mt-1">Libelle</h6>
							</div>
							<div class="col-sm-9 text-secondary">
								<input  type="text" class="form-control" value="<?= $proUp->description?>"  name="description" />
							 </div>
						</div>
						<div class="row mb-3">
							<div class="col-sm-3">
								<h6 class="mt-1">Prix d'achat</h6>
							</div>
							<div class="col-sm-3 text-secondary">
								<input type="text" class="form-control" value="<?= $proUp->prix_achat?>" name="prix_achat">
							</div>
						
							<div class="col-sm-3">
								<h6 class="mt-1">Prix de Vent</h6>
							</div>
							<div class="col-sm-3 text-secondary">
								<input type="text" class="form-control" value="<?= $proUp->prix_vent?>" name="prix_vent">
							</div>
						</div>
						<div class="row mb-3">
							<div class="col-sm-3">
								<h6 class="mt-1">Quantite</h6>
							</div>
							<div class="col-sm-4 text-secondary">
								<input type="number" class="form-control" value="<?= $proUp->quantite?>" name="quantite">
							</div>
						
							<div class="col-sm-5">
								<div class="form-outline">
								 <select class="form-select" id="categorie" name="id_categorie" aria-label=".form-select-lg example">
								 <option value="<?= $proUp->id_categorie?>" selected> Modifie Categorie </option>

								<?php    
								 $categories = Categoire::listeCategorie() ;
									 foreach($categories as $cat) { ?>
								<option value="<?= $cat->id_cat?>">  <?= $cat->libelle ;}?></option>
								
								</select>
								</div>
								</div>
						</div>
						
						<!-- <div class="row mb-3">
							<div class="col-sm-3">
								<h6 class="mt-1">Photo de Produit</h6>
							</div>
							<div class="col-sm-9 text-secondary">
								<input type="file" class="form-control" value="<?//= $proUp->photo_produit?>"   name="photo"/>
							</div>
						</div> -->
							<div class="row mb-3">
							<div class="col-sm-3">
								<h6 class="mt-1">Description</h6>
							</div>
							
							 <div class="col-sm-9 text-secondary">
								<textarea type="text" class="form-control"  name="libelle"><?= $proUp->libelle?> </textarea>
								<input type="hidden" class="form-control" value="<?= $proUp->reference?>" name="reference">
							 </div>
						</div>
						<div class="row">
							<div class="col-sm-3  "></div>
							<div class="col-sm-9 text-secondary d-flex justify-content-end ">
								<input type="submit" class="btn btn-primary px-4" value="Save Changes">
							</div>
						</div>
					</div>
					</form>
				</div>
				 
			</div>
		</div>
	</div>
</div> 
	</main>
          

		<?php } ;?>
<?=   IncluceFooter() ;?>