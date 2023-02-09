<?php 
    require_once("../Session/TestSession.php") ;         
    require_once("../controllers/Categorie.php");
    require_once("../controllers/Order.php");

       IncluceNav() ;
     // $product = Product::ListeProducts() ;
  
       
     
?>  


<main>
                                <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div> -->
                    <div class="container-fluid px-4 ">
                        <h1 class="mt-4">Commande</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Commande</li>
                        </ol>
                        <hr>
                          

                            <div class="card mt-2">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable  
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th><center>N° Commande</center></th>
                                            <th><center>Date Commade</center></th>
                                            <th><center>Propriétaire</center></th>
                                             <th><center>Statut</center></th>
                                             <th><center>Facture</center></th>

                                            <th colspan="2" ><center>Action</center> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                             $Orders = Order::listeOrders() ;
                                             $client = Client::listeClients() ;
                                                //   echo var_dump( new DateTime()) ;
                                                
                                         foreach($Orders as $Order) { 
                                           ?>
                                        <tr>
                                            
                                             <td><center><?=$Order->id_command;?></center></td>
                                            <td><center><?= $Order->date_res ;?></center></td>
                                            <td><center><?php echo $Order->id_person  ;?></center></td>

                                                        <td><center><?php if($Order->statut==0) echo "
                                                        <i class='fa fa-cog fa-spin fa-2x fa-fw ' aria-hidden='true'></i>
                                                        <span class='sr-only'>Saving. Hang tight!</span>  ";?></center></td>
                                                         <td>
                                                             <a href="../views/Facture.php?id_command=<?=$Order->id_command ;?>">
                                                                <center><i class="fa fa-print fa-2x" aria-hidden="true"></i></center>
                                                             </a>
                                                        </td>
                                            <td> 
                                            <a href="../views/Update.php?id_command=<?=$Order->id_command ;?>">
                                                <center><i class="fa fa-wrench fa-2x" aria-hidden="true" style="color: blueviolet;"></i></center> 
                                               </a>
                                                </td>
                                            <td>
                                            <a href="../routes/SoftDelete.php?id_command=<?=$Order->id_command?>" download="../routes/SoftDelete.php?id=<?=$Order->id_command?>" onclick="return confirm('Are you sure you want to delete this client <?= strtoupper($Order->id_command  .' '. $Order->id_person) ;?>')">
                                                <center><i class="fa fa-trash fa-2x"  aria-hidden="true"></i></center>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
</main>

<?=   IncluceFooter() ;?>
