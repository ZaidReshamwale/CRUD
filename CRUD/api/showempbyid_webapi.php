<?php 
require_once('apis.php');
$empid = $_POST['empid'];
 $obj=new apis();
 $res=$obj->showempbyid($empid);
 echo json_encode($res);	
	
?>