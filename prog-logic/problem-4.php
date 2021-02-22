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
                        <a class="nav-link" href="../dashboard-items/dashboard-create.php">
                        <i class="icon-user"></i>&emsp;Create
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../dashboard-items/dashboard-read.php">
                        <i class="icon-book"></i>&emsp;Read
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../dashboard-items/dashboard-update.php">
                        <i class="icon-edit"></i>&emsp;Update
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../dashboard-items/dashboard-delete.php">
                        <i class="icon-trash"></i>&emsp;Delete
                        </a>
                    </li>
         
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Programming Logic Exam</span>
                </h6>

                <ul class="nav flex-column">

                <li class="nav-item">
                        <a class="nav-link" href="problem-1.php">
                        <i class="icon-code"></i>&emsp;Problem 1
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="problem-2.php">
                        <i class="icon-code"></i>&emsp;Problem 2
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="problem-3.php">
                        <i class="icon-code"></i>&emsp;Problem 3
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="problem-4.php">
                        <i class="icon-code"></i>&emsp;Problem 4
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="problem-5.php">
                        <i class="icon-code"></i>&emsp;Problem 5
                        </a>
                    </li>

                </ul>
            </div> <!-- Sticky -->
        </nav> <!-- Nav -->

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Problem number 4</h1>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-sm" id="tblGenerate">
                    <thead>
                        <tr>
                            <th>RECID</th>
                            <th>TrnDate</th>
                            <th>MONTH CREATED</th>
                            <th>YEAR CREATED</th>
                            <th>DateTyp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="generateDate"></td>
                            <td class="monthz">1</td>
                            <td class="yearz">2020</td>
                            <td class="firstOrLast">F</td>
                            <td><button class="btn btn-info btnAppend">Generate</button></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td class="generateDate"></td>
                            <td class="monthz">2</td>
                            <td class="yearz">2020</td>
                            <td class="firstOrLast">L</td>
                            <td><button class="btn btn-info btnAppend">Generate</button></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td class="generateDate"></td>
                            <td class="monthz">3</td>
                            <td class="yearz">2020</td>
                            <td class="firstOrLast">L</td>
                            <td><button class="btn btn-info btnAppend">Generate</button></td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td class="generateDate"></td>
                            <td class="monthz">4</td>
                            <td class="yearz">2020</td>
                            <td class="firstOrLast">L</td>
                            <td><button class="btn btn-info btnAppend">Generate</button></td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td class="generateDate"></td>
                            <td class="monthz">5</td>
                            <td class="yearz">2020</td>
                            <td class="firstOrLast">F</td>
                            <td><button class="btn btn-info btnAppend">Generate</button></td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td class="generateDate"></td>
                            <td class="monthz">6</td>
                            <td class="yearz">2020</td>
                            <td class="firstOrLast">L</td>
                            <td><button class="btn btn-info btnAppend">Generate</button></td>
                        </tr>

                        <tr>
                            <td>7</td>
                            <td class="generateDate"></td>
                            <td class="monthz">7</td>
                            <td class="yearz">2020</td>
                            <td class="firstOrLast">F</td>
                            <td><button class="btn btn-info btnAppend">Generate</button></td>
                        </tr>

                        <tr>
                            <td>8</td>
                            <td class="generateDate"></td>
                            <td class="monthz">8</td>
                            <td class="yearz">2020</td>
                            <td class="firstOrLast">F</td>
                            <td><button class="btn btn-info btnAppend">Generate</button></td>
                        </tr>

                        <tr>
                            <td>9</td>
                            <td class="generateDate"></td>
                            <td class="monthz">9</td>
                            <td class="yearz">2020</td>
                            <td class="firstOrLast">L</td>
                            <td><button class="btn btn-info btnAppend">Generate</button></td>
                        </tr>

                        <tr>
                            <td>10</td>
                            <td class="generateDate"></td>
                            <td class="monthz">10</td>
                            <td class="yearz">2020</td>
                            <td class="firstOrLast">F</td>
                            <td><button class="btn btn-info btnAppend">Generate</button></td>
                        </tr>

                     


                    </tbody>
                </table>
            </div>

        </main>
    </div> <!-- Row -->
</div>
    
</body>

<script src="../js/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="../js/app.js"></script>
</html>