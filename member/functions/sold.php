<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?php 
	include_once("../db.php");
	
	$sold =  mysqli_real_escape_string( $conn, $_GET['sold']);
	$sql = "UPDATE membcodes SET SoldToID = 1 WHERE ID = '$sold'";
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