$(function()
{	
	$('.errorl').hide();
});
	

function validateForm1() {
	
	$('.errorl').hide();
	
	
    var w = document.forms["signin"]["n"].value;
    if(w == null || w == '' || (w.length < 6)) 
	{
		$('#luerror').text("UserName must be filled out and must atleast contain 6 characters.");
		$('#luerror').fadeIn(500);
        return false;
    }

	var pass = document.getElementById("pwd").value;
    if (pass == '' || (pass.length < 6)) 
	{
		$('#lperror').text("Please enter the correct password.");
		$('#lperror').fadeIn(500);
        return false;
	}

}
