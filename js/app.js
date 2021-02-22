$(document).ready(function(){

    $(document).on('click','#btnLogin',function(e){
        e.preventDefault();
        var username = $('#username').val();
        var password = $('#password').val();


        $.ajax({
            url:'crud/login.php',
            type:'POST',
            data:{
                username:username,
                password:password
            },
            dataType:'json',
            success:function(data){
                // console.log(data);
                if(data.status === 'Error'){
                    toastr.error(data.message);
                }else{
                    window.location.href = 'dashboard.php';
                    
                }
            },
            error:function(err){
                console.log(err);
            }
        });

    });

    $(document).on('click','.updateLink',function(e){
        e.preventDefault();
        var recid = $(this).val();
        
        $.ajax({
            url:'../crud/update.php',
            type:'POST',
            data:{
                recid:recid
            },
            dataType:'json',
            success:function(data){
                if(data.status == 'Error'){
                    toastr.error(data.message);
                }else{
                    $('#updaterecid').val(data.recid);
                    $('#updatefullname').val(data.fullname);
                    $('#updateaddress').val(data.address);
                    $('#updatebirthdate').val(data.birthdate);
                    $('#updateage').val(data.age);
                    $('#updatestatus').val(data.civilstatus);
                    $('#updatecontact').val(data.contactnum);
                    $('#updatesalary').val(data.salary);

                    if(data.isactive == 1){
                        $('#updateactive').prop("checked", true);
                    }else{
                        $('#updateactive').prop("checked",false); 
                    }
                }
            },
            error:function(error){
                console.log(error);
            }
        });

    });

    

    $('#updateage').keypress(function(e){
        if(e.which != 8 && e.which !=0 && e.which < 48 || e.which > 57){
            toastr.error('Input should not be letters');
            return false;
            
        }
    });

    $('#updatecontact').keypress(function(e){
        if(e.which != 8 && e.which !=0 && e.which < 48 || e.which > 57){
            toastr.error('Input should not be letters');
            return false;
            
        }
    });

    $('#updatesalary').keypress(function(e){
        if(e.which != 46 && e.which > 31 && e.which <48 || e.which> 57){
            toastr.error('Input should not be letters');
            return false;
        }
    });




    $(document).on('click','#btnUpdateUser',function(e){
        e.preventDefault();

        var recid = $('#updaterecid').val();
        var fullname = $('#updatefullname').val();
        var address = $('#updateaddress').val();
        var birthdate = $('#updatebirthdate').val();
        var age = $('#updateage').val();
        var status = $('#updatestatus').val();
        var contactnumber = $('#updatecontact').val();
        var salary = $('#updatesalary').val();
        var isactive = $('#updateactive').val();

        if($('#updateactive').is(":checked")){
            isactive = 1;
        }else{
            isactive = 0;
        }

        $.ajax({
            url:'../crud/updateuser.php',
            type:'POST',
            data:{
                recid:recid,
                fullname:fullname,
                address:address,
                birthdate:birthdate,
                age:age,
                status:status,
                contactnumber:contactnumber,
                salary:salary,
                isactive:isactive

            },
            dataType:'json',
            success:function(data){
                console.log(data);
                if(data.status == 'Error'){
                    toastr.error(data.message);
                 
                }else{
                    toastr.success(data.message);
                    setTimeout(function(){
                        window.location.reload(1);
                    },1000);
                    
                }
            },
            error:function(error){
                console.log(error);
            }
        });
       
    });

    // $(document).on('click','.logoutDashboard',function(e){
    //     $.ajax({
    //         url:'sessionhandler.php',
    //         type:'post',
    //         success:function(){
    //             toastr.success("Loggin out...");
    //             setTimeout(function(){    
    //             window.location.reload(1);
    //             },3000);
    //         },
    //         error:function(err){
    //             console.log(err);
    //         }
    //     });
    // });

    // $(document).on('click','.logout',function(e){
    //     $.ajax({
    //         url:'../sessionhandlerFolder.php',
    //         type:'post',
    //         success:function(data){
    //             toastr.success("Loggin out...");
    //             setTimeout(function(){    
    //             window.location.reload(1);
    //             },3000);
    //         },
    //         error:function(err){
    //             console.log(err);
    //         }
    //     });
       
    // });

    $(document).on('click','.btnDelete',function(e){
        var recid = $(this).val();
        
        $.ajax({
            url:'../crud/deleteuser.php',
            type:'POST',
            data:{
                recid:recid
            },
            dataType:'json',
            success:function(data){
                if(data.status == 'Error'){
                    toastr.error(data.message);
                }else{
                    toastr.success(data.message);
                    setTimeout(function(){
                        window.location.reload(1);
                    },1000);
                }
            },
            error:function(error){
                console.log(error);
            }
        });

    });

    $('.btnAppend').click(function(e){
        e.preventDefault();
        var month = $(this).closest('tr').find('.monthz').text();
        var year = $(this).closest('tr').find('.yearz').text();
        var firstOrLast = $(this).closest('tr').find('.firstOrLast').text();
        var expr;

        if(firstOrLast == 'F'){
            expr = new Date(year, month - 1,1);
        }else if(firstOrLast =='L'){
            expr = new Date(year, month ,0);
        }

        var date = new Date(expr);
        var fullDate = (date.getMonth() + 1) + "/" + (date.getDate()) + "/" + (date.getFullYear()); 

        $(this).closest('tr').find('.generateDate').text(fullDate);

    });



    $('.appendDesc').click(function(e){
        e.preventDefault();
        var code = $(this).closest('tr').find('.custcode').text();
        var desc;
        switch(code){
            case "CUS1":
                desc = "CUSTOMER 1";
                break;
            case "CUS2":
                desc = "CUSTOMER 2";
                break;
            case "CUS3":
                desc = "CUSTOMER 3";
                break;
            case "CUS4":
                desc = "CUSTOMER 4";
                break;
            case "CUS5":
                desc = "CUSTOMER 5";
                break;
            default:
                text = "Unknown Customer";

        }

        $(this).closest('tr').find('.description').text(desc);

    });

    $(document).on('click','#btnRmDupe',function(e){
        var lastTable = $('#lastTable');
        var field1 = [];
        var field2 = [];
        var field3 = [];
        var allFields = [];

        lastTable.find('tr').each(function(){
            field1.push($(this).find('.sama1').text());
        });

        lastTable.find('tr').each(function(){
            field2.push($(this).find('.sama2').text());    
        });

        lastTable.find('tr').each(function(){
            field3.push($(this).find('.sama').text());
        });

        var fieldLength = field1.length;

        for(i = 1 ; i < fieldLength ; i++){
            allFields.push(field1[i] + "," + field2[i] + "," + field3[i]);
        }

        for(i = 0; i <= allFields.length; i++){
            if(allFields[i] == allFields[i + 1]);
            allFields.splice(i,1);
        }

        $('#lastTable tr').remove();
        $('#lastTable').append("<tr>"+
         
            "<td>" + 'f1-001,f2-001,f3-001' + "</td>" +

        "</tr>");
    
        for(j = 0; j< allFields.length; j++){
            
        $('#lastTable').append("<tr>" +
           
            "<td>" + allFields[j] + "</td>" +
        "</tr>");

        }

        console.log(allFields);
        

    });

    // $(document).on('click','.btnSubmitContact',function(){
    //     var form = $('#contactDevDialog');
    //     form.serialize();

    //     $.ajax({
    //         url:'programming-training/formSerialize.php',
    //         type:'post',
    //         data:form,
    //         success:function(data){
    //             console.log(data);
    //         },
    //         error:function(err){
    //             console.log(err);
    //         }
    //     });


    // });


    // var dialog;

    // function getContactInformation(){

    // }

    // $('#contactDevDialog').dialog({
    //     autoOpen:false,
    //     title:'Contact Developer',
    //     height:400,
    //     width:300,
    //     modal:true,
    //     buttons:{
    //         "Contact Now":function(){
    //             $('button:contains(Contact Now)').attr({
    //                 id:'btnContactNow',
    //                 type:'submit',
    //                 class:'btnSubmitContact'
                
    //             });
                
                
    //         },
    //         Cancel:function(){
    //             $(this).dialog("close");
    //         }
    //     }
    // });


    // $(document).on('click','#contactDev',function(e){

    //     $('#contactDevDialog').dialog("open");
    //     return false;

    // });


});