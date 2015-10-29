<?php
	include_once 'functions/sessionvalidator.php';
	
	$_SESSION['PageTitle'] = 'Dashboard';
	include_once './header.php';
	
	if( $_SESSION['IsAdmin'] )
	{
		$_SESSION['IncludeAdmin'] = true;
		include 'admin951.php';
	}
	else
	{
		$_SESSION['IncludeClient'] = true;
		include 'client.php';
	}
	include './footer.php';