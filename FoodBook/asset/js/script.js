const wrapper = document.querySelector('.wrapper');

const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');

const registerbtnLink = document.querySelector('.getotp');
const loginbtnLink = document.querySelector('#loginform');

const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');

var loginError = document.getElementById('loginError');
var regSuccess = document.getElementById('registerSuccess');
var regError = document.getElementById('registerError');

registerLink.addEventListener('click', () => {
	wrapper.classList.remove('active1');
	wrapper.classList.add('active2');

	regError.innerHTML = "";
	regSuccess.innerHTML = "";
	loginError.innerHTML = "";
});

loginLink.addEventListener('click', () => {
	wrapper.classList.remove('active2');
	wrapper.classList.add('active1');

	regError.innerHTML = "";
	regSuccess.innerHTML = "";
	loginError.innerHTML = "";
});

// -------------------------OTP BOX-----------------------------

// registerbtnLink.addEventListener('click', function (event) {
// 	// event.preventDefault();

// 	var username = document.getElementsByName("username")[0].value.trim();
// 	var email = document.getElementsByName("email")[0].value.trim();
// 	var password = document.getElementsByName("password")[0].value.trim();

// 	// Validate the input values
// 	if (username === "" || email === "" || password === "") {
// 		// Show an error message to the user
// 		// alert("Please fill in all fields.");
// 	} 
// 	else if ( $.cookie("username") === "valid" ) {
// 		wrapper.classList.remove('active2');
// 		wrapper.classList.add('active3');
// 	}

// 	// wrapper.classList.remove('active2');
// 	// wrapper.classList.add('active3');
// });
// -------------------------------------------------------------

btnPopup.addEventListener('click', () => {
	wrapper.classList.add('active-popup');

	regError.innerHTML = "";
	regSuccess.innerHTML = "";
	loginError.innerHTML = "";
});

iconClose.addEventListener('click', () => {
	wrapper.classList.remove('active-popup');

	regError.innerHTML = "";
	regSuccess.innerHTML = "";
	loginError.innerHTML = "";
});


registerbtnLink.addEventListener('click', function (event) {
	
	var form_element = document.getElementsByClassName('register-data');

	var form_data = new FormData();

	var username = form_element[0].value;
	var email = form_element[1].value;
	var password = form_element[2].value;

	const regex1 = /^[^@]+@[^@]+$/;
	const regex2 = /^[A-Za-z0-9._]+$/;

	if (username != '' && email != '' && password != '' && document.getElementById('checkbox').checked && regex1.test(email) && regex2.test(username)) {

		form_data.append('username', username);
		form_data.append('email', email);
		form_data.append('password', password);

		document.getElementById("submitform").disabled = true;

		var ajax_request = new XMLHttpRequest();

		ajax_request.open('POST', 'access/auth-register.php');

		ajax_request.send(form_data);

		ajax_request.onreadystatechange = function() {
			if(ajax_request.readyState == 4 && ajax_request.status == 200) {
				document.getElementById('submitform').disabled = false;

				var response = JSON.parse(ajax_request.responseText);

				if(response.success == "false"){
					//display validation error

					regSuccess.innerHTML = "";
					regError.innerHTML = "This username isn't available. Please try another.";

				}
				else if (response.success == "true") {
					document.getElementById('sample-form').reset();
					document.getElementById('login-form').reset();

					regError.innerHTML = "";
					regSuccess.innerHTML = "Registered. You may login now.";

					wrapper.classList.remove('active2');
					wrapper.classList.add('active1');
				}
				else if (response.success == "error") {
					regSuccess.innerHTML = "";
					regError.innerHTML = "server error";
				}
				else {
					window.location = "/../../access/error.php";
					regError.innerHTML = "hehe";
				}

				// setTimeout(function(){

				// 	regError.innerHTML = "";
				// 	regSuccess.innerHTML = "";

				// }, 5000);
			}
		}
	}
});



loginbtnLink.addEventListener('click', function (event) {
	
	var form_element = document.getElementsByClassName('login-data');

	var form_data = new FormData();

	var username = form_element[0].value;
	var password = form_element[1].value;

	const regex2 = /^[A-Za-z0-9._]+$/;

	if (username != '' && password != '' && regex2.test(username)) {

		form_data.append('username', username);
		form_data.append('password', password);

		document.getElementById("loginform").disabled = true;

		var ajax_request = new XMLHttpRequest();

		ajax_request.open('POST', 'access/auth-login.php');

		ajax_request.send(form_data);

		ajax_request.onreadystatechange = function() {
			if(ajax_request.readyState == 4 && ajax_request.status == 200) {
				document.getElementById('loginform').disabled = false;

				var response = JSON.parse(ajax_request.responseText);

				// var regSuccess = document.getElementById('registerSuccess');

				if(response.success == "false"){
					//display validation error

					// regSuccess.innerHTML = "";
					regSuccess.innerHTML = "";
					loginError.innerHTML = "Invalid login crendentials";

				}
				else if (response.success == "true") {
					loginError.innerHTML = "";
					regSuccess.innerHTML = "";

					window.location = "/../../access/login.php";
				}
				else {
					window.location = "/../../access/error.php";
				}
				// else {
				// 	document.getElementById('sample-form').reset();

				// 	regError.innerHTML = "";
				// 	regSuccess.innerHTML = "Registered. You may login now.";

				// 	wrapper.classList.remove('active2');
				// 	wrapper.classList.add('active1');
				// }

				// setTimeout(function(){

				// 	loginError.innerHTML = "";

				// }, 5000);
			}
		}
	}
});