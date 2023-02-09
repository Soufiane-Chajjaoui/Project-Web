<?php   require_once("../Session/TestSession.php") ;         ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/projet.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleTables.css">
    <link rel="stylesheet" href="../css/newINPUT.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S C</title>
     <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script src="../js/all.min.css"></script>
    <script src="../js/fontawesome.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/chart_bar.js"></script>
    <script src="../js/chart_line.js"></script>   
    <script src="../js/ajax_chart.js"></script>
    <script src="../js/datatables_simple.js"></script>
    <script src="../js/dataTables.js"></script>
    <script>
        setTimeout(function(){
   window.location.reload();
},1000*60*60*4);
    </script>
</head>
 
<body class="sb-nav-fixed">
    
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href=""><center>God Bless  &hearts;		</center></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group" style="visibility: hidden;">
                <input class="form-control"  type="text" placeholder="Search for..." aria-label="Search for..."  aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <i class="nav-link dropdown-toggle" id="navbarDropdown"  role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="<?php if($_SESSION['photo']) echo $_SESSION['photo'] ;else echo "../Uploads/285655_user_icon.png"?>" width="35px" height="35px" alt=""></i>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="#!">
                        
                        </a></li> -->
                 

                    <li><a class="dropdown-item" href="#!"><?=$_SESSION['auth']?></a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="../Session/logout.php"><i class="fa fa-sign-in" aria-hidden="true" style="margin-right: 10%"></i>Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="../views/dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Table de board
                        </a>
                        <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
                            Personnes
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../routes/ListeClients.php">Clients</a>
                                <a class="nav-link" href="../routes/ListeFournisseur.php">Fourniseurs</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fa fa-archive" aria-hidden="true"></i></div>
                            Stock
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Categoires
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="../views/categories.php">Liste Categoires</a>
                                     </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Produits
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="../views/products.php">Liste Produits</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Command" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-list-ol" aria-hidden="true"></i></div>
                            Commands
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="Command" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="../views/command.php">Commands En cour</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Commands Terminé</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#trash" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-trash" aria-hidden="true"></i></div>
                            
                            Trach
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="trash" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Table implement </a>
                                <a class="nav-link" href="layout-sidenav-light.html">Table implement </a>
                                <a class="nav-link" href="layout-static.html">Table implement </a>
                                <a class="nav-link" href="layout-sidenav-light.html">Table implement </a>
                                <a class="nav-link" href="layout-static.html">Table implement </a>
                                <a class="nav-link" href="layout-sidenav-light.html">Table implement </a>
                                <a class="nav-link" href="layout-static.html">Table implement </a>
                                <a class="nav-link" href="layout-sidenav-light.html">Table implement </a>
                                <a class="nav-link" href="layout-static.html">Table implement </a>
                                <a class="nav-link" href="layout-sidenav-light.html">Table implement </a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Payement</div>
                        <a class="nav-link" href="../views/caisse.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-cart-plus" aria-hidden="true"></i></div>
                            Caisse
                        </a>
                      
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            

            
</body>
</html>
  