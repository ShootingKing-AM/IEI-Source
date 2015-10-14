<html>
<body>
<?php 

error_reporting(0);

	include_once("member/db.php"); 

	$code = $_GET["code"];
	
	$sql = "SELECT FullName, Branch, Amnt, IsAdmin FROM clients";
	$qury = mysqli_query($conn, $sql);
	$array = mysqli_fetch_array($qury);

		echo '<div style="text-align: center;font-weight: bold;">Name:<div style="text-transform:uppercase;font-size: 80px;">'.$array['FullName'].'</div><br/>'.
		'Branch:<div style="text-transform:capitalize;font-size: 50;">'.$array['Branch'].'</div><br/>'.
		'EB Member:<div style="text-transform:capitalize;font-size: 50;">'.$array['IsAdmin'].'</div><br/>'.
		'Amount:<div style="text-transform:uppercase;font-size: 100px;">'.$array['Amnt'].'</div><br/></div>';
?>

</body>
</html>