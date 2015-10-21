<?php 
	include_once './sessionvalidator.php';	
	include_once('../db.php'); 

	$un = mysqli_real_escape_string($conn, $_POST['n']);
	$user = mysqli_real_escape_string($conn, $_POST['fn']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);
	$m = mysqli_real_escape_string($conn, $_POST['m']);
	$branch = mysqli_real_escape_string($conn, $_POST['br']);
	
	$sql = "UPDATE clients SET UserName='$un', FullName='$user', Branch='$branch', Mobile='$m', Password='".md5(md5($pass))."' WHERE ID=".$_SESSION['userID'];
	$qury = mysqli_query($conn, $sql);
	mysqli_close($db);
	
	if(!$qury)
	{
		echo 'Failed.';
	}
	else
	{
		include "sms/index.php";
	}