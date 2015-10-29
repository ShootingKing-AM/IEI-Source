<?php
	include_once 'functions/sessionvalidator.php';
	
	$_SESSION['PageTitle'] = 'ID';
	include_once './includes/header.php';
?>
        <div id="page-wrapper" >
            <div id="page-inner">
				<div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            ID card <small>or Membership card.</small>
                        </h1>
						<iframe src="id/index.php" style="width: 100%;height: 850px;border-style: solid;border-width: 5px;"></iframe>	
                    </div>
                </div> 
			<?php include './includes/footer.php'; ?>
