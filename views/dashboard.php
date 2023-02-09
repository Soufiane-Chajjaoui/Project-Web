<?php 
    require_once("../Session/TestSession.php") ;   
    require_once("../controllers/Order.php");
    require_once("../controllers/Product.php");

       IncluceNav() ;
       $month = Order::chart("month") ;
       $commad = Order::chart("command") ;
       $products = Product::dashProd() ;
?>

<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <hr>
                      
                        <div class="row">
                           
                          <center>  <div class="col-xl-8 ">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Statistique par chaque mois
                                    </div>
                                    <div class="card-body"><canvas id="myChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>   </center>
                            
                        </div>
                        <div class="card m-4 p-4">
                        <div class="card-header">
                                    <i class="fa fa-usd me-1" aria-hidden="true"></i>
                                         Les Produits Vent avec leur Quantite
                                    </div>
                            
                        <div class="row mt-3">
                              
                                   <?php foreach($products as $prod){ ;?>

                                    <div class="col-xl-3 col-md-6">
                                                    <div class="card bg-primary text-white mb-4">
                                                        <div class="card-body"><?=$prod['prod'] . " : " . $prod['qnt']?></div>
                                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                                            <a class="small text-white stretched-link" href="#">View Details</a>
                                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                                        </div>
                                                    </div>
                                                </div> 

                                  <?php } ?>
                                               
                                                  
                         </div>
                        </div>
                    </div>
                </main>
                
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo  json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Command',
      data: <?php echo json_encode($commad) ?>,
      backgroundColor: [
        "rgba(2,117,216,1)" ,"rgba(2,117,216,1)"  ,"rgba(2,117,216,1)" ,"rgba(2,117,216,1)" ,"rgba(2,117,216,1)" ,"rgba(2,117,216,1)" ,"rgba(2,117,216,1)" ,"rgba(2,117,216,1)" ,"rgba(2,117,216,1)" ,"rgba(2,117,216,1)"    
      ],
      borderColor: [
        "rgba(2,117,216,1)"        
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
   
</script>

<?=   IncluceFooter() ;?>  


  





        




  





