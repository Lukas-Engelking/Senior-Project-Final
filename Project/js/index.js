// Buttons ==============================>
$('#register').hide();
$('#loginBtn').click(function () {
	$('#register').hide();
	$('#login').show();
	
	$('#loginBtn').css('background-color', "#3A3937");
	$('#loginBtn').css('color', "#FFF");
	$('#registerBtn').css('background-color', "#FFF");
	$('#registerBtn').css('color', "#3A3937");
});
$('#registerBtn').click(function () {
	$('#login').hide();
	$('#register').show();
	
	$('#registerBtn').css('background-color', "#3A3937");
	$('#registerBtn').css('color', "#FFF");
	$('#loginBtn').css('background-color', "#FFF");
	$('#loginBtn').css('color', "#3A3937");
});

$('#editInfo').hide();
$('#createActivityBtn').click(function () {
	$('#editInfo').hide();
	$('#createActivity').show();
	
	$('#createActivityBtn').css('background-color', "#3A3937");
	$('#createActivityBtn').css('color', "#FFF");
	$('#editInfoBtn').css('background-color', "#FFF");
	$('#editInfoBtn').css('color', "#3A3937");
});
$('#editInfoBtn').click(function () {
	$('#createActivity').hide();
	$('#editInfo').show();
	
	$('#editInfoBtn').css('background-color', "#3A3937");
	$('#editInfoBtn').css('color', "#FFF");
	$('#createActivityBtn').css('background-color', "#FFF");
	$('#createActivityBtn').css('color', "#3A3937");
});

// Show Other Input ==============================>
function showfield(name) {
	var value = name.value;
	
  if (value === 'Other') {
		document.getElementById('div1').innerHTML = '<label for="other">Please Describe</label><input type="text" name="other"/>';
	} else {
		document.getElementById('div1').innerHTML = '';
	}
}

// Form Validations ==============================>
function validateLogin() {
	var email = document.forms["loginForm"]["email"].value, pw = document.forms["loginForm"]["pw"].value, text;
	
	if(email == "" || pw == "") {
		text = "Must enter all fields!";
		document.getElementById("loginText").innerHTML = text;
		return false;
	}
}
function validateRegister() {
	var email = document.forms["registerForm"]["email"].value, pw1 = document.forms["registerForm"]["pw1"].value, pw2 = document.forms["registerForm"]["pw2"].value, text;
	
	if(email == "" || pw1 == "" || pw2 == "") {
		text = "Must enter all fields!";
		document.getElementById("registerText").innerHTML = text;
		return false;
	}
	
	if(pw1 !== pw2) {
		text = "Passwords do not match!";
		document.getElementById("registerText").innerHTML = text;
		return false;
	}
}
function validateCreateActivity() {
	var aName = document.forms["createActivityForm"]["aName"].value, location = document.forms["createActivityForm"]["location"].value, startY = document.forms["createActivityForm"]["startY"].value, startM = document.forms["createActivityForm"]["startM"].value, startD = document.forms["createActivityForm"]["startD"].value, endY = document.forms["createActivityForm"]["endY"].value, endM = document.forms["createActivityForm"]["endM"].value, endD = document.forms["createActivityForm"]["endD"].value, text;
	
	var start = startY + "-" + startM + "-" + startD;
	start = new Date(startY, startM, startD);
	start = start.getTime();
	var end = endY + "-" + endM + "-" + endD;	
	end = new Date(endY, endM, endD);
	end = end.getTime();
	
	if (aName == "" || location == "" || startY == "" || startM == "" || startD == "" || endY == "" || endM == "" || endD == "") {
		text = "Must enter all fields!";
		document.getElementById("createActivityText").innerHTML = text;
		return false;
	}
	
	if (end <= start) {
		text = "End date must occur after start date!";
		document.getElementById("createActivityText").innerHTML = text;
		return false;
	}
}
function validateEditInfo() {
	var email = document.forms["editInfoForm"]["email"].value, password = document.forms["editInfoForm"]["password"].value, uName = document.forms["editInfoForm"]["uName"].value, phone = document.forms["editInfoForm"]["phone"].value, ec = document.forms["editInfoForm"]["ec"].value, ecp = document.forms["editInfoForm"]["ecp"].value, text;
	
	if (email == "" || password == "" || uName == "" || phone == "" || ec == "" || ecp == "") {
		text = "Must enter all fields!";
		document.getElementById("editInfoText").innerHTML = text;
		return false;
	} 
	if (isNaN(phone) || isNaN(ecp)) {
		text = "Phone and Emergency Contact Phone must be numbers!";
		document.getElementById("editInfoText").innerHTML = text;
		return false;
	}
}

// Show Activity Details ==============================>
function showDetails(str) {
	xmlhttp = new XMLHttpRequest();
	
	xmlhttp.onreadystatechange = function () {
		if (this.readyState === 4 && this.status === 200) {
			document.getElementById("details").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "../includes/details.php?q="+str, true);
	xmlhttp.send();
}























