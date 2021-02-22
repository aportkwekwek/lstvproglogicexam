<?php

    session_start();
    // require_once '../connection.php';
    require_once '../config.db.php';

    $response = array();
    // $connect = new Connection();

    // $conn = $connect->openConnection();

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    $query = "Select * from users where username='$username'";
    $res = $link_id->prepare($query);
    $res->execute();

    $row = $res->fetch(PDO::FETCH_ASSOC);
        if($row <= 0 ){
            $response['status'] = 'Error';
            $response['message'] = 'User not found';
        }else{
            $passwordFromDB = $row['password'];
            if(password_verify($password,$passwordFromDB)){
                $response['status'] = 'Success';
                $response['message'] = 'User found!';
                $_SESSION['userLogged'] = $row['name'];

                $cookie_name = "password";
                $cookie_value= $row['password'];
                setcookie($cookie_name,$cookie_value, time() + (86400 * 30), "/");
                

            }else{
                $response['status'] = 'Error';
                $response['message'] = 'Wrong Password'; 
            }
            
        }

    
    echo json_encode($response);

    // $connect->closeConnection();

    
?>