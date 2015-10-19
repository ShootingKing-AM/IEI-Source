<?php
	 session_start();
	if( !isset($_SESSION['userName']) )
	{
		die("<h1>404 Error</h1><h2> Access Denied</h2><h3><a href='index.php'>Login/Signup</a></h3>");exit;
	}
	
	if( isset($_SESSION['userName']) && ( (time() - $_SESSION['time']) >= 60*60 ))
	{
		header('Location: functions/logout.php');
	}
	else
	{
		$_SESSION['time'] = time();
	}
		
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" type="image/x-icon" href="../assets/favicon.ico">
    <title>IEI~Client</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <?php include "nav.php";?>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index1.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="active-menu" href="blog.php"><i class="fa fa-bullhorn"></i> Activity Center</a>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa fa-desktop"></i> Profile</a>
                    </li>
					<li>
                        <a href="id.php"><i class="fa fa-bar-chart-o"></i> I.D Card</a>
                    </li>
                    <li>
                        <a href="functions/logout.php"><i class="fa fa-qrcode"></i> Logout</a>
                    </li>
                    
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <div class="text-center"><h1><font class="text-danger">T</font><font class="text-warning">e</font><font class="text-info">c</font><font class="text-success">h</font> <font class="text-primary">R</font><font class="text-danger">e</font><font class="text-warning">n</font><font class="text-info">d</font><font class="text-success">e</font><font class="text-primary">z</font><font class="text-danger">v</font><font class="text-warning">o</font><font class="text-info">u</font><font class="text-success">s</font> ~ <kbd>Blog</kbd></h1></div>
						<div class="text-center"><h3>Keep your ideas out. <i class="fa fa-smile-o"></i></h3></div>
                        <p class="text-center">Let everyone know about your idea.</p>
                    </div>
                </div>
<script type="text/javascript"> 

function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 

document.onkeypress = stopRKey; 

</script>
                <div class="col-md-12">
					<form data-toggle="validator" action="functions/blogset.php" method="post" role="form">
					<div class="form-group">
					<label for="inputName" class="control-label">Heading</label>
					<input type="text" class="form-control" id="inputName" name="head" placeholder="Heading" required>
					</div>
					<div class="form-group">
					<label for="inputName" class="control-label">Matter</label>
					<textarea type="text" class="form-control" id="inputName" name="mat" placeholder="Details" required></textarea>
					</div>
					<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					</form>
                </div>
<?php
	require 'db.php';
	$sql = 'SELECT * FROM blog';
	$res = mysqli_query( $db, $sql );
	
	while($array = mysqli_fetch_array($res))
	{
		$time = gmdate("d-m-Y\ /H:i:s\ /Z", $array['Doe']);
		echo '<div class="col-md-12">'.
                    '<div class="jumbotron">'.
					'<div class="text-center"><strong><h2>'.$array['Heading'].'</h2></strong></div><br/><div class="col-sm-4">Posted by - '.$array['UserName'].' - AT - '.$time.'.</div><hr>'.
					'<p class="text-center">'.$array['Matter'].'</p>';
		if($_SESSION['userName'] == $array['UserName'])
					{
						echo '<div class="col-sm-4"><a href="functions/delete.php?id='.$array['ID'].'"><button type="button" class="btn btn-danger">Delete</button></a></div>';
					}
					echo	'</div></div></div>';}
?> 
                 <!-- /. ROW  -->
				 <footer><p>© IEI <?php echo Date('Y');?> All right reserved. EXCLUSIVELY Design & Developed by <a href="http://ieiscgitam.in">IEI Dev Team <i class="fa fa-heart"></i></a></p></footer>
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    
   
</body>
</html>
