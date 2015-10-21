<?php 
	include_once './sessionvalidator.php';
	include_once('../db.php'); 

	$user = $_SESSION['userName'];
	$head = mysqli_real_escape_string($conn, $_POST['head']);
	$mat = mysqli_real_escape_string($conn, $_POST['mat']);
	
	$sql = "CREATE TABLE IF NOT EXISTS blog ( ID INT NOT NULL AUTO_INCREMENT, UserName TEXT, Heading TEXT, Matter TEXT, Doe TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	
	$sql = "INSERT INTO blog (`UserName`, `Heading`, `Matter`, `Doe`) VALUES ('$user', '$head', '$mat', '".time()."')";
	$qury = mysqli_query($conn, $sql);
	mysqli_close($conn);
	
	header('Location: ../blog.php');