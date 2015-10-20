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
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <?php include "nav.php";?>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index1.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="active-menu" href="grpchat.php"><i class="fa fa-comment"></i> Chat</a>
                    </li>
                    <li>
                        <a href="blog.php"><i class="fa fa-bullhorn"></i> Activity Center</a>
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
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <div class="text-center"><h1><font class="text-danger">T</font><font class="text-warning">e</font><font class="text-info">c</font><font class="text-success">h</font> <font class="text-primary">R</font><font class="text-danger">e</font><font class="text-warning">n</font><font class="text-info">d</font><font class="text-success">e</font><font class="text-primary">z</font><font class="text-danger">v</font><font class="text-warning">o</font><font class="text-info">u</font><font class="text-success">s</font> ~ <kbd>Chat</kbd></h1></div>
                    </div>
                </div>
<script>
function loadNowPlaying(){
  $("#chat").load("functions/loadchat.php");
}
setInterval(function(){loadNowPlaying()}, 1000);
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js">
</script>
<script type="text/javascript" >
$(function() {
$(".submit").click(function() {
var name = $("#name").val();
var dataString = 'name='+ name;

if(name=='')
{
$('.error').fadeOut(200).show();
}
else
{
$.ajax({
type: "POST",
url: "functions/chat.php",
data: dataString,
success: function(){
$('#name').val('');
}
});
}
return false;
});
});
</script>
<script>
$('#chat').change(function() {
  $('#chat').animate({ scrollTop: $(document).height() }, 700);
});
</script>

                <div class="col-md-12">
                    <div class="jumbotron">
                        <div class="text-center">
							<div class="well" id="chat" style="height: 400px !important;overflow: scroll"></div>
						</div>
						<form name="form" method="post" role="form">
							<div class="form-group">
								<label for="inputName" class="control-label">Type Here...</label>
								<input class="form-control" id="name" name="name" type="text" />
							</div>
							<span class="error" style="display:none"> Please Enter Something</span>
							<div class="form-group">
								<input type="submit" value="Submit" class="btn btn-primary submit"/>
							</div>
						</form>
						</div>
                </div>
	</div>

				 <footer><p>© IEI <?php echo Date('Y');?> All right reserved. EXCLUSIVELY Design & Developed by <a href="http://ieiscgitam.in">IEI Dev Team <i class="fa fa-heart"></i></a></p></footer>
				</div>
            </div>
        </div>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/custom-scripts.js"></script>   
</body>
</html>
