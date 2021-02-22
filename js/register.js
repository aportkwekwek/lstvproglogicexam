$(document).on('click','#btnRegister',function(e){

    var name = $('#regname').val();
    var username = $('#regusername').val();
    var password = $('#regpassword').val();
    var cpassword = $('#regcpassword').val();

    if(password != cpassword){
        toastr.error('Password did not matched!');
        return;
    }else{

        $.ajax({
            url:'crud/adduser.php',
            type:'POST',
            data:{
                name:name,
                username:username,
                password:password,
                cpassword:cpassword
            },
            dataType:'json',
            success:function(data){
               if(data.status == 'Error'){
                   toastr.error(data.message);
               }else{
                   toastr.success(data.message);
                   window.location.href ='index.php';
               }
            }
        });
    }
});


$('#empAge').keypress(function(e){
    if(e.which != 8 && e.which !=0 && e.which < 48 || e.which > 57){
        toastr.error('Input should not be letters');
        return false;
        
    }
});

$('#empContactNumber').keypress(function(e){
    if(e.which != 8 && e.which !=0 && e.which < 48 || e.which > 57){
        toastr.error('Input should not be letters');
        return false;
        
    }
});

$('#empSal').keypress(function(e){
    if(e.which != 46 && e.which > 31 && e.which <48 || e.which> 57){
        toastr.error('Input should not be letters');
        return false;
    }
});

function clearData(){
    var empName = $('#empName').val('');
    var empAddress = $('#empAddress').val('');
    var empBday = $('#empBday').val('');
    var empAge = $('#empAge').val('');
    var empGender = $('input[name="empGender"]:checked').val();
    var empCivilStatus = $('#empCivilStatus').val('Single');
    var empContactNumber = $('#empContactNumber').val('');
    var empSal = $('#empSal').val('');
    var empActive = $('#empActive').val();
    var empImage = $('#empImage').val();
}

$('#empImage').on('change',function(e){
    var empImage = $('#empImage').val();
    var idxDot = empImage.lastIndexOf(".") + 1;
    var fileType = empImage.substr(idxDot, empImage.length).toLowerCase();
    // console.log(fileType);
    if(fileType == "png" || fileType == "jpg" || fileType == "jpeg" || fileType == "bmp"){
        
    }else{
        toastr.error("Only image files are allowed!");
        $('#empImage').val(null);
        return 0;
    }

});



$(document).on('submit','#uploadEmployee',function(e){

    var empName = $('#empName').val();
    var empAddress = $('#empAddress').val();
    var empBday = $('#empBday').val();
    var empAge = $('#empAge').val();
    var empGender = $('input[name="empGender"]:checked').val();
    var empCivilStatus = $('#empCivilStatus').val();
    var empContactNumber = $('#empContactNumber').val();
    var empSal = $('#empSal').val();
    var empActive = $('#empActive').val();
    var empImage = $('#empImage').val();

    e.preventDefault();

    if($('#empActive').is(":checked")){
        empActive = 1;
    }else{
        empActive = 0;
    }

    if(empName == ''){
        toastr.error('Employee name should not be blank.');
        return 0;
    }

    if(empAddress == ''){
        toastr.error('Address should not be blank.');
        return 0;
    }

    if(empImage == ''){
        toastr.error('Please upload image file');
        return 0;
    }

    if(empBday == ''){
        toastr.error('Please input employee birthday');
        return 0;
    }

    if(empAge == ''){
        toastr.error('Please input employee age');
        return 0;
    }

    if(empContactNumber == ''){
        toastr.error('Please input contact number');
        return 0;
    }
    
    if(empSal == ''){
        toastr.error('Please input employee salary');
        return 0;
    }
    

    $.ajax({
        url:"../crud/createemployee.php",
        type:'POST',
        data: new FormData(this),
        contentType: false,
        cache:false,
        processData:false,
        success:function(data){
            console.log(data);
            if(data == 'Error'){
                toastr.error(data.message);
            }else{
                toastr.success(data.message);
                clearData();
            }

        },
        error:function(err){
            console.log(err);
        }
        
    });

    // $.ajax({
    //     url:'../crud/createemployee.php',
    //     type:'POST',
    //     enctype: 'multipart/form-data',
    //     data:
    //         form.serialize()
    //         // empName:empName,
    //         // empAddress:empAddress,
    //         // empImage:empImage,
    //         // empBday:empBday,
    //         // empAge:empAge,
    //         // empGender:empGender,
    //         // empCivilStatus:empCivilStatus,
    //         // empContactNumber:empContactNumber,
    //         // empSal:empSal,
    //         // empActive:empActive
    //     ,
    //     dataType:'json',
    //     success:function(data){

    //         console.log(data);
    //         if(data.status == 'Error'){
    //             toastr.error(data.message);
    //         }else{
    //             toastr.success(data.message);
    //             clearData();
    //         }
    //     },
    //     error:function(err){
    //         console.log(err);
    //     }
        
    // });

});
