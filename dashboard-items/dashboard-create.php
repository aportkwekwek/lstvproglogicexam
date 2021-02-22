<?php

    session_start();    

    if($_SESSION['userLogged'] == null){
        header("Location: ../index.php");
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
    <link rel="stylesheet" href="../css/app.css">
    <title>Dashboard</title>
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Ron Erick D. Rodriguez</a>
 
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
        <a class="nav-link logout" href="../sessionhandler.php">Sign out</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse" style="height:100vh;">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link" href="../dashboard.php">
                        <i class="icon-home"></i>&emsp;Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="dashboard-create.php">
                        <i class="icon-user"></i>&emsp;Create
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="dashboard-read.php">
                        <i class="icon-book"></i>&emsp;Read
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="dashboard-update.php">
                        <i class="icon-edit"></i>&emsp;Update
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="dashboard-delete.php">
                        <i class="icon-trash"></i>&emsp;Delete
                        </a>
                    </li>
         
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Programming Logic Exam</span>
                </h6>

                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link" href="../prog-logic/problem-1.php">
                        <i class="icon-code"></i>&emsp;Problem 1
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../prog-logic/problem-2.php">
                        <i class="icon-code"></i>&emsp;Problem 2
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../prog-logic/problem-3.php">
                        <i class="icon-code"></i>&emsp;Problem 3
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../prog-logic/problem-4.php">
                        <i class="icon-code"></i>&emsp;Problem 4
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../prog-logic/problem-5.php">
                        <i class="icon-code"></i>&emsp;Problem 5
                        </a>
                    </li>

                </ul>
            </div> <!-- Sticky -->
        </nav> <!-- Nav -->

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Create</h1>
            </div>
            <p class="text-muted">Create new employee</p>

            <form id="uploadEmployee" method="" enctype="multipart/form-data">

                <div class="container">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-user"></i></span>
                        </div>
                        <input id="empName" name="empName" type="text" class="form-control" placeholder="Employee Full Name" autocomplete="name" >
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-road"></i></span>
                        </div>
                        <input id="empAddress" name="empAddress" type="text" class="form-control" placeholder="Address" autocomplete="address" >
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-file"></i></span>
                        </div>
                        <input id="empImage" style="padding:3px 5px; " name="empImage" type="file" class="form-control" placeholder="File" accept="image/*" >
                    </div>

                </div>

                <div class="container">

                    <div class="row">

                        <div class="col-md-6">

                        <div class="form-floating mb-3">
                            <input id="empBday" name="empBday" type="date" class="form-control" autocomplete="name" >
                        </div>

                        </div>

                        <div class="col-md-6">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-thumbs-up-alt"></i></span>
                            </div>
                            <input id="empAge" name="empAge" type="number" class="form-control" placeholder="Age" autocomplete="address" >
                        </div>

                        </div>

                    </div>

                </div>
                
                <div class="container">

                    <div class="row">

                        <div class="col-md-6">
                        
                            <label for="gender">Gender</label>

                            <div class="form-check" id="gender">
                                <input class="form-check-input" type="radio" name="empGender" value="Male" checked>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="empGender" value="Female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="empGender" value="Others">
                                <label class="form-check-label" for="others">
                                    Others
                                </label>
                            </div>

                        </div>

                        <div class="col-md-6">
                        
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="empCivilStatus">Civil Status</label>
                                <select class="form-control" name="empCivilStatus"id="empCivilStatus">
                                    <option value="Single" selected>Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                            </div>
                        </div>

                    </div>

                </div>

                <br>

                <div class="container">

                    <div class="row">

                        <div class="col-md-6">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-phone"></i></span>
                                </div>
                                <input id="empContactNumber" name="empContactNumber" type="number" class="form-control" placeholder="Contact Number" autocomplete="phone" >
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-usd"></i></span>
                                </div>
                                <input id="empSal" name="empSal" type="number" class="form-control" placeholder="Salary" autocomplete="number" step=".01">

                            </div>

                        </div>

                    </div>

                    <br>

                
                    <div class="form-check">
                    <input class="form-check-input" name="empActive" type="checkbox" id="empActive">
                    <label class="form-check-label" for="empActive">
                        Is Active
                    </label>
                    </div>

                    <br>

                    
                    <div class="row">
                        <div class="col-md-6 ">
                        <input id="btnRegisterLoob" type="submit" class="btn btn-primary px-4" value="Create New Employee">
                        </div>
                    </div>

                </div>

            </form>
       
        </main>
    </div> <!-- Row -->
</div>
    
</body>

<script src="../js/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="../js/register.js"></script>
<script src="../js/app.js"></script>
</html>