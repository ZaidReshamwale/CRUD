<?php 
require_once('apis.php');
 $obj=new apis();
 $res=$obj->showemployee();
 echo json_encode($res);	
	
?>