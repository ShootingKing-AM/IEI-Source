<?php 
	include_once("../../member/db.php");
 
$time = time();
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$message = htmlspecialchars($_POST['message']);

	$sql = "CREATE TABLE IF NOT EXISTS messages ( ID INT NOT NULL AUTO_INCREMENT, Name TEXT, Email TEXT, Message TEXT, Doe TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	
	$sql = "INSERT into messages (`Name`, `Email`, `Message`, `Doe`) VALUES ('$name', '$email', '$message', '$time')";
	$qury = mysqli_query($conn, $sql);

		if(!$qury)
		{
			echo "Failed ".mysqli_error($db);
		}
		else
		{
		}
?>