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
	include_once("../db.php"); 

	$time = time();
	$length = 10;
	// $code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	// $code1 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	// $code2 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	// $code3 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	// $code4 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	// $code5 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	// $code6 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	// $code7 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	// $code8 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	// $code9 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	$code = '';
	for( $i = 0; $i < 10; $i++ )
	{
		$code .= substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$code .= ';';
	}
	
	$user = htmlspecialchars($_SESSION['userName']);
	
	$sql = "CREATE TABLE IF NOT EXISTS membcodes ( ID INT NOT NULL AUTO_INCREMENT, MemberID TEXT, Codes TEXT PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	
	// $sql = "INSERT into clients (`Ticket`, `UserName`) VALUES ('$code', '$user')";
	// $sql = "UPDATE clients SET `Codes`='$code'
	// $sql = "INSERT into clients (`Ticket`, `UserName`) VALUES ('$code1', '$user')";
	// $sql = "INSERT into clients (`Ticket`, `UserName`) VALUES ('$code2', '$user')";
	// $sql = "INSERT into clients (`Ticket`, `UserName`) VALUES ('$code3', '$user')";
	// $sql = "INSERT into clients (`Ticket`, `UserName`) VALUES ('$code4', '$user')";
	// $sql = "INSERT into clients (`Ticket`, `UserName`) VALUES ('$code5', '$user')";
	// $sql = "INSERT into clients (`Ticket`, `UserName`) VALUES ('$code6', '$user')";
	// $sql = "INSERT into clients (`Ticket`, `UserName`) VALUES ('$code7', '$user')";
	// $sql = "INSERT into clients (`Ticket`, `UserName`) VALUES ('$code8', '$user')";
	// $sql = "INSERT into clients (`Ticket`, `UserName`) VALUES ('$code9', '$user')";
	$qury = mysqli_query($conn, $sql);

		if(!$qury)
		{
			echo "Failed ".mysqli_error($db);
		}
		else
		{
			header('Location: ../index.php');
		}
?>