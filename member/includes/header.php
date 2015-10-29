<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" type="image/x-icon" href="../assets/favicon.ico">
    <title>IEI ~ <?php echo $_SESSION['PageTitle']; ?></title>
	
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
</head>
<body>
    <div id="wrapper">
        <?php include "includes/nav.php";?>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a <?php if($_SESSION['PageTitle'] == 'Dashboard') echo 'class="active-menu"'; ?> href="index1.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a <?php if($_SESSION['PageTitle'] == 'Group Chat') echo 'class="active-menu"'; ?>href="grpchat.php"><i class="fa fa-comment"></i> Chat</a>
                    </li>
                    <li>
                        <a <?php if($_SESSION['PageTitle'] == 'Activity Center') echo 'class="active-menu"'; ?>href="blog.php"><i class="fa fa-bullhorn"></i> Activity Center</a>
                    </li>
                    <li>
                        <a <?php if($_SESSION['PageTitle'] == 'Profile') echo 'class="active-menu"'; ?>href="profile.php"><i class="fa fa-desktop"></i> Profile</a>
                    </li>
					<li>
                        <a <?php if($_SESSION['PageTitle'] == 'ID') echo 'class="active-menu"'; ?>href="id.php"><i class="fa fa-bar-chart-o"></i> I.D Card</a>
                    </li>
                    <li>
                        <a href="functions/logout.php"><i class="fa fa-qrcode"></i> Logout</a>
                    </li>
                    
                </ul>

            </div>

        </nav>