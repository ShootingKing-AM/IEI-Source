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

	$time = time();
	$user = $_SESSION['userName'];
	$head = htmlspecialchars($_POST['head']);
	$mat = htmlspecialchars($_POST['mat']);
	
	$sql = "CREATE TABLE IF NOT EXISTS blog ( ID INT NOT NULL AUTO_INCREMENT, UserName TEXT, Heading TEXT, Matter TEXT, Doe TEXT, PRIMARY KEY (ID) )";
	
	$qury = mysqli_query($conn, $sql);
	$sql = "INSERT into blog (`UserName`, `Heading`, `Matter`, `Doe`) VALUES ('$user', '$head', '$mat', '$time')";
	$qury = mysqli_query($conn, $sql);

	if(!$qury)
	{
		echo "Failed ".mysqli_error($db);
	}
	else
	{
		header('Location: blog.php');
	}
?>