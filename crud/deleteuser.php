<?php
    require_once('../connectionemployee.php');

    $response = array();
    $connect = new EmployeeConnection();

    $conn = $connect->openConnection();

    $recid = trim($_POST['recid']);

    $query = "Delete from employeefile where recid='$recid'";
    $res = $conn->prepare($query);
    $res->execute();

    if(!$res){
        $response['status'] = 'Error';
        $response['message'] = 'An error occur deleting data';

    }else{
        $response['status'] = 'Ok';
        $response['message'] = 'Employee Deleted!';
    }

    echo json_encode($response);

    $connect->closeConnection();


?>