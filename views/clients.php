<?php 
    require_once("../Session/TestSession.php") ;         
    require_once("../controllers/Client.php");

       IncluceNav() ;
?>

<main>
                    <div class="container-fluid px-4 ">
                        <h1 class="mt-4">Clients</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Clients</li>
                        </ol>
                        <hr>
                           <div class="row">
                                       <div class="d-flex justify-content-end mb-2">
                                            <div class="ml-auto mt-2 ">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Ajoute">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                    Ajouter
                                                 </button>
                                                </div>
                                    </div>  
                            </div>
                            <div class="modal fade" id="Ajoute" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter un Fournisseur</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <section class=" gradient-custom">
                                    <div class="container ">
                                        <div class="row justify-content-center align-items-center">
                                        <div class="col-12 col-lg-12 col-xl-12">
                                            <div class="card">
                                            <div class="card-body p-2 p-md-4 shadow p-0 mb-0 bg-body rounded">


                                                <!-- Form in model-->
                                                <form action="../routes/addClients.php" method="POST"  enctype="multipart/form-data" >
                                                
                                                <div class="row">
                                                    <div class="col-md-6 mb-4">
                                    
                                                    <div class="form-outline">
                                                    <label class="form-label" for="firstName">Nom *</label> 
                                                    <input required type="text" id="firstName" class="form-control form-control-lg" name="name" />
                                                        
                                                    </div>
                                    
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                    
                                                        <div class="form-outline">
                                                        <label class="form-label" for="Prenom">Prenom *</label> 
                                                        <input required type="text" id="Prenom" class="form-control form-control-lg" name="second_name"/>
                                                        
                                                        </div>
                                    
                                                    </div>
                                                    
                                    
                                                    </div>
                                                
                                    
                                                <div class="row">
                                                    <div class="col-md-12 mb-4 d-flex align-items-center">
                                    
                                                    <div class="form-outline datepicker w-100">
                                                        <label for="Email" class="form-label">Email *</label>
                                                        <input required type="email" class="form-control form-control-lg" id="Email" placeholder="Exemple  XXXXX@gmail.com" name="email"/>
                                                        
                                                    </div>
                                    
                                                    </div>
                                                    </div>
                                                    <div class="row">

                                                    <div class="col-6 mb-4">
                                    
                                                        <div class="form-outline">
                                                        <label class="form-label" for="phoneNumber">Phone Number *</label>
                                                        <input required type="tel" id="phoneNumber" class="form-control form-control-lg" name="tele"/>
                                                        </div>
                                                   </div>
                                                   <div class="col-6 mb-4">
                                    
                                                        <div class="form-outline">
                                                        <label class="form-label" for="profil">Photo de Profil*</label>
                                                        <input required type="file" id="profil" class="form-control form-control-lg" name="photo"/>
                                                        </div>
                                                  </div>
                                                
                                                </div>
                                    
                                                <div class="row">
                                                    
                                                    
                                                    <div class="col-12 mb-2">
                                    
                                                        <div class="form-outline">
                                                        <label class="form-label" for="Email">Adresse</label>
                                                        <input required type="text" id="Email" class="form-control form-control-lg" name="adress"/>
                                                        </div>
                                                        </div>
                                                    
                                                
                                                    </div>
                                                    
                                    
                                                    
                                                    <div class="row" >
                            
                                                  
                                                   </div>
                                                    <div class="d-flex justify-content-end mt-5">
                                                        <input  type="submit" class="btn btn-primary" value="Ajoute">
                                                            </div> 
                                                
                                                    
                                                                
                                                        
                                                                
                                                </form>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </section>
                                    
                                    </div>
                                </div>
                            </div>   
                            </div> 
                       
                        <div class="card mt-2">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable  
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th><center>Profil</center></th>
                                            <th><center>Prenom</center></th>
                                            <th><center>Nom</center></th>
                                            <th><center>Telephone</center></th>
                                            <th><center>Email</center></th>
                                            <th><center>Adresse</center></th>
                                            <th colspan="2" ><center>Action</center> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                        $clients = Client::listeClients() ;
                                        foreach($clients as $client) { 
                                           ?>
                                        <tr>
                                            <td><center><img src="<?= $client->photo ;?>" title="<?= $client->prenom . " " .$client->nom ;?>"  width="32px" height="28px"  alt="" ></center></td>
                                            <td><?= $client->prenom ;?></td>
                                            <td><?= $client->nom ;?></td>
                                            <td><?= $client->telephone ;?></td>
                                            <td><?= $client->email ;?></td>
                                            <td><?= $client->adress ;?></td>
                                            <td>
                                            <a href="../views/Update.php?id=<?=$client->id ;?>">
                                                <center><i class="fa fa-wrench fa-2x" aria-hidden="true"></i></center> 
                                               </a>
                                                </td>
                                            <td>
                                            <a href="../routes/SoftDelete.php?id=<?=$client->id?>&role_as=<?=$client->role?>" onclick="return confirm('Are you sure you want to delete this client <?= strtoupper($client->prenom  .' '. $client->nom) ;?>')">
                                                <center><i class="fa fa-trash fa-2x" aria-hidden="true"></i></center>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

<?=   IncluceFooter() ;?>
