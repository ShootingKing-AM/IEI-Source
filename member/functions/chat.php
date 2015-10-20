<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();

	date_default_timezone_set('Asia/Kolkata');
	session_start();
	if( !isset($_SESSION['userName']) )
	{
		die("<h1>404 Error</h1><h2> Access Denied</h2><h3><a href='index.php'>Login/Signup</a></h3>");exit;
	}
	
	if( isset($_SESSION['userName']) && ( (time() - $_SESSION['time']) >= 60*60 ))
	{
		header('Location: ../functions/logout.php');
	}
	else
	{
		$_SESSION['time'] = time();
	}		

	include_once('../db.php'); 
	$time = time();	
	$user = $_SESSION['userName'];
	$chat = mysqli_real_escape_string($conn, $_POST['msg']);
	
	$sql = "CREATE TABLE IF NOT EXISTS chat ( ID INT NOT NULL AUTO_INCREMENT, UserName TEXT, Chat TEXT, Doe TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	
	$sql = "INSERT into chat (`UserName`, `Chat`, `Doe`) VALUES ('$user', '$chat', '$time')";
	$qury = mysqli_query($conn, $sql);
	mysqli_close($conn);