<?php 
include 'alldef.php';
	class apis{
		private $db;
		private $server;
		private $username;
		private $password;
		private $con;

		private $response;		
		
		function __construct() {
    		$this->con = mysqli_connect("localhost","root","","employee");
		    if (mysqli_connect_errno()) {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  exit();	
			}
  		}

		public function imageUpload($image,$path,$url){ 
		 	$fileinfo=PATHINFO($image["name"]);
	        $newFilename= rand()."." . $fileinfo['extension'];
			
	        $target=$url.$newFilename;
			   $valid_extensions = array("jpg","jpeg","png");
	        
	        move_uploaded_file($image["tmp_name"], $path.$newFilename); //img ,path
	        return $target;
	}


	function addemployee($ename,$eemail,$ephone,$eimage,$egender,$eaddress,$code){
			$ename = mysqli_real_escape_string($this->con, $ename);
			$eemail = mysqli_real_escape_string($this->con, $eemail);
			$ephone = mysqli_real_escape_string($this->con, $ephone);
		   // $egender = mysqli_real_escape_string($this->con, $egender);
			$eaddress = mysqli_real_escape_string($this->con, $eaddress);
			$code = mysqli_real_escape_string($this->con, $code);
			// duplicate email cant be 
			$sql="SELECT * FROM `emp` WHERE `eemail`='$eemail'";
			$result = mysqli_query($this->con,$sql);
	   if($result->num_rows > 0){
		   $response['Success']='false';
				 $response['Message']="This Employee email is already taken";
	   }
	   else{
		   $msg="Employee Added Successfully";
		   if($eimage['error'] != 4){
		   $catUrl = $this->imageUpload($eimage,$_SERVER["DOCUMENT_ROOT"].empuploadpath,defaultemployeeeimageUrl);	
		   }else{
			   $catUrl=defaultemployeeimage;
		   }
   $address=$this->getadd($code);
          if($address['Success'] == 'true'){
            $CityName=$address['Data']['CityName'];
          $District=$address['Data']['District'];
          $State=$address['Data']['State'];
          $Country=$address['Data']['Country'];
		   $res = mysqli_query($this->con,"INSERT INTO `emp` (`ename`,`eemail`,`ephone`, `eimage`, `egender` ,
		   	`eaddress` ,`city`,`district`,`state`,`country`) VALUES ('$ename','$eemail','$ephone', '$catUrl','$egender','$eaddress','$CityName','$District','$State','$Country')");

		   if($res){
			   $response['Success']='true';
				 $response['Message']="Employee Added Successfully";	
		   }else{
			   $response['Success']='false';
				 $response['Message']="Employee creation Failed";	
		   }
		}else{
            $response['Success']='false';
            $response['Message']="Invalid Zip Code";
          }
			
	   } return $response;
   }
	

function showemployee()
	{
		$temp=array();
		$sql="SELECT * FROM `emp` ORDER BY ename ASC";
		$result = mysqli_query($this->con,$sql);
   
			if ($result->num_rows > 0) 
			{
  				while($row = mysqli_fetch_assoc($result)) 
  				{
  					array_push($temp, $row);
            	
				}
				$response['Success']='true';
			  	$response['Message']=" data found";
				$response['data'] =$temp;
			}else{
				$response['Success']='false';
			  	$response['Message']="No data found";	
			}
			return $response;
	}


	   function deleteemployee($empid)
    {
    		$temp=array();
    		$sql="DELETE FROM emp WHERE empid='$empid'";
    		$result = mysqli_query($this->con,$sql);
      		if ($this->con->affected_rows>0) 
      		{
        		$response['Success']='true';
          		$response['Message']="Delete Employee Successfull";
      		}else{
        		$response['Success']='false';
          		$response['Message']="Delete Employee Unsuccessfull..";  
      		}
      		return $response;
	}

		function getadd($epincode){
			
			$url = file_get_contents('https://api.postalpincode.in/pincode/'.$epincode);
			$array = json_decode($url,TRUE);
				if($array[0]['Status'] == 'Success'){
					$response['Success']='true';
			$CityName = $array[0]['PostOffice'][0]['Name'];
			$District = $array[0]['PostOffice'][0]['District'];
			$State = $array[0]['PostOffice'][0]['State'];
			$Country = $array[0]['PostOffice'][0]['Country'];
 			$response['Data'] = array("CityName"=>$CityName,"District"=>$District,"State"=>$State,"Country"=>$Country);
 			}else{
 				$response['Success']='false';
 				$response['Message']='enter a valid postalcode';
 			}
 			return $response;
			}
	
		function showempbyid($empid)
	{
		$temp=array();
		$sql = "SELECT empid,ename,eemail,ephone,eimage,eaddress FROM `emp` WHERE empid='$empid'";
		$result = mysqli_query($this->con,$sql);
   
			if($result && $result->num_rows > 0) 
			{
  				while($row = mysqli_fetch_assoc($result))
  				{
  					array_push($temp, $row);
				}
				$response['Success']='true';
			  	$response['Message']=" data found";
				$response['data'] =$temp;
			}else{
				$response['Success']='false';
			  	$response['Message']="No data found";
			}
			return $response;
	}
	




function editemp($empid,$newename,$newephone,$neweimage,$neweaddress,$flag){
	$newename = mysqli_real_escape_string($this->con, $newename);

	$newephone = mysqli_real_escape_string($this->con, $newephone);
	$neweaddress = mysqli_real_escape_string($this->con, $neweaddress);
	

   
 if($flag==1){
   if($neweimage['error'] != 4){
   $catUrl = $this->imageUpload($neweimage,$_SERVER["DOCUMENT_ROOT"].empuploadpath,defaultemployeeeimageUrl);  
   }else{
	 $catUrl=defaultemployeeimage;
   }
   
   $res = mysqli_query($this->con,"UPDATE `emp` SET ename='$newename',ephone='$newephone',eimage='$catUrl',eaddress='$neweaddress' WHERE empid='$empid'");
	 if($this->con->affected_rows>0){
	 $response['Success']='true';
	   $response['Message']="Edited Employee Details Successfull";  
	 }else{
		 $response['Success']='false';
	   $response['Message']=mysqli_error($this->con);
	   }
 }else if($flag==0){
 $sql= "UPDATE `emp` SET ename='$newename',ephone='$newephone',eaddress='$neweaddress'  WHERE empid='$empid'";
 $result = mysqli_query($this->con,$sql);
 if($this->con->affected_rows>0){
   $response['Success']='true';
	   $response['Message']="Edited Employee successfull with the previous image";  
   }else{
	 $response['Success']='false';
	   $response['Message']=mysqli_error($this->con);  
   }
 }
 else{
 $response['Success']='false';
	   $response['Message']=$flag;  
 }
 return $response;    
 }


// active deactive 

function ademp($empid,$key)
	{
		if ($key == 1){
		$sql = "UPDATE emp SET status='$key' WHERE empid = '$empid'";
		$result = mysqli_query($this->con,$sql);
		if($this->con->affected_rows>0){
				$response['Success']='true';
			  	$response['Message']="Employee activated";
  			
			}else{
					$response['Success']='false';
			  	$response['Message']="Employee doesnt exist";
			}
			  return $response;
		}
		else if($key == 0)
		{
			$sql = "UPDATE emp SET status='$key' WHERE empid = '$empid'";
		$result = mysqli_query($this->con,$sql);
		if($this->con->affected_rows>0){
				$response['Success']='true';
			  	$response['Message']="Employee deactivated";
  			
			}else{
					$response['Success']='false';
			  	$response['Message']="Employee doesnt exist";
			}
			  return $response;
		}
		else
		{
			$response['Success']='false';
			$response['Message']="Failed";
		}
		return $response;
	} 


}


?>
