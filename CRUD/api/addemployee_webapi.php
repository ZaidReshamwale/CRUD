<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
require_once('apis.php');
if(isset($_POST['ename'],$_POST['eemail'],$_POST['ephone'],$_FILES['eimage'],$_POST['egender'],$_POST['eaddress'],$_POST['code'])){
 $obj=new apis();
 $res=$obj->addemployee($_POST['ename'],$_POST['eemail'],$_POST['ephone'],$_FILES['eimage'],$_POST['egender'],$_POST['eaddress'],$_POST['code']);
 
}else{
	$res['Success']='false';
		$res['Message']='Arguments Missing';
}
}else{
	$res['Success']='false';
	$res['Message']='Invalid Request Method';
}
echo json_encode($res);
?>