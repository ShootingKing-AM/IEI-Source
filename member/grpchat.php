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
	$_SESSION['LoadedChat'] = 0;
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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

	$(function(){
		$("#chat").load("functions/loadchat.php");		
		$('#chat').animate({ scrollTop: $('#chat')[0].scrollHeight}, 700);
		
		function loadNowPlaying()
		{
			$.ajax({
				type: "GET",
				url: "functions/loadchat.php",
				data: "n=1",
				success: function(data){
					data.trim();
					$('#chat').append(data);					
					$('#chat').animate({ scrollTop: $('#chat')[0].scrollHeight}, 700);
				}
			});
			// $("#chat").load("functions/loadchat.php?n=1");
		}
		setInterval(function(){loadNowPlaying()}, 2000);
		
		$(".submit").click(function() {
			var msg = $("#msg").val();
			var dataString = 'msg='+ msg;

			if(msg=='')
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
						$('#msg').val('');
						var d = new Date();
						
						$('#chat').append('<div class="row">'+
							'<div class="col-sm-4"><div class="btn btn-warning">You</div></div>'+
							'<div class="col-sm-4"><div>'+msg+'</div></div>'+
							'<div class="col-sm-4"><div class="btn btn-info">'
							+(d.getHours()<10?'0':'')+d.getHours()+':'
							+(d.getMinutes()<10?'0':'')+d.getMinutes()+':'
							+(d.getSeconds()<10?'0':'')+d.getSeconds()+'</div></div>'+
							'</div><hr>');						
						$('#chat').animate({ scrollTop: $('#chat')[0].scrollHeight}, 700);
					}
				});
			}
			return false;
		});
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
								<input class="form-control" id="msg" name="msg" type="text" />
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
