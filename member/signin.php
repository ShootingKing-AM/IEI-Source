<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?php 
	include_once("db.php"); 
	session_start(); 
 
	$uname = htmlspecialchars($_POST['name']);
	$pass = htmlspecialchars($_POST['pwd']);

	$sql = "SELECT count(*),ID,IsAdmin FROM clients WHERE( UserName='".$uname."' AND Password='".md5(md5($pass))."')";

	$qury = mysqli_query($db, $sql);

	$result = mysqli_fetch_array($qury);
	
	if($result['count(*)']!=0)
	{
		$_SESSION['userName'] = $uname;
		$_SESSION['userID'] = $result['ID'];
		$_SESSION['IsAdmin'] = (($result['IsAdmin']=='Yes')?true:false);
		$_SESSION['time'] = time();
		
		header('Location: index1.php');
		exit;
	}
	header('Location: index.php');
?>