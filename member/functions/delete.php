<?php
	session_start();
	if( !isset($_SESSION['userName']) )
	{
		die("<h1>404 Error</h1><h2> Access Denied</h2><h3><a href='index.php'>Login/Signup</a></h3>");exit;
	}
	
	if( isset($_SESSION['userName']) && ( (time() - $_SESSION['time']) >= 60*60 ))
	{
		header('Location: functions/logout.php');
	}
	else
	{
		$_SESSION['time'] = time();
	}

	include '../db.php';
	
	$sql = "DELETE FROM `blog` WHERE ID='".mysqli_real_escape_string($conn, $_GET['id'])."'";
	mysqli_query($db, $sql);

	header('Location: ../blog.php');