<?php
$pincode=$_POST['pincode'];
$data=file_get_contents('http://postalpincode.in/api/pincode/'.$pincode);
$data=json_decode($data);
if(isset($data->PostOffice['0'])){
	
	if($pincode=='395006'){
		$arr['area']=$data->PostOffice['5']->Name;
		$arr['city']=$data->PostOffice['5']->Circle;
		$arr['state']=$data->PostOffice['5']->Country;
	}elseif($pincode=='395004'){

		$arr['area']=$data->PostOffice['2']->Name;
		$arr['city']=$data->PostOffice['2']->Circle;
		$arr['state']=$data->PostOffice['2']->Country;
	}
		
		
	
	echo json_encode($arr);
	
}else{
	echo 'no';
}
?>