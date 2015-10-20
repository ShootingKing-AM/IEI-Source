<?php
	date_default_timezone_set('Asia/Kolkata');
	include_once '../db.php';
	session_start();
	if( isset($_GET['n']) )
	{
		$sql = "SELECT * FROM chat WHERE UserName != '".$_SESSION['userName']."' AND Doe > '".$_SESSION['LoadedChat']."'";
		$res = mysqli_query( $db, $sql );
		
		if( !is_bool($res) )
		{
			while($array = mysqli_fetch_array($res))
			{
				$time = gmdate("d-m-Y\ H:i:s", $array['Doe']);
				echo '<div class="row">'.
							'<div class="col-sm-4"><div class="btn btn-success">'.$array['UserName'].'</div></div>'.
							'<div class="col-sm-4"><div>'.$array['Chat'].'</div></div>'.
							'<div class="col-sm-4"><div class="btn btn-info">'.$time.'</div></div>'.
							'</div><hr>';
			}
		}
	}
	else
	{		
		$sql = 'SELECT * FROM chat ORDER BY Doe asc';
		$res = mysqli_query( $db, $sql );
		
		if( !is_bool($res) )
		{
			while($array = mysqli_fetch_array($res))
			{
				$time = gmdate("d-m-Y\ H:i:s", $array['Doe']);
				echo '<div class="row">'.
							'<div class="col-sm-4"><div class="btn btn-success">'.$array['UserName'].'</div></div>'.
							'<div class="col-sm-4"><div>'.$array['Chat'].'</div></div>'.
							'<div class="col-sm-4"><div class="btn btn-info">'.$time.'</div></div>'.
							'</div><hr>';
			}
		}
	}
	$_SESSION['LoadedChat'] = time();