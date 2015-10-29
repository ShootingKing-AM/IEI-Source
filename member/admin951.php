<?php
	if( !isset($_SESSION['IncludeAdmin']) )
	{
		header('Location: index.php');exit;
	}
	unset($_SESSION['IncludeAdmin']);
?>
        <div id="page-wrapper">
           <div id="page-inner">
			<div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">					
                        <?php include './title.php'; ?>
						<div class="text-center"><h3>Be Alert!!!!!!!!!!!</h3></div>
                        <p class="text-center">This is the ADMIN PANNEL you will be blamed for any mistake commited by you.Please read the given instructions before you do anything.</p>
                    </div>
                </div>
			<div class="row">
                <div class="col-md-12">
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
										include_once 'db.php';
										$sql = 'SELECT * FROM clients';
										$res = mysqli_query( $db, $sql );
										
										if( !is_bool($res) )
										{
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
												'</tr>';
											}
										}
									?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

			<?php
					$sql = "SELECT COUNT(*) FROM membcodes WHERE SoldToID IS NULL AND CreatorID='".$_SESSION['userID']."'";
					$res = mysqli_query( $db, $sql );
					if( !is_bool($res) )
					{
						$array = mysqli_fetch_array($res);
						if(intval($array[0])< 1)
						{
							echo'<div class="col-md-12">
									<div class="jumbotron">
										<div class="text-center"><h2>Generate Tickets</h2></div>
										<p class="text-center">Press this button only if you want to sell FEST tikets. You will be responsible for any scam caused by you after generating tickets.</p>
										<p class="text-center">
											<a href="functions/generatecodes.php" class="btn btn-danger btn-lg" role="button">Generate Tickets</a>
										</p>
									</div>
								</div>';
						}
					}
			?>
			
			<div class="row">
                <div class="col-md-12">
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
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
										$sql = "SELECT * FROM membcodes WHERE SoldToID IS NULL AND CreatorID='".$_SESSION['userID']."'";
										$res = mysqli_query( $db, $sql );
										if( !is_bool($res) )
										{
											while($array = mysqli_fetch_array($res))
											{
												echo '<td>'.$array['Code'].'</td>'.
												'<td><div class="text-center"><a href="functions/sold.php?sold='.$array['ID'].'"><button>Sold</button></a></div></td>'.
												'</tr>';
											}
										}
										else
											echo '<td> No Tickets </td><td></td>';
										mysqli_close($db);
									?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

				<div class="col-md-12">
					<div class="jumbotron">
						<div class="text-center"><h2>DataBase Editor</h2></div>
						<p class="text-center">Please donot touch this if you don't have an Idea of editing DataBase. Call to 9640230600 in case of error or details.</p>
						<p class="text-center">
								<form data-toggle="validator" action="functions/updateclient.php" method="post" role="form">
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
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
		</script>