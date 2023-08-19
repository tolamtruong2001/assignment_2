// Set Menu height = Main height
function changeDivHeight() {
	let a = document.getElementById('menu').offsetHeight;
	let b = document.getElementById('main').offsetHeight;

	if( a > b ) {
		document.getElementById('main').style.height =  a+"px";
	} else {
		document.getElementById('menu').style.height =  b+"px";
	}
}
document.addEventListener("DOMContentLoaded", function(evt) {
  changeDivHeight();
});
window.addEventListener('resize', changeDivHeight);

function checkUserRegistration(){
	$fullname = document.getElementById('fullname').value;
	$email = document.getElementById('email').value;
	$password = document.getElementById('password').value;
	$password2 = document.getElementById('password2').value;
	$address = document.getElementById('address').value;
	$phonenumber = document.getElementById('phonenumber').value;

	if($fullname == ""){
		alert('Fullname is empty!');
		document.getElementById('fullname').focus();
		return false;
	}
	else if($email == ""){
		alert('Email is empty!');
		document.getElementById('email').focus();
		return false;
	}
	else if($phonenumber == ""){
		alert('Phone number is empty!');
		document.getElementById('phonenumber').focus();
		return false;
	}
	else if($password == ""){
		alert('Password is empty!');
		document.getElementById('password').focus();
		return false;
	}
	else if($password.length < 6){
		alert('Password is short!');
		document.getElementById('password').focus();
		return false;
	}
	else if($password2 == ""){
		alert('Retype password is empty!');
		document.getElementById('password2').focus();
		return false;
	}
	else if($password != $password2){
		alert('Password and Retype password are different!');
		document.getElementById('password2').focus();
		return false;
	}
	else if($address == ""){
		alert('Address is empty!');
		document.getElementById('address').focus();
		return false;
	}
	else{
		return true;
	}
}

function checkUserModify(){
	$fullname = document.getElementById('fullname').value;
	$email = document.getElementById('email').value;
	$password = document.getElementById('password').value;
	$password2 = document.getElementById('password2').value;
	$address = document.getElementById('address').value;
	$phonenumber = document.getElementById('phonenumber').value;

	if($fullname == ""){
		alert('Fullname is empty!');
		document.getElementById('fullname').focus();
		return false;
	}
	else if($phonenumber == ""){
		alert('Phone number is empty!');
		document.getElementById('phonenumber').focus();
		return false;
	}
	else if($address == ""){
		alert('Address is empty!');
		document.getElementById('address').focus();
		return false;
	}
	else{
		return true;
	}
}

function checkContact(){
	$name = document.getElementById("name").value;
	$email = document.getElementById("email").value;
	$title = document.getElementById("title").value;
	$message = document.getElementById("message").value;

	if($name=="" || $email=="" || $title=="" || $message==""){
		alert("You must fill in all the information!");
		return false;
	}
	else
		return true;
}