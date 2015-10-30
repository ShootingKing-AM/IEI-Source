$(function()
{	
	$('.error1').hide();
});
	

function validateForm() {
	
	$('.error1').hide();
	
	
    var w = document.forms["signup"]["n"].value;
    if(w == null || w == '' || (w.length < 6)) 
	{
		$('#uerror').text("Atleast 6 characters.");
		$('#uerror').fadeIn(500);
        return false;
    }

	var x = document.forms["signup"]["em"].value;
    if(x == null || x == '' || !validateEmail(x)) 
	{
		$('#eerror').text("Not a valid email.");
		$('#eerror').fadeIn(500);
        return false;
    }

	var y = document.forms["signup"]["m"].value;
    if(y == null || y == '' || (y.length < 10)) 
	{
		$('#merror').text("Not a valid number.");
		$('#merror').fadeIn(500);
        return false;
    }

	var pass1 = document.forms["signup"]["pass"].value;
    var pass2 = document.forms["signup"]["confirm-pass"].value;
    if (pass1 != pass2 || pass1 == '' || pass2 == '' || (pass1.length < 6)) 
	{
		$('#perror').text("Passwords donot match");
		$('#perror').fadeIn(500);
        return false;
	}

}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
