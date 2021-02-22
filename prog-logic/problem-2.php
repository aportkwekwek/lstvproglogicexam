

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
                <h1 class="h2">Problem number 2</h1>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Territory</th>
                            <th>Customer</th>
                            <th style="text-align:right;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once('../connection.php');

                            $connection = new Connection();
                            $conn = $connection->openConnection();

                            $query = "Select tercode from territoryfile";
                            $res = $conn->prepare($query);
                            $res->execute();
                            $grandTotal = 0;

                            if($res->rowCount());
                                while($row = $res->fetch(PDO::FETCH_ASSOC)){

                        ?>
                        <tr>
                            <td><?php echo $row['tercode']; ?> </td>
                            <td></td>
                            <td></td>
                            <?php

                                $territoryCode = $row['tercode'];
                                $getSecond = "Select customerfile.cusdsc, sum(salesfile1.trntot) as 'tot' from territoryfile inner join customerfile on territoryfile.tercode = customerfile.tercode inner join salesfile1 on customerfile.cuscde = salesfile1.cuscde where customerfile.tercode = '$territoryCode' group by customerfile.cuscde";
                                $resSecond = $conn->prepare($getSecond);
                                $resSecond->execute();

                                $subtot = 0;
                                if($resSecond->rowCount());
                                    while($row2 = $resSecond->fetch(PDO::FETCH_ASSOC)){
                                        
                                        $grandTotal = $grandTotal + $row2['tot'];
                                        $subtot = $subtot + $row2['tot'];
                                        
                            ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $row2['cusdsc']; ?></td>
                                        <td style="text-align:right;"><?php echo number_format($row2['tot'],2); ?></td>
                                    </tr>

                        <?php
                            }
                        ?>
                        <tr>
                            <td style="border-bottom:1px solid; border-top:1px solid;"><b>SubTotal</b></td>
                            <td style="border-bottom:1px solid; border-top:1px solid;"></td>
                            <td style="text-align:right; border-bottom:1px solid; border-top:1px solid;"><?php echo number_format($subtot,2); ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <?php
                        }
                        
                        ?>
                            
                        </tr>

                        <tr>
                            <td><b>Grand Total</b></td>
                            <td></td>
                            <td style="text-align:right;"><b><?php echo number_format($grandTotal,2); 
                                $connection->closeConnection();
                            ?> </b></td>
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