<?php
    
    require_once '../connection.php';

    $response2 = array();
    $connect = new Connection();

    $conn = $connect->openConnection();

    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirmPass = trim($_POST['cpassword']);

    if($password != $confirmPass){
        $response2['status'] = 'Error';
        $response2['message'] = "Password did not matched!";
       
    }

    //Password hash to bcrypt
    $options = [
        'cost' => 11
    ];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
    //End hash password

    $query = "Select * from users where username = '$username' or name = '$name'";
    $res = $conn->prepare($query);
    $res->execute();

    $row = $res->fetch(PDO::FETCH_ASSOC);
    if($row == 0){
        
        $addUserqry = "Insert into users (username,password,name,isAdmin) values ('$username', '$hashedPassword' , '$name', 1)";
        $res2 = $conn->prepare($addUserqry);

        $res2->execute();
        
        $response2['status'] = 'Success';
        $response2['message'] = 'Registered Completely';
       

    }else{
        
        $response2['status'] = 'Error';
        $response2['message'] = 'Account already exists';
        
    }

    echo json_encode($response2);

    $connect->closeConnection();

?>