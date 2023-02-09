<?php 
    require_once("../Session/TestSession.php") ;         
    require_once("../controllers/Categorie.php");

       IncluceNav() ;
      $product = Product::ListeProducts() ;
      $client = Client::listeClients() ;

        
     
?>   
<style> 
input[type=number] {
  width: 70%;
  padding: 9px;
  margin: 0;
   background-color: #ff000026;
   text-align: center;
  box-sizing: border-box;
   -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}
input[type=checkbox] {
  width: 100%;
  padding: 9px;
  margin: 0;
   background-color: #ff000026;

  box-sizing: border-box;
   -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=number]:focus {
  border: 3px solid #555;
  background-color: lightblue;

}
</style>
 
   <main>
      
   
                  <div class="container-fluid   ">

                 

                     <h1 class="mt-4">Caisse</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Caisse</li>
                        </ol>
                        <hr class="mb-0">
                        <form action="../routes/addCommand.php" method="GET">
                         <div class="row">
                        <div  class="d-flex justify-content-center">
                            <label class="control-label " for="clients" >
                                   <h3 style="font-family: cursive;">Select a Client</h3> 
                             </label>
                        </div>
                        <br>
                             <div  class="d-flex justify-content-center">
                        <input required class="select form-control w-25"  list="Client" name="client" id="clients">

                            <datalist id="Client">
                                    <?php foreach($client as $cli){ ?>

                        <option value="<?= $cli->id ." : " .$cli->prenom." ".$cli->nom?>"   />


                                  <?php  } ?>
                                
                                
                                </datalist> 
                        </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Choise Produits tu veux
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th><center>Product</center></th>
                                            <th><center>Libelle</center></th>

                                             <th> <center>Prix de Vent</center> </th>   
 
                                            <th class="w-25" ><center>Quantite</center></th>
                                            <th class="w-25" > <center><center>Choise</center> </th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        <?php 
                                       
                                        foreach($product as $pro) { 
                                          if ($pro->quantite != 0) { ?>
                                        <tr>

                                            <td><center><img src="<?= $pro->photo_produit ;?>" title="<?= $pro->libelle?>" class="rounded-circle"  width="32px" height="32px"  alt="" ></center></td>
                                            <td><center><?= $pro->libelle ;?></center></td>
                                             <td><center><strong><?= $pro->prix_vent ;?></strong></center></td>
                                              
                                            <td><center><input   class="form-control w-100 " type="number" id="qnt"  name="qnt[]" value="0" min="0"  max="<?= $pro->quantite ;?>" placeholder="maximum"  /></center></td>
                                            <td><input   class="" type="checkbox" style=" width:19vw;height:5vh;" name="id_prod[]" value="<?= $pro->reference ;?>"  /></td>

                                 
                                        </tr>
                                        <?php } }?>
                                    </tbody>
                                    
                                </table>
                                <div class="row me-mb-2">
                        <div class="d-flex justify-content-end me-mb-2">
                                            <div class="ml-auto mt-2 ">
                                                <button type="submit" id="command" name="submit" class="btn btn-info">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                    Ajouter Command 
                                                 </button>
                                                </div>
                                    </div>  
                             </div>
                        </form>

                            </div>
                            
                        </div>
                        
                   </div>
               
                   
   </main>
                  
<?php   IncluceFooter() ;
   
?>

 