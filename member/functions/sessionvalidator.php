<?php 
// if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
	session_start();
	if( !isset($_SESSION['userName']) )
	{
		if( strpos(getcwd(), 'functions') !== false )
			header('Location: ../index.php');
		else			
			header('Location: index.php');
	}
	
	if( isset($_SESSION['userName']) && ( (time() - $_SESSION['time']) >= 60*60 ))
	{
		if( strpos(getcwd(), 'functions') !== false )
			header('Location: logout.php');
		else			
			header('Location: functions/logout.php');
	}
	else
	{
		$_SESSION['time'] = time();
	}