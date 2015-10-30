$(function()
{	
	$('.errorl').hide();
});
	

function validateForm1() {
	
	$('.errorl').hide();
		
    var w = document.forms["signin"]["name"].value;
    if(w == null || w == '' || (w.length < 6)) 
	{
		$('#luerror').text("Incomplete username.");
		$('#luerror').fadeIn(500);
        return false;
    }

	var pass = document.forms["signin"]["pwd"].value;
    if (pass == '' || (pass.length < 6)) 
	{
		$('#lperror').text("Incorrect password.");
		$('#lperror').fadeIn(500);
        return false;
	}
}
