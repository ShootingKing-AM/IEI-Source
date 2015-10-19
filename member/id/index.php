<?php
	 session_start();
	if( !isset($_SESSION['userName']) )
	{
		die("<h1>404 Error</h1><h2> Access Denied</h2><h3><a href='../index.php'>Login/Signup</a></h3>");exit;
	}
	
	if( isset($_SESSION['userName']) && ( (time() - $_SESSION['time']) >= 60*60 ))
	{
		header('Location: ../functions/logout.php');
	}
	else
	{
		$_SESSION['time'] = time();
	}
		
?><!DOCTYPE html>
<html lang="en">
<!--[if IE 9]>  <html class="ie9" lang="en">    <![endif]-->
<!--[if IE 8]>  <html class="ie8" lang="en">    <![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>I.E.I~ID</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/flexslider.css" />
    <link rel="stylesheet" type="text/css" href="css/fancybox.css" />

    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.adipoli.min.js"></script>
    <script type="text/javascript" src="js/jquery.easytabs.min.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="js/jquery.hashchange.min.js"></script>
    <script type="text/javascript" src="js/jquery.infieldlabel.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/respond.min.js"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
</head>
    <body oncontextmenu="return false;">
        <div id="container">
            <div id="content">

                <div class="navigation">
                    <ul class="tabs">
                        <li><a href="#about" class="tab-about">I.D</a></li>
                    </ul>
                </div>
                <div id="about">

                    <div class="about-header">
                        <h3>Institute Of Engineers (INDIA)</h3>
                        <div class="separator"></div>
                    </div>
				<?php
					include '../db.php';
					$sql = 'SELECT * FROM clients WHERE ID='.$_SESSION['userID'];
					$res = mysqli_query( $db, $sql );
					$array = mysqli_fetch_array($res);
				?>
                    <div class="resume-wrapper">
                        <div class="resume">
                            <ul class="personal-info">
                                <li><label>Name</label><span style="text-transform:uppercase"><?php echo $array['FullName'];?></span></li>
                                <li><label>Branch</label><span style="text-transform: capitalize;"><?php echo $array['Branch'];?></span></li>
                                <li><label>Email</label><span><?php echo $array['Email'];?></span></li>
                                <li><label>Phone</label><span><?php echo $array['Mobile'];?></span></li>
                                <li><p><strong>NOTE :</strong> This is original ID card generated automatically You can print it or show it in your mobile directly. Please remember to tick background graphics on print page.</p></li>
                            </ul>
                            <div class="photo">
                                <img src="bar/index.php" alt="" />
                            </div>
                        </div>
                        <div class="separator"></div>
                    </div>

                </div>
                                        
            </div>
            <div class="footer">
<button onclick="window.print();">Print</button>

                <div class="copyright"><h5>Copyright © <?php echo Date('Y');?> Team - I.E.I</h5></div>
            </div>
            
        </div>

    </body>
    </html>