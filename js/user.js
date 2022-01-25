//function to handle login-form validation
function loginValidate(loginForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="click OK to continue";

if (loginForm.myusername.value=="")
	{
	errorMessage+="Email not filled!\n";
	validationVerified=false;
	}
if(loginForm.mypassword.value=="")
	{
	errorMessage+="Password not filled!\n";
	validationVerified=false;
	}
if (!isValidEmail(loginForm.myusername.value))
	{
	errorMessage+="Invalid email address provided!\n";
	validationVerified=false;
	}
if(!validationVerified)
	{
	alert(errorMessage);
	}
if(validationVerified)
	{
	validationVerified=true;
	}
return validationVerified;
}

//function to handle register-form validation
function registerValidate(registerForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="click OK to process registration";

if (registerForm.firstname.value=="")
	{
	errorMessage+="Firstname not filled!\n";
	validationVerified=false;
	}
if(registerForm.lastname.value=="")
	{
	errorMessage+="Lastname not filled!\n";
	validationVerified=false;
	}
if (registerForm.email.value=="")
	{
	errorMessage+="Email not filled!\n";
	validationVerified=false;
	}
if(registerForm.password.value=="")
	{
	errorMessage+="Password not filled!\n";
	validationVerified=false;
	}
if(registerForm.ConfirmPassword.value=="")
	{
	errorMessage+="Confirm password not filled!\n";
	validationVerified=false;
	}
if(registerForm.ConfirmPassword.value!=registerForm.password.value)
	{
	errorMessage+="Confirm password and password do not match!\n";
	validationVerified=false;
	}
if (!isValidEmail(registerForm.email.value))
	{
	errorMessage+="Invalid email address provided!\n";
	validationVerified=false;
	}
if(!validationVerified)
	{
	alert(errorMessage);
	}
if(validationVerified)
	{
	validationVerified=true;
	}
return validationVerified;
}


//validate email function
function isValidEmail(val) {
	var re = /^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
	if (!re.test(val)) {
		return false;
	}
    return true;
}

//validate state choose input
function positionValidate(positionForm){

	var validationVerified=true;
	var errorMessage="";

	if (positionForm.state_name.selectedIndex == 0){
		errorMessage+="Please select the state first to view candidates.!\n";
		validationVerified=false;
	}
	if(!validationVerified){
		alert(errorMessage);
	}
	if(validationVerified){
		var validationVerified=true;
	}
return validationVerified;
}