<?php
	session_start();
	if(!isset($_SESSION['userName'])) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>IEI ~ Login</title>
	<link rel="shortcut icon" type="image/x-icon" href="../assets/favicon.ico">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/css/box.css">
	<link href="assets/css/animate.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,700,500' rel='stylesheet' type='text/css'>
	<script src="assets/js/validatesignin.js" type="text/javascript"></script>
	<script src="assets/js/validatesignup.js" type="text/javascript"></script>
</head>

<body>
<style>
	ul.dropdown-lr {
	  width: 300px;
	}

	@media (max-width: 768px) {
		.dropdown-lr h3 {
			color: #eee;
		}
		.dropdown-lr label {
			color: #eee;
		}
	}
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
<style>
	html
	{
		/* height:100%; */
	}
	body
	{
	    width: 100%;
		background-image: linear-gradient(white 60%, rgba(255, 255, 255, 0.6));
		height: 100%;
		transition: all 1s;
		font-family: 'Raleway', sans-serif;
		font-weight:400;
	}
	.input {
		position: relative;
		z-index: 1;
		display: inline-block;
		margin: 1em;
		max-width: 350px;
		width: calc(100% - 2em);
		vertical-align: top;
	}

	.input__field {
		position: relative;
		display: block;
		float: right;
		padding: 0.8em;
		width: 60%;
		border: none;
		border-radius: 0;
		background: #f0f0f0;
		color: #aaa;
		font-weight: bold;
		-webkit-appearance: none; /* for box shadows to show on iOS */
	}

	.input__field:focus {
		outline: none;
	}

	.input__label {
		display: inline-block;
		float: right;
		padding: 0 1em;
		width: 40%;
		color: #000000;
		font-weight: bold;
		font-size: 80.25%;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}

	.input__label-content {
		position: relative;
		display: block;
		padding: 1.6em 0;
		width: 100%;
	}

	.graphic {
		position: absolute;
		top: 0;
		left: 0;
		fill: none;
	}

	.icon {
		color: #ddd;
		font-size: 150%;
	}

	.input {
		margin: 3em 1em 1em;
	}

	.input__field {
		padding: 0.4em 0.25em;
		width: 100%;
		background: transparent;
		color: #000000;
		font-size: 1.55em;
	}

	.input__label {
		position: absolute;
		width: 100%;
		text-align: left;
		pointer-events: none;
	}

	.input__label-content {
		-webkit-transition: -webkit-transform 0.3s;
		transition: transform 0.3s;
	}

	.input__label::before,
	.input__label::after {
		content: '';
		position: absolute;
		left: 0;
		z-index: -1;
		width: 100%;
		height: 4px;
		background: #91A2B5;
		-webkit-transition: -webkit-transform 0.3s;
		transition: transform 0.3s;
	}

	.input__label::before {
		top: 0;
	}

	.input__label::after {
		bottom: 0;
	}

	.input__field:focus + .input__label .input__label-content,
	.input--filled .input__label-content {
		-webkit-transform: translate3d(0, -90%, 0);
		transform: translate3d(0, -90%, 0);
	}

	.input__field:focus + .input__label::before,
	.input--filled .input__label::before {
		-webkit-transform: translate3d(0, -0.5em, 0);
		transform: translate3d(0, -0.5em, 0);
	}

	.input__field:focus + .input__label::after,
	.input--filled .input__label::after {
		-webkit-transform: translate3d(0, 0.5em, 0);
		transform: translate3d(0, 0.5em, 0);
	}
</style>
<script>
	$(function(){
		
		function changeBg()
		{
			$('body').css('background-color', 'rgb('+Math.floor((Math.random() * 255))+','+Math.floor((Math.random() * 255))+','+Math.floor((Math.random() * 255))+')');
			$('body').css('background-image', 'linear-gradient(white '+Math.floor(Math.random()*(80-40+1)+40)+'%, rgba(255, 255, 255, 0.6))');
		}
		setInterval( function() { changeBg() }, 3000 );
		
		$('input').change(function(){
			var valu = $(this).val();
			var labelname = $(this).attr('id');
			
			$('label').each(function(){
				if( $(this).attr('for') == labelname )
				{
					if( valu.length > 1 )
					{
						$(this).addClass( 'input--filled' );
					}
					else
					{
						$(this).removeClass( 'input--filled' );
					}						
				}
			});
		});
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#input-1').keyup(function(){
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
		
		$('#input-3').keyup(function(){
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
		
		$('#input-4').keyup(function(){
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

	<div class="container jumbotron" style="background:transparent;max-width:100%;">
		<div class="row">
		  <div class="col-sm-4">
			<h2>SignUp</h2>
			<form id="signup" name="signup" action="functions/signup.php"  onsubmit="return validateForm();" method="post" role="form" autocomplete="off">
			<span class="input input">
				<input class="input__field input__field input--filled" type="text" name="n" id="input-1" autocomplete="off" />
				<label class="input__label input__label" for="input-1" >
					<span class="input__label-content input__label-content">Username</span><div class="content"><div class="result" id="result"></div></div>
				</label>
			</span><br/>
			<span class="input input">
				<input class="input__field input__field" type="text" name="fn" id="input-2" autocomplete="off" />
				<label class="input__label input__label" for="input-2">
					<span class="input__label-content input__label-content">Full Name</span>
				</label>
			</span><br/>
			<span class="input input">
				<input class="input__field input__field" type="text" name="em" id="input-3" autocomplete="off" />
				<label class="input__label input__label" for="input-3">
					<span class="input__label-content input__label-content">Email</span><div class="content"><div class="result" id="result1"></div></div>
				</label>
			</span><br/>
			<span class="input input">
				<input class="input__field input__field" type="text" name="m" id="input-4" autocomplete="off" />
				<label class="input__label input__label" for="input-4">
					<span class="input__label-content input__label-content">Mobile</span><div class="content"><div class="result" id="result2"></div></div>
				</label>
			</span><br/>
			<span class="input input">
				<input class="input__field input__field" type="text" name="pass" id="input-5" autocomplete="off" />
				<label class="input__label input__label" for="input-5">
					<span class="input__label-content input__label-content">Password</span>
				</label>
			</span><br/>
			<span class="input input">
				<input class="input__field input__field" type="text" name="confirm-pass" id="input-6" autocomplete="off" />
				<label class="input__label input__label" for="input-6">
					<span class="input__label-content input__label-content">Conform Password</span>
				</label>
			</span><br/>
				<div class="form-group"><div class="alert-box error" id="uerror" style="width:75%"></div></div>
				<div class="form-group"><div class="alert-box error" id="eerror" style="width:75%"></div></div>
				<div class="form-group"><div class="alert-box error" id="perror" style="width:75%"></div></div>
				<div class="form-group"><div class="alert-box error" id="merror" style="width:75%"></div></div>
			<span class="input input">
				<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-info" value="Register Now">
			</span><br/></div>
			  <div class="col-sm-4">
				<h2>Login</h2>
				<form id="signin" name="signin" action="functions/signin.php"  onsubmit="return validateForm1();" method="post" role="form" autocomplete="off">
					<span class="input input">
						<input class="input__field input__field input--filled" type="text" id="input-7" name="name"  autocomplete="off" />
						<label class="input__label input__label" for="input-7" >
							<span class="input__label-content input__label-content">Username</span>
						</label>
					</span><br/>
					<span class="input input">
						<input class="input__field input__field" type="Password" id="input-8" name="pwd"  autocomplete="off" />
						<label class="input__label input__label" for="input-8">
							<span class="input__label-content input__label-content">Password</span>
						</label>
					</span><br/>
					<span class="input input">
						<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-success" value="Log In">
					</span>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
<?php } else { echo header('Location: index1.php');}
?>