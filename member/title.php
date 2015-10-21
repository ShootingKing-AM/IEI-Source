<style>
						h1#mainHeading
						{
							transition: all 1s;
							padding: 10px;
						}
						.letters
						{
							transition: all 0.7s;
							border-bottom: 1px dotted;
							border-top: 1px dotted;
						}
					</style>
					<script>
					$(function(){
						var colorClasses = [
							"text-danger",
							"text-danger",
							"text-danger",
							"text-muted",
							"text-primary",
							"text-primary",
							"text-success",
							"text-success",
							"text-success",
							"text-info",
							"text-info",
							"text-warning",
							"text-warning"							
						];
						var content = $('#mainHeading').text();
						var strlen = content.length;
						var stext = '';
						for( var i = 0; i < content.length; i++ )
						{
							stext += '<font class="letters '+colorClasses[Math.floor((Math.random() * 13))]+'">'+content.charAt(i)+'</font>';
						}
						$('#mainHeading').html(stext);
						
						setInterval(function()
						{							
							$('#mainHeading').children().each(function() {
								$(this).attr('class', 'letters '+ colorClasses[Math.floor((Math.random() * 13))] );
							});
						}, 3000);
					});
					</script>
					<div class="text-center"><h1 id="mainHeading">Tech Rendezvous</h1><h1> <kbd> ~ <?php echo Date('Y');?></kbd></h1></div>
						