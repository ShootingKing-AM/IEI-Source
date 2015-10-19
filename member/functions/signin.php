<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
 
	include_once('../db.php'); 
	session_start(); 
 
	$uname = mysqli_real_escape_string($db, $_POST['name']);
	$pass = mysqli_real_escape_string($db, $_POST['pwd']);

	$sql = "SELECT count(*),ID,IsAdmin FROM clients WHERE( UserName='".$uname."' AND Password='".md5(md5($pass))."')";

	$result = mysqli_fetch_array(mysqli_query($db, $sql));
	mysqli_close($db);
	
	if($result['count(*)']!=0)
	{
		$_SESSION['userName'] = $uname;
		$_SESSION['userID'] = $result['ID'];
		$_SESSION['IsAdmin'] = (($result['IsAdmin']=='Yes')?true:false);
		$_SESSION['time'] = time();
		
		header('Location: ../index1.php');
		exit;
	}
	header('Location: ../index.php');