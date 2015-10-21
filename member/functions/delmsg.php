<?php
	include_once './sessionvalidator.php';
	include '../db.php';
	
	$sql = "UPDATE `clients` SET `Message`=NULL WHERE UserName='".$_SESSION['userName']."'";
	mysqli_query($db, $sql);
	mysqli_close($db);

	header('Location: ../index.php');