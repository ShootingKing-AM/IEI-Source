<?php 
	include_once './sessionvalidator.php';
	include_once('../db.php'); 

	$code = mysqli_real_escape_string($conn, $_POST['code']);
	$msg = mysqli_real_escape_string($conn, $_POST['msg']);

	$sql = "UPDATE clients SET Message='$msg' WHERE Code='$code'";
	$qury = mysqli_query($conn, $sql);
	mysqli_close( $conn );
	
	header('Location: ../index.php');