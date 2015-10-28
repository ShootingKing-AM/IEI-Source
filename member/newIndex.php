<!DOCTYPE html>
<html lang="en">
<head>
	<title>IEI ~ Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,700,500' rel='stylesheet' type='text/css'>
</head>

<body>
<style>
	html
	{
		height:100%;
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
		margin: 4em 1em 1em;
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

	<div class="container jumbotron" style="background:transparent;max-width:50%;">
		<h2>Login \ SignUp</h2>
		<span class="input input">
			<input class="input__field input__field input--filled" type="text" id="input-1" />
			<label class="input__label input__label" for="input-1" >
				<span class="input__label-content input__label-content">First Name</span>
			</label>
		</span><br/>
		<span class="input input">
			<input class="input__field input__field" type="text" id="input-2" />
			<label class="input__label input__label" for="input-2">
				<span class="input__label-content input__label-content">Last Name</span>
			</label>
		</span><br/>
		<span class="input input">
			<input class="input__field input__field" type="text" id="input-3" />
			<label class="input__label input__label" for="input-3">
				<span class="input__label-content input__label-content">Email</span>
			</label>
		</span><br/>
	</div>

</body>
</html>