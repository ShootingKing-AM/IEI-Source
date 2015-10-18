<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?php
	 session_start();
	if( !isset($_SESSION['userName']) )
	{
		die("<h1>404 Error</h1><h2> Access Denied</h2><h3><a href='index.php'>Login/Signup</a></h3>");exit;
	}
	
	if( isset($_SESSION['userName']) && ( (time() - $_SESSION['time']) >= 60*60 ))
	{
		header('Location: logout.php');
	}
	else
	{
		$_SESSION['time'] = time();
	}
		
?>
<?php 
	include_once("db.php"); 

	$un = htmlspecialchars($_POST['n']);
	$user = htmlspecialchars($_POST['fn']);
	$pass = htmlspecialchars($_POST['pass']);
	$m = htmlspecialchars($_POST['m']);
	$branch = htmlspecialchars($_POST['br']);
	
	$sql = "Update  clients SET UserName='$un', FullName='$user', Branch='$branch', Mobile='$m', Password='".md5(md5($pass))."' WHERE ID=".$_SESSION['userID'];
	$qury = mysqli_query($conn, $sql);

	if(!$qury)
	{
		echo "Failed ".mysqli_error($db);
	}
	else
	{
		include "sms/index.php";
	}
?>