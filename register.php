<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">
    <title>Login</title>
</head>

<body>
    <div class="jumbotron">
        <h1>Lee Systems Technology Ventures Exam</h1>
    </div>

    <div class="container">
        <div class="loginForm">
            <div class="card border-success mb-3">
                <div class="card-body">
                    <h1>Register</h1>
                    <p class="text-muted">Register new account</p>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-user"></i></span>
                        </div>
                        <input id="regname" type="text" class="form-control" placeholder="Name" autocomplete="name" required>
                    </div>
                    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-user"></i></span>
                        </div>
                        <input id="regusername" type="text" class="form-control" placeholder="Username" autocomplete="username" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-lock"></i></span>
                        </div>
                        <input id="regpassword" type="password" class="form-control" placeholder="Password" autocomplete="password" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-lock"></i></span>
                        </div>
                        <input id="regcpassword" type="password" class="form-control" placeholder="Confirm Password" autocomplete="password" required>
                    </div>

                    <div class="row">
                        <div class="col-6 ">
                        <button id="btnRegister" type="button" class="btn btn-primary px-4">Register</button>
                        </div>

                        <div class="col-6 text-right">
                        <a type="button" class="btn btn-link px-0" href="index.php">Login</a>
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
<!-- <script src="js/app.js"></script> -->
<script src="js/register.js"></script>


</html>