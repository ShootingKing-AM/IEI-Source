<?php
	include_once '../db.php';
	
    if(isset($_POST['action']) && $_POST['action'] == 'availability')
    {
		$query = '';
		
		if( isset($_POST['username']) )
		{
			$query  = "SELECT COUNT(*) FROM clients WHERE UserName='".mysqli_real_escape_string($conn,$_POST['username'])."'";
		}
		else if( isset($_POST['email']) )
		{
			$query  = "SELECT COUNT(*) FROM clients WHERE Email='".mysqli_real_escape_string($conn,$_POST['email'])."'";
		}
		else if( isset($_POST['mobile']) )
		{
			$query  = "SELECT COUNT(*) FROM clients WHERE Mobile='".mysqli_real_escape_string($conn,$_POST['mobile'])."'";
		}
		
        $arry  = mysqli_fetch_array(mysqli_query($conn,$query));
        echo $arry['COUNT(*)'];
    }
?>