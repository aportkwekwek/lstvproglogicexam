<?php
    // require_once('../connectionemployee.php');
    require_once '../config.db.php';
    require_once '../assets/lstventuresfunctions/lx.pdodb.php';

    $response = array();
    // $connect = new EmployeeConnection();
    // $conn = $connect->openConnection();

    $recid = trim($_POST['recid']);
    $fullname = trim($_POST['fullname']);
    $address =trim($_POST['address']);
    $birthdate = trim($_POST['birthdate']);
    $age = trim($_POST['age']);
    $status = trim($_POST['status']);
    $contactnumber = trim($_POST['contactnumber']);
    $salary = trim($_POST['salary']);
    $isactive =  trim($_POST['isactive']);


    $firstQry = "Select * from employeefile where recid ='$recid'";
    $res1 = $link_id_employeefile->prepare($firstQry);
    $res1->execute();
    $row = $res1->fetch(PDO::FETCH_ASSOC);

    if($row > 0){


        $xarr_update_employee = array();
        $xarr_update_employee['address'] = $address;
        $xarr_update_employee['birthdate'] = $birthdate;
        $xarr_update_employee['age'] = $age;
        $xarr_update_employee['civilstat'] = $status;
        $xarr_update_employee['contactnum'] = $contactnumber;
        $xarr_update_employee['salary'] = $salary;
        $xarr_update_employee['isactive'] = $isactive;

        $xarr_params = array();
        $xarr_params['recid'] = $recid;
        $xarr_params['fullname'] = $fullname;


        PDO_UpdateRecord($link_id_employeefile, 'employeefile', $xarr_update_employee,'recid=? and fullname=?',$xarr_params);


        // PDO_UpdateRecord($link_id, )

//         "<br />
// <b>Notice</b>:  Undefined variable: conn in <b>C:\xampp\htdocs\lstventuresProgLogic\crud\updateuser.php</b> on line <b>37</b><br />
// <br />
// <b>Fatal error</b>:  Uncaught Error: Call to a member function prepare() on null in C:\xampp\htdocs\lstventuresProgLogic\crud\updateuser.php:37
// Stack trace:
// #0 {main}
//   thrown in <b>C:\xampp\htdocs\lstventuresProgLogic\crud\updateuser.php</b> on line <b>37</b><br />
// "

        // $sql = "Update employeefile set fullname = '$fullname' , address= '$address', birthdate = '$birthdate', age = $age, civilstat = '$status', contactnum = '$contactnumber' ,salary =$salary , isactive = $isactive where recid = $recid";
        // $res = $link_id->prepare($sql);
        // $res->execute();

        $response['status'] = 'Ok';
        $response['message'] = 'Employee successfully updated';
    

    }else{
        $response['status'] = 'Error';
        $response['message'] = 'Employee not found!';
    }
    
    

    echo json_encode($response);

    // $connect->closeConnection();


?>