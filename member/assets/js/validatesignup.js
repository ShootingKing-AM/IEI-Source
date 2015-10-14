$(function()
{	
	$('.error').hide();
});
	

function validateForm() {
	
	$('.error').hide();
	
	
    var w = document.forms["signup"]["n"].value;
    if(w == null || w == '' || (w.length < 6)) 
	{
		$('#uerror').text("UserName must be filled out and must atleast contain 6 characters.");
		$('#uerror').fadeIn(500);
        return false;
    }

	var x = document.forms["signup"]["em"].value;
    if(x == null || x == '' || !validateEmail(x)) 
	{
		$('#eerror').text("Email must be filled out and must be a valid email.");
		$('#eerror').fadeIn(500);
        return false;
    }

	var pass1 = document.getElementById("pass").value;
    var pass2 = document.getElementById("confirm-pass").value;
    if (pass1 != pass2 || pass1 == '' || pass2 == '' || (pass1.length < 6)) 
	{
		$('#perror').text("Your passwords donot match or Your password is less than 6 letters.");
		$('#perror').fadeIn(500);
        return false;
	}

}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
