<?php
    require_once('../connectionemployee.php');

    $response = array();
    $connect = new EmployeeConnection();
    $conn = $connect->openConnection();

    $recid = trim($_POST['recid']);

    $query = "Select * from employeefile where recid ='$recid' ";
    $res = $conn->prepare($query);
    $res->execute();

    $row = $res->fetch(PDO::FETCH_ASSOC);
    
    if($row == 0){
        $response['status'] = 'Error';
        $response['message'] = 'You are editing an invalid account!';
    }else{
        $response['status'] = 'Success';
        $response['recid'] = $row['recid'];
        $response['fullname'] = $row['fullname'];
        $response['address'] = $row['address'];
        $response['birthdate'] = $row['birthdate'];
        $response['age'] =  $row['age'];
        $response['civilstatus'] = $row['civilstat'];
        $response['contactnum'] = $row['contactnum'];
        $response['salary'] = $row['salary'];
        $response['isactive'] = $row['isactive'];

    }

    echo json_encode($response);


    $connect->closeConnection();

?>