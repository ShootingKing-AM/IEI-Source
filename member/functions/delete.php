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


	require '../db.php';
		
		$del =  mysqli_real_escape_string( $conn, $_GET['id']);
		$sql = "DELETE FROM `blog` WHERE ID='$del'";
		mysqli_query($db, $sql);

	header('Location: ../blog.php');
?>