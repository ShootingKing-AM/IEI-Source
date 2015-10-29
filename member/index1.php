<?php
	include_once 'functions/sessionvalidator.php';
	
	$_SESSION['PageTitle'] = 'Dashboard';
	include_once './includes/header.php';
	
	if( $_SESSION['IsAdmin'] )
	{
		include 'includes/admin951.php';
	}
	else
	{
		include 'includes/client.php';
	}
	include './includes/footer.php';