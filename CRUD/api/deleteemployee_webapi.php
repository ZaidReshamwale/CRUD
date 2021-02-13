<?php 
require_once('apis.php');
$empid = $_POST['empid'];

if(isset($empid)){
 $obj=new apis();
 $res=$obj->deleteemployee($empid);
 echo json_encode($res);	
}
?>