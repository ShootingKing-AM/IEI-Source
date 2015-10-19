<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();

	session_start();
	$time = time();
	
	if( !isset($_SESSION['userName']) )
	{
		die("<h1>404 Error</h1><h2> Access Denied</h2><h3><a href='index.php'>Login/Signup</a></h3>");exit;
	}
	
	if( isset($_SESSION['userName']) && ( ($time - $_SESSION['time']) >= 60*60 ))
	{
		header('Location: functions/logout.php');
	}
	else
	{
		$_SESSION['time'] = $time;
	}
	
	include_once('../db.php'); 

	$user = $_SESSION['userName'];
	$head = mysqli_real_escape_string($conn, $_POST['head']);
	$mat = mysqli_real_escape_string($conn, $_POST['mat']);
	
	$sql = "CREATE TABLE IF NOT EXISTS blog ( ID INT NOT NULL AUTO_INCREMENT, UserName TEXT, Heading TEXT, Matter TEXT, Doe TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	
	$sql = "INSERT INTO blog (`UserName`, `Heading`, `Matter`, `Doe`) VALUES ('$user', '$head', '$mat', '$time')";
	$qury = mysqli_query($conn, $sql);
	mysqli_close($conn);
	
	header('Location: ../blog.php');