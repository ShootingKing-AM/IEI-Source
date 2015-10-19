<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();

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