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
                        <a href="grpchat.php"><i class="fa fa-comment"></i> Chat</a>
                    </li>
                    <li>
                        <a href="blog.php"><i class="fa fa-bullhorn"></i> Activity Center</a>
                    </li>
                    <li>
                        <a class="active-menu" href="profile.php"><i class="fa fa-desktop"></i> Profile</a>
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
			 <div class="jumbotron row">
                    <div class="col-md-12">
                        <div class="text-left">
                            <h2>Profile <small>(can be edited)</small></h2>
                        </div><br/>
						<div class="row">
						<form data-toggle="validator" action="functions/proupdate.php" method="post" role="form">
						  <div class="form-group">
						<?php
							include 'db.php';
							$sql = 'SELECT * FROM clients WHERE ID='.$_SESSION['userID'];
							$res = mysqli_query( $db, $sql );
							$array = mysqli_fetch_array($res);
						?>
								<span class="help-block with-errors">This profile belongs to <mark><strong><?php echo $array['Code'];?></strong></mark> - <font style="text-transform:uppercase;"><?php echo $array['FullName'];?></font>. And you have joined I.E.I on - <?php echo gmdate("d-m-Y\ H:i:s", $array['Doe']);?></span>
							<label for="inputName" class="control-label">Username</label>
							<input type="text" class="form-control" id="inputName" name="n" placeholder="Try to use shortnames it will be easy for you to login" required>
						  </div>
						  <div class="form-group">
						   <label for="inputName" class="control-label">Full Name</label>
							<input type="text" class="form-control" id="inputName" name="fn" placeholder="Type In Your Full Name With Initial" style='text-transform:uppercase' required>
						  </div>
						  <div class="form-group">
							<label for="inputName" class="control-label">Branch</label>
							<input type="text" class="form-control" id="inputName" name="br" placeholder="<?php echo $array['Branch'];?>" required>
						  <div class="help-block with-errors"></div>
							<span class="help-block with-errors">Note : Your details are not being shared to anyone including web admin.</span>
						  </div>
						  <div class="form-group">
							<label for="Mobile" class="control-label">Mobile</label>
							<input type="number" class="form-control" id="number" name="m" placeholder="Mobile - <?php echo $array['Mobile'];?>" data-error="Bruh, that email address is invalid" required>
							<div class="help-block with-errors"></div>
						  </div>
						  <div class="form-group">
							<div class="form-group col-sm-6">
							  <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="pass" placeholder="Password" required>
							  <span class="help-block">Minimum of 6 characters</span>
							</div>
							<div class="form-group col-sm-6">
							  <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm Password" required>
							  <div class="help-block with-errors"></div>
							</div>
						</div>
						</div>
					  <div class="form-group">
						<div class="checkbox">
						  <label>
							<input type="checkbox" id="terms" data-error="Before you wreck yourself" required>
							Accept Terms & Conditions.
						  </label>
						  <div class="help-block with-errors"></div>
						</div>
					  </div>
					  <div class="form-group">
						<button type="submit" class="btn btn-primary">Submit</button>
					  </div>
					</form>
				</div>
                </div> 
				 <footer><p>© IEI <?php echo Date('Y');?> All right reserved. Design & Developed by <a href="http://ieiscgitam.in">IEI Dev Team <i class="fa fa-heart"></i></a></p></footer>
			</div>
        </div>
    </div>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/custom-scripts.js"></script>  
</body>
</html>
