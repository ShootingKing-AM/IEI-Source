<?php
	
	include_once './sessionvalidator.php';
	include '../db.php';
	
	$sql = "DELETE FROM `blog` WHERE ID='".mysqli_real_escape_string($conn, $_GET['ID'])."'";
	mysqli_query($db, $sql);

	header('Location: ../blog.php');