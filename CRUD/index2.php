<?php 
include ("header.php");

?>

<!DOCTYPE html>
<html >


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />



    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit - Employee</title>
  

</head>
<style>
body{
    font-family: 'Lato', sans-serif;
}
</style>
<body>


   
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
               <b> Edit Employee </b>
            </h1>
            <ol class="breadcrumb">
               
            </ol>
        </div>

        <div id="page-inner">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-action">

                            <div class="content pb-5">
                                <div class="animated fadeIn">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
    <div class="card-header"><strong><b style="font-size: medium  ;font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif">Edit - Employee </b></strong><small> Details</small></div><br>
                                        
                                                    <form id="editemp" name="empform"   method="post" enctype="multipart/form-data" >
                                                    <div class="card-body card-block">
                                                        
                                                         <input type="hidden"  name="empid" id="empid">
                                                        <div class="form-group">
                                  <label for="Employee" class=" form-control-label" style="font-size: 20px;color:#3A0A56;font-weight: initial;"> Employee Name</label>
 <input type="text" name="ename" placeholder="Enter Employee name"  style="width:99%;" value="" class="form-control" required value=""><br>

                                      

                                                         <div class="form-group">
                                  <label for="Employee" class=" form-control-label" style="font-size: 20px;color:#3A0A56;font-weight: initial;"> Employee Phone</label>
 <input type="text" name="ephone" placeholder="Enter Employee phone"  maxlength="10" style="width:99%;" value="" class="form-control" required value=""><br>



                                                          <label for="category_image" style="font-size: 20px;color:#3A0A56;font-weight: initial;">Upload new image : </label>
                                                            <br>
                                                            <input type="hidden"  name="cat_id" id="cat_id">
                                                            <img id="previewHolder"  alt="" width="70px" height="70px" style="border-radius:3px;border:5px "/>
                                                            <input type="file" id="eimage"  value="" name="eimage" accept="image/*" class="fa fa-file-photo-o" >

                                                           <div class="empimage"><b> Existing Employee Image</b></div>
                                                        </div><br>

                                                                                               <div class="form-group">
                                  <label for="Employee" class=" form-control-label" style="font-size: 20px;color:#3A0A56;font-weight: initial;"> Employee Address</label>
 <input type="textarea" name="eaddress" placeholder="Enter Employee Address"  style="width:99%;" value="" class="form-control" required value=""><br>


                                                        <button type="submit" class="btn btn-lg btn-info btn-block" value="Upload" id="catedit" >UPDATE</button>
                                                       

                                                        
                                                   </button>
                                          
                                                    </div>
                                                </form>
                                               



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>








                        </div>
                    </div>


                </div>

                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src ="assets/js/jquery.min.js"></script>  

    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/materialize/js/materialize.min.js"></script>

    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>

        <!-- Custom Js -->
        <script src="assets/js/custom-scripts.js"></script>

 
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

 
 <!-- code for edit -->

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>


   <script>
 $(document).ready(function () {
     var id="<?= $_REQUEST['id'] ?>";
   var dec = window.atob(id);
   // alert(window.atob(id));
  
   $.ajax ({
       type:'POST',
       url : 'api/showempbyid_webapi.php',
       data : {"empid": dec},

       success: function(data){
      var json = $.parseJSON(data);
     
            if(json.Success == 'true')
            {
              response=json['data'];
              for (var i = 0, len = response.length; i < len; ++i) {
                var catObj = response[i];      
                //  alert(catObj.category_name);
                 
                //  var html = '<p>'+catObj.category_name+'</p>';
                //  $(".cat_id").val(catObj.cat_id);
                 $('input[name="empid"]').val(catObj.empid);
                 $('input[name="ename"]').val(catObj.ename);
                

                   $('input[name="ephone"]').val(catObj.ephone);
                //   $(".cat_name").append(html);
                  


                  var html1 = '<img class="center" style="height: 85px;width: 100px" src='+catObj.eimage+'>';
                  $(".empimage").append(html1);

                   $('input[name="eaddress"]').val(catObj.eaddress);
             }
            }                        
            else
               alert(json.Message);
           }
 });
 });
</script>



<script>
$(function() {
    $("input[name='ephone']").on('input', function(e) {
        $(this).val($(this).val().replace(/[^0-9]/g, ''));
    });
 

  
});
</script>


<script type="text/javascript">

$("form#editemp").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);
if (!$.trim(previewHolder))
{
    flag=1;
}else
flag=0;
var id="<?= $_REQUEST['id'] ?>";
   var dec = window.atob(id);
   //alert(dec);
    $.ajax({
        url: 'api/editemp_webapi.php',
        type: 'POST',   
        data : formData,
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