<?php

    session_start();    

    if($_SESSION['userLogged'] == null){
        header("Location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />

    <link rel="stylesheet" href="css/app.css">
    <title>Dashboard</title>
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Ron Erick D. Rodriguez</a>
 
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link logoutDashboard" href="sessionhandler.php">Sign out</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse" style="height:100vh;">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">

                <li class="nav-item">
                        <a class="nav-link" href="#">
                        <i class="icon-home"></i>&emsp;Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="dashboard-items/dashboard-create.php">
                        <i class="icon-user"></i>&emsp;Create
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="dashboard-items/dashboard-read.php">
                        <i class="icon-book"></i>&emsp;Read
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="dashboard-items/dashboard-update.php">
                        <i class="icon-edit"></i>&emsp;Update
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="dashboard-items/dashboard-delete.php">
                        <i class="icon-trash"></i>&emsp;Delete
                        </a>
                    </li>
         
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Programming Logic Exam</span>
                </h6>

                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link" href="prog-logic/problem-1.php">
                        <i class="icon-code"></i>&emsp;Problem 1
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="prog-logic/problem-2.php">
                        <i class="icon-code"></i>&emsp;Problem 2
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="prog-logic/problem-3.php">
                        <i class="icon-code"></i>&emsp;Problem 3
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="prog-logic/problem-4.php">
                        <i class="icon-code"></i>&emsp;Problem 4
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="prog-logic/problem-5.php">
                        <i class="icon-code"></i>&emsp;Problem 5
                        </a>
                    </li>

                </ul>


            </div> <!-- Sticky -->
        </nav> <!-- Nav -->

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>
            <div class="container">
                <h3>Programming Exam for Lee Systems Technology Ventures</h3>
                <p class="text-muted">Applicant Name: Ron Erick D. Rodriguez</p>

                
                <a href="#" id="contactDev">Contact Developer</a>
                <p class="text-danger">Dialog not appllicable on higher version of jquery</p>       
                
                <form id="contactDevDialog">            
                    <div id="">

                    
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-user"></i></span>
                                </div>
                                <input id="contactName" name="contactName" type="text" class="form-control" placeholder="Name" autocomplete="name" >
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-google-plus"></i></span>
                                </div>
                                <input id="contactEmail" name="contactEmail" type="text" class="form-control" placeholder="Email" autocomplete="email" >
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-comments"></i></span>
                                </div>
                                <textarea rows=4 id="contactMessage" name="contactMessage" class="form-control" placeholder="Message"></textarea>
                            </div>

                                <button type="submit" class="btnSubmitContact" hidden></button>
                            


                    </div>
                

                </form>
                    

                <p>
                    <?php
                        echo "Hi im session ". $_SESSION['userLogged'] ;

                        if(isset($_COOKIE['fullname'])){

                            echo "<br /> Hi im cookie password " . $_COOKIE['password'];
                        }
                    ?>
                </p>
            </div>

            <div class="container">
                <?php
                $testFile = fopen("assets/test.txt",'a+');
                // fwrite($testFile,"\rStuffs Created everytime page is load");
                // readfile("assets/test.txt");

                while(!feof($testFile)){
                    $buffer =  str_replace("\r","<br/>" ,fgets($testFile));
                    // $buffer = str_replace("\r","<br />",fread($testFile,50));
                    echo $buffer ;
                }

                fclose($testFile);
            ?>
            

            <!-- $_SERVER IS FOR GETTING SERVER INFORMATION -->
            <!-- <div class="row" style="text-align:justify">

                <div class="col-md-6">
                <?php

                    // echo $_SERVER['PHP_SELF'] ,"&emsp; SERVER THIS IS PHP SELF <br />";
                    // echo $_SERVER['GATEWAY_INTERFACE'] ,"&emsp; SERVER THIS IS GATEWAY_INTERFACE <br />";
                    // echo $_SERVER['SERVER_ADDR'] ,"&emsp; SERVER THIS IS SERVER_ADDR <br />";
                    // echo $_SERVER['SERVER_NAME'] ,"&emsp; SERVER THIS IS SERVER_NAME <br />";
                    // echo $_SERVER['SERVER_SOFTWARE'] ,"&emsp; SERVER THIS IS SERVER_SOFTWARE <br />";
                    // echo $_SERVER['SERVER_PROTOCOL'] ,"&emsp; SERVER THIS IS SERVER_PROTOCOL <br />";
                    // echo $_SERVER['REQUEST_METHOD'] ,"&emsp; SERVER THIS IS REQUEST_METHOD <br />";
                    // echo $_SERVER['REQUEST_TIME'] ,"&emsp; SERVER THIS IS REQUEST_TIME <br />";
                    // echo $_SERVER['REQUEST_TIME_FLOAT'] ,"&emsp; SERVER THIS IS REQUEST_TIME_FLOAT <br />";
                    // echo $_SERVER['QUERY_STRING'] ,"&emsp; SERVER THIS IS QUERY_STRING <br />";
                    // echo $_SERVER['REMOTE_ADDR'] ,"&emsp; SERVER THIS IS REMOTE_ADDR <br />";
                    // echo $_SERVER['REMOTE_PORT'] ,"&emsp; SERVER THIS IS REMOTE_PORT <br />";
                    // echo $_SERVER['REQUEST_URI'] ,"&emsp; SERVER THIS IS REQUEST_URI <br />";
                ?>
                </div>

                <div class="col-md-6">

                <?php
                    // echo $_SERVER['DOCUMENT_ROOT'] ,"&emsp; SERVER THIS IS DOCUMENT_ROOT <br />";
                    // echo $_SERVER['HTTP_ACCEPT'] ,"&emsp; SERVER THIS IS HTTP_ACCEPT <br />";
                    // echo $_SERVER['HTTP_ACCEPT_ENCODING'] ,"&emsp; SERVER THIS IS HTTP_ACCEPT_ENCODING <br />";
                    // echo $_SERVER['HTTP_CONNECTION'] ,"&emsp; SERVER THIS IS HTTP_CONNECTION <br />";
                    // echo $_SERVER['HTTP_USER_AGENT'] ,"&emsp; SERVER THIS IS HTTP_USER_AGENT <br />";
                    // echo $_SERVER['SCRIPT_FILENAME'] ,"&emsp; SERVER THIS IS SCRIPT_FILENAME <br />";
                    // echo $_SERVER['SERVER_ADMIN'] ,"&emsp; SERVER THIS IS SERVER_ADMIN <br />";
                    // echo $_SERVER['SERVER_PORT'] ,"&emsp; SERVER THIS IS SERVER_PORT <br />";
                    // echo $_SERVER['SERVER_SIGNATURE'] ,"&emsp; SERVER THIS IS SERVER_SIGNATURE <br />";
                    // echo $_SERVER['SCRIPT_NAME'] ,"&emsp; SERVER THIS IS SCRIPT_NAME <br />";

                    ?>

                </div>  

            </div> -->



            </div>
        </main>
    </div> <!-- Row -->
</div>
    
</body>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
 
<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<script src="js/app.js"></script>
</html>