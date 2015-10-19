<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();

	include_once('../db.php'); 
	$time = time();

	do
	{
		$code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
		$sql = "SELECT COUNT(*) FROM clients WHERE Code='$code'";
		$res = mysqli_fetch_array(mysqli_query($conn, $sql));
	}	
	while( $res['COUNT(*)'] != 0 );
	
	$user = mysqli_real_escape_string($conn, $_POST['n']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);
	$em = mysqli_real_escape_string($conn, $_POST['em']);
	$fn = mysqli_real_escape_string($conn, $_POST['fn']);
	$m = mysqli_real_escape_string($conn, $_POST['m']);
	
	$sql = "CREATE TABLE IF NOT EXISTS clients ( ID INT NOT NULL AUTO_INCREMENT, Code TEXT, Email TEXT, FullName TEXT, UserName TEXT, Password TEXT, Mobile TEXT, Branch TEXT, Amnt TEXT, Joinfest TEXT, Report TEXT, Message TEXT, IsAdmin TEXT, Doe TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	
	$sql = "INSERT into clients (`Code`, `FullName`, `UserName`, `Password`, `Email`, `Mobile`, `Doe`) VALUES ('$code', '$fn', '$user', '".md5(md5($pass))."', '$em', '$m', '$time')";
	$qury = mysqli_query($conn, $sql);

	if(!$qury)
	{
		echo "Failed.";
	}
	else
	{
		include "../sms/signupsms.php";
	}