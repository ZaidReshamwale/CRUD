<?php 
include ("header.php");

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&display=swap" rel="stylesheet">


    <style>

.glow {
    font-style: bold; 
    font-size: 35px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  color: black;
  text-align: center;
  -webkit-animation: glow 1s ease-in-out infinite alternate;
  -moz-animation: glow 1s ease-in-out infinite alternate;
  animation: glow 1s ease-in-out infinite alternate;
}

@-webkit-keyframes glow {
    from {
    text-shadow:  0 0 30px white, 0 0 40px gray, 0 0 20px lime;
  }
  
  to {
    text-shadow: 0 0 30px coral ;
  }

}

body{
    font-family: 'Lato', sans-serif;
}
</style>
</head>
<body>
    <div class="container">

<h1 class="text-warning text-uppercase text-center"><u> Employee - Records </u></h1>

<br><br>    
   <h4 class="glow" style="text-align: left;"><b  style="font-family: 'Lato', sans-serif;text-align: left;"><u>Employee-Details</u></b> </h4>
<div class="d-flex justify-content-end">
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
Add Employee</button>
</div>

<div id="empdetails">
    </div>



<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><p style="text-transform: uppercase; color: grey">Add Employee</p></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="addemp" method="post" enctype="multipart/form-data" > 
        <div class="form-group">
            <label> Employee name:</label>
            <input type="text" name="ename" class="form-control" placeholder="Employee name" required value="">
        </div>


        <div class="form-group">
            <label> Employee email:</label>
            <input type="email" name="eemail" class="form-control" placeholder="Employee email" required value="">

        </div>
            

        <div class="form-group">
            <label> Employee PhoneNo:</label>
            <input type="text" name="ephone" class="form-control" maxlength="10" placeholder="Employee PhoneNo" required value="">
        </div>

        <div class="form-group">
            <label> Employee Image:</label><br>
       <img id="previewHolder"  alt="" width="90px" height="90px" style="border-radius:3px;border:5px "/>
        <input type="file"  name="eimage"   id="eimage" accept="image/*" class="fa fa-file-photo-o" >
        </div>

          <div class="input-field">
            <p>Gender</p>
            <p>
              <label>
                    <input class="with-gap" type="radio" value="1" name="egender" id="egender" />
                    <span>Male</span>
                  </label>
                  <label>
                    <input class="with-gap" type="radio" value="2" name="egender" id="egender" />
                    <span>Female</span>
                  </label>
                  <label>
                    <input class="with-gap" type="radio" value="3" name="egender" id="egender" />
                    <span>Transgender</span>
                  </label>
              </p>
            </div>


<div class="form-group">
            <label> Employee Address:</label>
            <input type="textarea" name="eaddress" class="form-control" placeholder="Employee Address" required value="">
        </div>

<div class="form-group">
            <label> Pin Code:</label>
            <input type="textarea" name="code" class="form-control" placeholder="pincode" pattern="[0-9]{6}" requiredvalue="">
        </div>
 <button type="submit" id="addemployee" class="btn btn-success"  value="Upload">Save</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>


</div>
</div>

</form>

</div>
</div>
</div>


                                                    <br>
                                                   

                                      
                                                    <div class="card-body">

                                                        <table id="emprecord" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    
<th>Serial No</th>
                                                                   
                                                                    <th><b>Employee-Name</b></th>
                                                                    <th><b>Employee-Email</b></th>
                                                                    <th><b>Employee-PhoneNo</b></th>
                                                                    <th><b>Employee-Image</b></th>
                                                                    <th><b>Employee-Gender</b></th>
                                                                    <th><b>Employee-Address</b></th>
                                                                    <th><b>Employee-City</b></th>
                                                                    <th><b>Employee-District</b></th>
                                                                    <th><b>Employee-State</b></th>
                                                                   <th><b>Employee-Country</b></th>
                                                                     
                                                                    
                                                                    <th><b>Modify</b></th>
                                                                  <th><b>Status</b></th>
                                                                  <th><b>Delete</b></th>
                                                                  
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                 </tbody>
                                                                 </table>   
                                                    </div>
                                                </div>
</div>


<!-- preview image before uploading  -->

        <script type="text/javascript">
        function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#previewHolder').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  } else {
    alert('select a file to see preview');
    $('#previewHolder').attr('src', '');
  }
}

$("#eimage").change(function() {
  readURL(this);
});
        </script>

<!-- datatables read employee record -->

    <script type="text/javascript">
      var i=1;
$(document).ready(function () {
  var status="";
  var key;
$('#emprecord').dataTable({ 

   "ajax": {
                                                "url": "api/showemployee_webapi.php",
                                                "dataSrc": "data",
                                                
                                                "type": "GET",
                                                "datatype": "json"
                                            },
                                            "columns": [{
      "render": function(data, type, full, meta) {
        return i++;
      }
    }, {
                                                "data": "ename"
                                            }, 
                                            {
                                                "data": "eemail"
                                            }, 
                                            {
                                                "data": "ephone"
                                            }, 
                                            {
                                                "data": "eimage",
    "render": function(data, type, row) {
        return '<img src="'+data+'" style="height:60px;width:55px;"/>';
    }
                                            },{
                                                "data": "egender",
    "render": function(data, type, row) {
        if (data == 1) {
                       return "Male";
                    } else if (data == 2) {
                       return "Female";
                    } else {
                      return "Transgender";
                    }
    }
                                            },{
                                                "data": "eaddress"
                                            },
                                            {
                                                "data": "city"
                                            },{
                                                "data": "district"
                                            },{
                                                "data": "state"
                                            },{
                                                "data": "country"
                                            },
                                            {
                                         
                                               "data": "empid",
    
    "mRender": function(data, type, row) {
        
        return '<a class="btn btn-primary " button id="empedit" name="empedit" onclick="edit('+data+')"  type="button"  >Edit</a>';
    }
                                            },

                                                                            {
                                                "data": "status",
    "render": function(data, type, row) {
        if(data==0){
            status="Deactive";
            key=1;
        }else{
            status="Active";
            key = 0;
        }
        return '<button id="empstatus" name="empstatus" class="btn btn-primary active"  onclick=statusChange('+row.empid+','+key+') type="button">'+status+'</button>';
    }
                                            },{
                                             "data" : "delete",

                                                "render": function(data, type, row) {
                                            
        
        return '<a class="btn btn-danger " button id="deleteemp" name="deleteemp" onclick= "Delete('+row.empid+')"  type="button">Delete</a>';
        }
    }]
});
});

 function edit(empId){
                                        
                               document.location="index2.php?id="+ window.btoa(empId);
                                        }





  function statusChange(id,statusToBeUpdate){
        
                                        $.ajax({

type : 'POST',
url : 'api/ademp_webapi.php',
data : {
    empid:id,
    key : statusToBeUpdate
},

success: function (response) 
                {
              
    var json = $.parseJSON(response);
            if (json.Success == 'true' )
            {
                alert(json.Message);
                location.reload();   
            }
            else
            {
                alert(json.Message);

            }
                }


});
};

// delete employee


function Delete(empId) {
    // alert (empId);
    $.ajax({
      type: "POST",
      url: 'api/deleteemployee_webapi.php', //delete action
      data: { empid : empId }, //use id here
    
      success: function (response) {
        
        alert("Employee Deletion Completed");
location.reload();
      },
      error: function (error) {
          alert ("Deletion Failed");

      }
   });
}
</script>



<!-- add employee -->

<script>
$(function() {
    $("input[name='ephone']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
    $("input[name='code']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^0-9]{6}/g, ''));
  });

  
});
</script>

<script type="text/javascript">

$("form#addemp").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: 'api/addemployee_webapi.php',
        type: 'POST',
        data: formData,
        success: function (data) {
            
             var json = $.parseJSON(data);
            if (json.Success == 'true' )
            {
                alert(json.Message);
                
            location.href = "index.php";    
            }
            else
            {
                alert(json.Message);

            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
});


</script>






</body>
</html>



