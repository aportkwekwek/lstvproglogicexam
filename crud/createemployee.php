<?php
    require_once('../connectionemployee.php');


    function validateInput($requestInfo){
        if($requestInfo == "")
        $response['status'] = 'Error';
        $response['message'] = "$requestInfo should not be blank!";
        
        return $response;
    }

    $response  = array();
    $connect = new EmployeeConnection();
    $conn = $connect->openConnection();

    $empName = $_POST['empName'];
    $empAddress = trim($_POST['empAddress']);
    $empBday = trim($_POST['empBday']);
    $empAge = trim($_POST['empAge']);
    $empGender = trim($_POST['empGender']);
    $empCivilStatus = trim($_POST['empCivilStatus']);
    $empContactNumber = trim($_POST['empContactNumber']);
    $empSal = $_POST['empSal'];

    $isActive = 0;

    if(isset($_POST['empActive'])){
        if($_POST['empActive'] == "on"){
            $isActive = 1;
        }else{
            $isActive = 0;
        }
    }

    validateInput($empName);
    validateInput($empAddress);
    validateInput($empBday);
    validateInput($empAge);
    validateInput($empGender);
    validateInput($empCivilStatus);
    validateInput($empContactNumber);
    validateInput($empSal);
    

    // Check if employee already exists
    $sql = "select * from employeefile where fullname ='$empName'";
    $res2 = $conn->prepare($sql);
    $res2->execute();

    $row = $res2->fetch(PDO::FETCH_ASSOC);

    
    if($row > 0){

        $response['status'] = 'Error';
        $response['message'] = 'Employee already exists';

    }else {

        // New func upload file to folder
        $imageClient = $_FILES['empImage']['name'];
            // Temporary name para i upload sa folder
        $imageTemp = $_FILES['empImage']['tmp_name'];

        $valid_extensions = array('jpeg', 'jpg', 'png', 'bmp');

        $ext = strtolower(pathinfo($imageClient,PATHINFO_EXTENSION));

        $options = [
            'cost' => 11
        ];
        $hashedPassword = password_hash($imageClient, PASSWORD_BCRYPT, $options);

        $hashedPassword = str_replace("/","",$hashedPassword);

        $finaleImage = "{$hashedPassword}.{$ext}";

        if(in_array($ext, $valid_extensions)){
            
            $targetDir = "../assets/employeeImage/";
            $targetDir = $targetDir.strtolower($finaleImage);
            
            if(move_uploaded_file($imageTemp,$targetDir)){

                $query = "Insert into employeefile(fullname,address,birthdate,age,gender,civilstat,contactnum,salary,isactive,imageLocation) values ('$empName','$empAddress','$empBday','$empAge','$empGender','$empCivilStatus','$empContactNumber',$empSal,$isActive,'$targetDir')";
                $res = $conn->prepare($query);
                $res->execute();
                $response['status'] = 'Ok';
                $response['message'] = 'Success';
            }

        }else{
            $response['status'] = "Error";
            $response['message']= 'Invalid file extension';

        }
        
    }

    echo json_encode($response);

    $connect->closeConnection();


?>