<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
 
	session_start();
	session_unset();
	session_destroy();
 
   	header('Location: ../index.php');