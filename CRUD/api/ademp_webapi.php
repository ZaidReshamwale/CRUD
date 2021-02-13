<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	include_once('apis.php');
if(isset($_POST['empid'],$_POST['key'])){
 $obj=new apis();
 $res=$obj->ademp($_POST['empid'],$_POST['key']);
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