<?php
    ob_start();
    session_start();
    require_once (__DIR__ ."/vendor/autoload.php");

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    require_once("programming-training/globalsTest.php");
    
    if(isset($_SESSION['userLogged'])){
      header("Location: dashboard.php");
    }
   
?>

<!-- 
    touch .env
    then composer require vlucas/phpdotenv
    Nasa taas kung paano i load ang dotenv

 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="css/app.css">
    <title>Login</title>
</head>

<body>
    <div class="jumbotron">
        <h1><?php
        echo $GLOBALS['title'];
        ?>
        
        </h1>

        <p>
          <?php
  
            // $testEnv = $_ENV['TEST_ENV'];
            // $testSERVER = $_SERVER['TEST_ENV'];
            // $testEnv = getenv('TEST_ENV');
            // echo $testSERVER;
            // echo $testEnv;

          ?>
        </p>

    </div>

    <div class="container">
      <p class="text-muted">
        
      </p>
    </div>

    <div class="container">
        <div class="loginForm">
            <div class="card mb-3">
                <div class="card-body">
                    <h1>Login</h1>
                    <p class="text-muted">Login to your account</p>
                    
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-user"></i></span>
                      </div>
                      <input id="username" type="text" class="form-control" placeholder="Username" autocomplete="username" required>
                    </div>

                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-lock"></i></span>
                    </div>
                    <input id="password" type="password" class="form-control" placeholder="Password" autocomplete="password" required>
                    </div>

                    <div class="row">
                    <div class="col-6 ">
                      <button id="btnLogin" type="button" class="btn btn-primary px-4">Login</button>
                    </div>
                    <div class="col-6 text-right">
                      <a type="button" class="btn btn-link px-0" href="register.php">Register?</a>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
</body>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="js/app.js"></script>


</html>