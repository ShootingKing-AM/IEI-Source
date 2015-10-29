<?php
	include_once 'functions/sessionvalidator.php';	
	
	$_SESSION['PageTitle'] = 'Activity Center';
	include_once './includes/header.php';
?>
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <?php include './includes/title.php'; ?>
						<div class="text-center"><h3>Keep your ideas out. <i class="fa fa-smile-o"></i></h3></div>
                        <p class="text-center">Let everyone know about your idea.</p>
                    </div>
                </div>
<script type="text/javascript"> 

function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 

document.onkeypress = stopRKey; 

</script>
                <div class="col-md-12">
					<form data-toggle="validator" action="functions/blogset.php" method="post" role="form">
					<div class="form-group">
					<label for="inputName" class="control-label">Heading</label>
					<input type="text" class="form-control" id="inputName" name="head" placeholder="Heading" required>
					</div>
					<div class="form-group">
					<label for="inputName" class="control-label">Matter</label>
					<textarea type="text" class="form-control" id="inputName" name="mat" placeholder="Details" required></textarea><?php include "includes/liveurl.php";?>
					</div>
					<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					</form>
                </div>
<?php
	include_once 'db.php';
	$sql = 'SELECT * FROM blog ORDER BY Doe desc';
	$res = mysqli_query( $db, $sql );
	
	if( !is_bool($res) )
	{
		while($array = mysqli_fetch_array($res))
		{
			$time = gmdate("d-m-Y\ H:i:s\ ", $array['Doe']);
			echo '<div class="col-md-12">'.
					'<div class="jumbotron">'.
						'<div class="text-center">'.
							'<strong><h2>'.$array['Heading'].'</h2></strong>'.
						'</div>'.
						'<div class="col-sm-12" style="color:grey">'.
							$array['UserName'].' <div class="label label-success">'.$time.'</div>'.
						'</div><br/><hr>'.
						'<p class="text-center">'.$array['Matter'].'</p>';
			if($_SESSION['userName'] == $array['UserName'])
			{
				echo '<div class="col-sm-4">'.
						'<a href="functions/delete.php?ID='.$array['ID'].'"><button type="button" class="btn btn-danger">Delete</button></a>'.
					 '</div>';
			}
			echo '</div></div>';
		}
	}
?> </div>
	<?php include './includes/footer.php'; ?>
