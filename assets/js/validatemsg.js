$(function()
{	
	$('.error').hide();
});
	

function validateForm() {
	
	$('.error').hide();
	
	
    var w = document.forms["contact"]["name"].value;
    if(w == null || w == '' || (w.length < 6)) 
	{
		$('#uerror').text("UserName must be filled out and must atleast contain 6 characters.");
		$('#uerror').fadeIn(500);
        return false;
    }

	var x = document.forms["contact"]["email"].value;
    if(x == null || x == '' || !validateEmail(x)) 
	{
		$('#eerror').text("Email must be filled out and must be a valid email.");
		$('#eerror').fadeIn(500);
        return false;
    }

	var pass1 = document.getElementById("message").value;
    if (pass1 == '' || (pass1.length < 10)) 
	{
		$('#perror').text("You must enter atleast 10 letters.");
		$('#perror').fadeIn(500);
        return false;
	}

}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
