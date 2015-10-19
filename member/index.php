<?php
	session_start();
	if(!isset($_SESSION['userName'])) { ?>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" type="image/x-icon" href="../assets/favicon.ico">
    <title>IEI~Client</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/box.css">	
<!--Icon Fonts-->
<link rel="stylesheet" media="screen" href="assets/css/font-awesome.css" />

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="assets/css/animate.css" rel="stylesheet">
</head>
<body style="background: Url(assets/img/gear.gif);color: #fff;max-width: 100%;height: 100%;">
<style>
/* Fixed navbar */
body {
    padding-top: 90px;
}
/* General sizing */
ul.dropdown-lr {
  width: 300px;
}

/* mobile fix */
@media (max-width: 768px) {
	.dropdown-lr h3 {
		color: #eee;
	}
	.dropdown-lr label {
		color: #eee;
	}
}

</style>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    	<div class="container-fluid">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
				<a class="navbar-brand" href="../index.php">I.E.I</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="../index.php">Home</a></li>
					<li><a href="../index.php#about">About</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Register <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-lr animated flipInX" role="menu">
                            <div class="col-lg-12">
								<script src="assets/js/validatesignup.js" type="text/javascript"></script>
                                <div class="text-center"><h3><b>Register</b></h3></div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#n').keyup(function(){
			var username = $(this).val();
			var Result = $('#result');
			if(username.length > 2) 
			{
				Result.html('Loading...');
				var dataPass = 'action=availability&username='+username;
				
				$.ajax({
					type : 'POST',
					data : dataPass,
					url  : 'functions/available.php',
					success: function(responseText){
						if(responseText == 0){
							Result.html('<span class="success">Available</span>');
							$('#register-submit').prop('disabled', false);
						}
						else if(responseText > 0){
							Result.html('<span class="error">This username is already taken.</span>');
							$('#register-submit').prop('disabled', true);
						}
					}
				});
			}
			else
			{
				Result.html('');
			}
		});
		
		$('#em').keyup(function(){
			var email = $(this).val();
			var Result = $('#result1');
			if(email.length > 2) 
			{
				Result.html('Loading...');
				var dataPass = 'action=availability&email='+email;
				$.ajax({
					type : 'POST',
					data : dataPass,
					url  : 'functions/available.php',
					success: function(responseText){
						if(responseText == 0){
							Result.html('<span class="success">You are welcome please go on.</span>');
							$('#register-submit').prop('disabled', false);
						}
						else if(responseText > 0){
							Result.html('<span class="error">This email allready exists.</span>');
							$('#register-submit').prop('disabled', true);
						}
					}
				});
			}
			else
			{
				Result.html('');
			}
			
		});
		
		$('#m').keyup(function(){
			var mobile = $(this).val();
			var Result = $('#result2');
			if(mobile.length > 2) 
			{
				Result.html('Loading...');
				var dataPass = 'action=availability&mobile='+mobile;
				$.ajax({
					type : 'POST',
					data : dataPass,
					url  : 'functions/available.php',
					success: function(responseText){
						if(responseText == 0){
							Result.html('<span class="success">You are welcome please go on.</span>');
							$('#register-submit').prop('disabled', false);
						}
						else if(responseText > 0){
							Result.html('<span class="error">This number allready exists.</span>');
							$('#register-submit').prop('disabled', true);
						}
					}
				});
			}
			else
			{
				Result.html('');
			}
		});
	});
</script>
    <style type="text/css">
        .success
        {
            color: green;
        }
        .error
        {
            color: red;
        }
        .content
        {
            width:900px;
            margin:0 auto;
        }
        #username
        {
            width:500px;
            border:solid 1px #000;
            padding:10px;
            font-size:14px;
        }
</style>

								<form id="signup" name="signup" action="functions/signup.php"  onsubmit="return validateForm();" method="post" role="form" autocomplete="off">
									<div class="form-group">
										<input type="text" name="n" id="n" tabindex="1" class="form-control" placeholder="Username" value=""><div class="content"><div class="result" id="result"></div></div>
									</div>
									<div class="form-group">
										<input type="text" name="fn" id="fn" tabindex="1" class="form-control" placeholder="Full Name" value="">
									</div>
									<div class="form-group">
										<input type="email" name="em" id="em" tabindex="1" class="form-control" placeholder="Email Address" value=""><div class="content"><div class="result" id="result1"></div></div>
									</div>
									<div class="form-group">
										<input type="number" name="m" id="m" tabindex="1" class="form-control" placeholder="Mobile" value=""><div class="content"><div class="result" id="result2"></div></div>
									</div>
									<div class="form-group">
										<input type="password" name="pass" id="pass" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-pass" id="confirm-pass" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group"><div class="alert-box error" id="uerror" style="width:75%"></div></div>
									<div class="form-group"><div class="alert-box error" id="eerror" style="width:75%"></div></div>
									<div class="form-group"><div class="alert-box error" id="perror" style="width:75%"></div></div>
									<div class="form-group">
										<div class="row">
											<div class="col-xs-6 col-xs-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-info" value="Register Now">
											</div>
										</div>
									</div>
                                    <input type="hidden" class="hide" name="token" id="token" value="7c6f19960d63f53fcd05c3e0cbc434c0">
								</form>
                            </div>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Log In <span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-lr animated slideInRight" role="menu">
                            <div class="col-lg-12">
							<script src="assets/js/validatesignin.js" type="text/javascript"></script>
                                <div class="text-center"><h3><b>Log In</b></h3></div>
                                <form id="signin" name="signin" action="functions/signin.php"  onsubmit="return validateForm1();" method="post" role="form" autocomplete="off">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Username" value="" autocomplete="off">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="pwd" id="pwd" tabindex="2" class="form-control" placeholder="Password" autocomplete="off">
                                    </div>
                                    <div class="form-group"><div class="alert-box errorl" id="luerror" style="width:75%"></div></div>
									<div class="form-group"><div class="alert-box errorl" id="lperror" style="width:75%"></div></div>

                                    <div class="form-group">
                                        <div class="row">
                                    <div class="form-group"><div class="alert-box error" id="luerror" style="width:75%"></div></div>
									<div class="form-group"><div class="alert-box error" id="lperror" style="width:75%"></div></div>
                                            <div class="col-xs-5 pull-right">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Log In">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="forgot.php" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </ul>
                    </li>
                </ul>
			</div>
		</div>
	</nav>
    
<div class="container text-center">
    <div class="jumbotron" style="color: black;">
       <h1>Please Login/Signup to get your details on <strong>I.E.I</strong></h1>
    </div>
</div>

<div class="container text-center">
    <div class="row">
       <p>&copy; IEI <?php echo Date('Y');?> All right reserved. Design & Developed by <a href="http://ieiscgitam.in">Rohith Vegesna ~ IEI Dev Team <i class="fa fa-heart"></i></a></p>
    </div>
</div>
</body>
</html>
<?php } else { echo header('Location: index1.php');}
?>