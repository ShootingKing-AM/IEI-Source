<?php
	date_default_timezone_set('Asia/Kolkata');	
	include_once './sessionvalidator.php';
	include_once('../db.php'); 
	
	$time = time();	
	$user = $_SESSION['userName'];
	$chat = mysqli_real_escape_string($conn, $_POST['msg']);
	
	$sql = "CREATE TABLE IF NOT EXISTS chat ( ID INT NOT NULL AUTO_INCREMENT, UserName TEXT, Chat TEXT, Doe TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	
	$sql = "INSERT into chat (`UserName`, `Chat`, `Doe`) VALUES ('$user', '$chat', '$time')";
	$qury = mysqli_query($conn, $sql);
	mysqli_close($conn);