<?php

session_start();



if(!isset($_SESSION['usernamea']))
{

    header('location: ../login.php');

 

}

global $adminusername;

$adminusername=$_SESSION['usernamea'];







?>