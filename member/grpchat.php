<?php
	include_once 'functions/sessionvalidator.php';
	$_SESSION['LoadedChat'] = 0;
	
	$_SESSION['PageTitle'] = 'Group Chat';
	include_once './includes/header.php';
?>	
		<div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <?php include './includes/title.php'; ?>
                    </div>
                </div>
<script>

	$(function(){
		$("#chat").load("functions/loadchat.php");		
		$('#chat').animate({ scrollTop: $('#chat')[0].scrollHeight}, 700);
		
		function loadNowPlaying()
		{
			$.ajax({
				type: "GET",
				url: "functions/loadchat.php",
				data: "n=1",
				success: function(data){
					data.trim();
					$('#chat').append(data);					
					$('#chat').animate({ scrollTop: $('#chat')[0].scrollHeight}, 700);
				}
			});
			// $("#chat").load("functions/loadchat.php?n=1");
		}
		setInterval(function(){loadNowPlaying()}, 2000);
		
		$(".submit").click(function() {
			var msg = $("#msg").val();
			var dataString = 'msg='+ msg;

			if(msg=='')
			{
				$('.error').fadeOut(200).show();
			}
			else
			{
				$.ajax({
					type: "POST",
					url: "functions/chat.php",
					data: dataString,
					success: function(){
						$('#msg').val('');
						var d = new Date();
						
						$('#chat').append('<div class="row">'+
							'<div class="col-sm-4"><div class="btn btn-warning">You</div></div>'+
							'<div class="col-sm-4"><div>'+msg+'</div></div>'+
							'<div class="col-sm-4"><div class="btn btn-info">'
							+(d.getHours()<10?'0':'')+d.getHours()+':'
							+(d.getMinutes()<10?'0':'')+d.getMinutes()+':'
							+(d.getSeconds()<10?'0':'')+d.getSeconds()+'</div></div>'+
							'</div><hr>');						
						$('#chat').animate({ scrollTop: $('#chat')[0].scrollHeight}, 700);
					}
				});
			}
			return false;
		});
	});
	
</script>

                <div class="col-md-12">
                    <div class="jumbotron">
                        <div class="text-center">
							<div class="well" id="chat" style="height: 400px !important;overflow: scroll"></div>
						</div>
						<form name="form" method="post" role="form">
							<div class="form-group">
								<label for="inputName" class="control-label">Type Here...</label>
								<input class="form-control" id="msg" name="msg" type="text" />
							</div>
							<span class="error" style="display:none"> Please Enter Something</span>
							<div class="form-group">
								<input type="submit" value="Submit" class="btn btn-primary submit"/>
							</div>
						</form>
						</div>
                </div>
		</div>
		<?php include './includes/footer.php'; ?>
