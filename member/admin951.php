<!-- /. NAV SIDE  -->
        <div id="page-wrapper">
           <div id="page-inner">
			<div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <div class="text-center"><h1><font class="text-danger">T</font><font class="text-warning">e</font><font class="text-info">c</font><font class="text-success">h</font> <font class="text-primary">R</font><font class="text-danger">e</font><font class="text-warning">n</font><font class="text-info">d</font><font class="text-success">e</font><font class="text-primary">z</font><font class="text-danger">v</font><font class="text-warning">o</font><font class="text-info">u</font><font class="text-success">s</font> ~ <kbd><?php echo Date('Y');?></kbd></h1></div>
						<div class="text-center"><h3>fuck you...</h3></div>
                        <p class="text-center">This is admin pannel you are the king.</p>
                    </div>
                </div>
			<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Members
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Full Name</th>
                                            <th>User</th>
                                            <th>Branch</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Message</th>
                                            <th>Admin</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										require 'db.php';
										$sql = 'SELECT * FROM clients';
										$res = mysqli_query( $db, $sql );
										
										while($array = mysqli_fetch_array($res))
										{
											echo '<td>'.$array['Code'].'</td>'.
                                            '<td>'.$array['FullName'].'</td>'.
                                            '<td>'.$array['UserName'].'</td>'.
                                            '<td>'.$array['Branch'].'</td>'.
                                            '<td>'.$array['Email'].'</td>'.
                                            '<td class="center">'.$array['Mobile'].'</td>'.
                                            '<td class="center">'.$array['Message'].'</td>'.
                                            '<td class="center">'.$array['IsAdmin'].'</td>'.
                                            '<td class="center">'.$array['Amnt'].'</td>'.
											'</tr>';}?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
			
			<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Tickets
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Ticket</th>
                                            <th>Full Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php/*
										require 'db.php';
										$sql = 'SELECT * FROM ticket WHERE UserName='$_SESSION['userName'];
										$res = mysqli_query( $db, $sql );
										
										while($array = mysqli_fetch_array($res))
										{
											echo '<td>'.$array['Ticket'].'</td>'.
                                            '<td>'.$array['FullName'].'</td>'.
											'</tr>';}*/?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

				<div class="col-md-12">
					<div class="jumbotron">
						<div class="text-center"><h2>DataBase Editor</h2></div>
						<p class="text-center">Please donot touch this if you don't have an Idea of editing DataBase. Call to 9640230600 in case of error or details.</p>
						<p class="text-center">
								<form data-toggle="validator" action="updateclient.php" method="post" role="form">
								  <div class="form-group">
									<label for="inputName" class="control-label">Code of Candidate</label>
									<input type="text" class="form-control" id="inputName" name="code" placeholder="Code" required>
								  </div>
								  <div class="form-group">
									<label for="inputName" class="control-label">Message</label>
									<input type="text" class="form-control" id="inputName" name="msg" placeholder="Message">
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
						</p>
					</div>
				<div class="col-md-12">
					<div class="jumbotron">
						<div class="text-center"><h2>Barcode Scaner</h2></div>
						<p class="text-center">Download the barcode scanner from bottom Go to settings => custom url => enter this code (ieiscgitam.in/check.php?code=) =>press ok => scan barcode => Press custom URL =>get details.</p>
						<p class="text-center">
							<a href="https://play.google.com/store/apps/details?id=com.google.zxing.client.android" target="_blank" class="btn btn-primary btn-lg" role="button">Download App (0.8 MB)</a>
						</p>
					</div>
				</div>
				<div class="col-md-12">
					<div class="jumbotron">
						<div class="text-center"><h2>Get your ID card</h2></div>
						<p class="text-center">Any problem regarding membership card please report a problem or send us a mail to <a href="mailto:report@ieiscgitam.in" target="_blank">report@ieiscgitam.in</a> or you can call to our dev team : <a href="tel:9640230600" target="_blank">9640230600</p>
						<p class="text-center">
							<a href="id.php" class="btn btn-primary btn-lg" role="button">Get Your ID</a>
						</p>
					</div>
				</div>
				</div>
            </div>
                <!-- /. ROW  -->
				<footer><p>© IEI <?php echo Date('Y');?> All right reserved. Design & Developed by <a href="http://ieiscgitam.in">Rohith Vegesna ~ IEI Dev Team <i class="fa fa-heart"></i></a></p></footer>
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
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	<!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>