<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?php 
	include_once("db.php"); 

	$code = htmlspecialchars($_POST['code']);
	$msg = htmlspecialchars($_POST['msg']);
	
	$qury = mysqli_query($conn, $sql);
	$sql = "Update clients SET Message='$msg' WHERE Code='$code'";
	$qury = mysqli_query($conn, $sql);

	if(!$qury)
	{
		echo "Failed ".mysqli_error($db);
	}
	else
	{
		header('Location: index.php');
	}
?>