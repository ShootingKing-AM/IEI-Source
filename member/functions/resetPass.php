<?php
	session_start();
	if( !isset($_POST['p']) || !isset($_SESSION['ResetPassAccountDetails']) )
	{
		exit; die();		
	}

	$AccDetails = $_SESSION['ResetPassAccountDetails'];
	unset($_SESSION['ResetPassAccountDetails']);
	
	include_once '../db.php';
	
	$pass = mysqli_real_escape_string($db, $_POST['p']);
	
	$sql = "UPDATE clients SET Password ='".md5(md5($pass))."' WHERE ID='".$AccDetails['ID']."'";
	mysqli_query( $db, $sql );	
	mysqli_close( $db );
	
	header("Location: ../index.php");
	