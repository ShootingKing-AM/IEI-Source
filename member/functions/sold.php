<?php 
	include_once './sessionvalidator.php';
	include_once("../db.php");
	
	$sold =  mysqli_real_escape_string( $conn, $_GET['sold']);
	$sql = "UPDATE membcodes SET SoldToID = 1 WHERE ID = '$sold'";
	$qury = mysqli_query($conn, $sql);

	header('Location: ../index.php');