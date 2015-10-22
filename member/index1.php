<?php
	include_once 'functions/sessionvalidator.php';
	
	$_SESSION['PageTitle'] = 'Dashboard';
	include_once './header.php';
	
	if( $_SESSION['IsAdmin'] )
	{
		include 'admin951.php';
	}
	else
	{
		include 'client.php';
	}
	include './footer.php';