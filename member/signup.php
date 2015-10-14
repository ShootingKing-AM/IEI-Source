<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?php 
	include_once("db.php"); 

	$time = time();
	$length = 10;

	$code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);	
	$sql = "SELECT * FROM clients WHERE Code='$code'";
	$res = mysqli_query($conn, $sql);
	while( mysqli_num_rows($res) != 0 )
	{
		$code = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		$sql = "SELECT * FROM clients WHERE Code='$code'";
		$res = mysqli_query($conn, $sql);
	}
	
	$user = htmlspecialchars($_POST['n']);
	$pass = htmlspecialchars($_POST['pass']);
	$em = htmlspecialchars($_POST['em']);
	
	$sql = "CREATE TABLE IF NOT EXISTS clients ( ID INT NOT NULL AUTO_INCREMENT, Code TEXT, Email TEXT, FullName TEXT, UserName TEXT, Password TEXT, Mobile TEXT, Branch TEXT, Amnt TEXT, Joinfest TEXT, Report TEXT, Message TEXT, IsAdmin TEXT, Doe TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	
	$sql = "INSERT into clients (`Code`, `UserName`, `Password`, `Email`, `Doe`) VALUES ('$code', '$user', '".md5(md5($pass))."', '$em', '$time')";
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