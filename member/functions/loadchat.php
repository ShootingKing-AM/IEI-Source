<?php
date_default_timezone_set('Asia/Kolkata');
	include_once '../db.php';
		$sql = 'SELECT * FROM chat ORDER BY Doe asc';
		$res = mysqli_query( $db, $sql );
		
		if( !is_bool($res) )
		{
			while($array = mysqli_fetch_array($res))
			{
				$time = gmdate("d-m-Y\ H:i:s\ ", $array['Doe']);
				echo $array['UserName'];
				echo $array['Chat'];
				echo $time.'<br />';
			}
		}
?>