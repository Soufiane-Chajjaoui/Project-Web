<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" sizes="16x16" href="images/projet.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S C</title>
     <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
    <script src="js/scripts.js"></script>

    <script src="js/all.min.css"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body style="  background-image: URL('images/back.jpg'); backdrop-filter: blur(2px);background-repeat: no-repeat; background-size: 1600px 900px;"">
<div class="d-flex justify-content-center  " >
 <img src="images/projet.png" width="7%" alt="image_logo"></div>
<div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main> 
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-3" style="background-image: URL('images/.jpg'); backdrop-filter: blur(2px);background-repeat: no-repeat;">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="routes/LoginAccount.php">
                                            <div class="form-floating mb-4">
                                                <input class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="hidden" name="LongTimeUse" value="0" />
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" name="LongTimeUse" value="1" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <input type="submit" name="send" class="btn btn-primary"   value="Login">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="views/registre.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <?php 


include "nav/footer.html"; ?>
       

        