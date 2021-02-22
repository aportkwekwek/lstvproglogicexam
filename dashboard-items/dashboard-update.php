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
                <h1 class="h2">Update</h1>

            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Recid</th>
                            <th>Full Name</th>
                            <th>Address</th>
                            <th>Birthday</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Civil Status</th>
                            <th>Contact Number</th>
                            <th>Salary</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        include_once ('../connectionemployee.php');
                        $connect = new EmployeeConnection();

                        $conn = $connect->openConnection();

                        $query = "Select * from employeefile";
                        $res = $conn->prepare($query);
                        $res->execute();

                        if($res->rowCount());
                            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                    
                    ?>
                        <tr>
                            <td><?php echo $row['recid']; ?> </td>
                            <td><?php echo $row['fullname']; ?> </td>
                            <td><?php echo $row['address']; ?> </td>
                            <td><?php echo $row['birthdate']; ?> </td>
                            <td><?php echo $row['age']; ?> </td>
                            <td><?php echo $row['gender']; ?> </td>
                            <td><?php echo $row['civilstat']; ?> </td>
                            <td><?php echo $row['contactnum']; ?> </td>
                            <td style="text-align:right;"><?php echo number_format($row['salary'],2); ?> </td>
                            <td style="text-align:right;"><?php 

                            $active = $row['isactive']; 
                                if($active == 1){
                                    $active = 'Yes';
                                }else{
                                    $active = 'No';
                                }

                                echo $active;
                            ?> </td>

                            
                            <td><button class="btn btn-primary updateLink" data-bs-toggle="modal" data-bs-target="#modalUpdate" value='<?php echo $row['recid']; ?> '><i class="icon-edit" ></i></button>
                        
    
                        </tr>
                    <?php
                            }
                    ?>

                    </tbody>
                </table>
            </div>

                <!-- Modal -->
                <div class="modal fade" id="modalUpdate" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Update User</h5>
                    </div>
                    <div class="modal-body">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-barcode"></i></span>
                            </div>
                            <input id="updaterecid" type="text" class="form-control" placeholder="Record ID" autocomplete="name" disabled required> 
                        </div>
                


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-user"></i></span>
                            </div>
                            <input id="updatefullname" type="text" class="form-control" placeholder="Name" autocomplete="name" required>
                        </div>

                            
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-lock"></i></span>
                            </div>
                            <input id="updateaddress" type="text" class="form-control" placeholder="Address" autocomplete="address" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                            </div>
                            <input id="updatebirthdate" type="date" class="form-control" placeholder="New Password" autocomplete="birthday" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-thumbs-up-alt"></i></span>
                            </div>
                            <input id="updateage" type="number" class="form-control" placeholder="Age" autocomplete="age" required>
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="updatestatus">Civil Status</label>
                            <select class="form-control" id="updatestatus">
                                <option value="Single" selected>Single</option>
                                <option value="Married">Married</option>
                                <option value="Separated">Separated</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-phone"></i></span>
                            </div>
                            <input id="updatecontact" type="text" class="form-control" placeholder="Contact Number" autocomplete="age" required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-usd"></i></span>
                            </div>
                            <input id="updatesalary" type="number" class="form-control" placeholder="Salary" autocomplete="age" required>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="updateactive">
                            <label class="form-check-label" for="updateactive">
                                Is Active
                            </label>
                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <button id="btnClose" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="btnUpdateUser" type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>

                <!-- End Modal -->

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