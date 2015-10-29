<?php
	include_once 'functions/sessionvalidator.php';

	$_SESSION['PageTitle'] = 'Profile';
	include_once './includes/header.php';
?>
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
			<?php include './includes/footer.php'; ?>
