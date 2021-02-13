<?php 
require_once('apis.php');
 $empid = $_POST['empid'];
 $newename = $_POST['ename'];
 
$newephone = $_POST['ephone'];
 $neweimage = $_FILES['eimage'];
 $neweaddress = $_POST['eaddress'];
 if($neweimage['error'] != 4){
     $flag=1;
 }else{
     $flag=0;
 }
 
// $flag = $_POST['flag'];
 $obj=new apis();
 $res=$obj->editemp($empid,$newename,$newephone,$neweimage,$neweaddress,$flag);
echo json_encode($res);	
?>