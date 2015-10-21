<?php 
	include_once './sessionvalidator.php';	
	include_once("../db.php");
	
	$sql = "CREATE TABLE IF NOT EXISTS membcodes ( ID INT NOT NULL AUTO_INCREMENT, Code TEXT, CreatorID TEXT, SoldToID TEXT, Time TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	
	for( $i = 0; $i < 10; $i++ )
	{
		do
		{
			$code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
			$sql = "SELECT * FROM membcodes WHERE Code='$code'";
			$res = mysqli_query($conn, $sql);
		}
		while( mysqli_num_rows($res) != 0 );
		$sql = "INSERT INTO membcodes ( Code, CreatorID, SoldToID, Time ) VALUES ( '$code', '".$_SESSION['userID']."', NULL, '".time()."' )";
		mysqli_query( $conn, $sql );
	}
	header('Location: ../index.php');
?>