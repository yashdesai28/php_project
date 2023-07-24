<?php 

//check_login.php

include 'config.php';

session_start();

$query = "SELECT sessionid FROM users WHERE username = '".$_SESSION['username']."'";

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($result))
{
	if($_SESSION['user_session_id'] != $row['sessionid'])
	{
		$data['output'] = 'logout';
	}
	else
	{
		$data['output'] = 'login';
	}
}

echo json_encode($data);

?>