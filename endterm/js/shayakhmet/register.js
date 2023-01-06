// const email = document.getElementById("email");
// const password = document.getElementById("password");
const emailError = document.querySelector('span.email_err');

$(document).ready(function () {
	$('#submit').on('click', function () {
		let reg_email = $('#email').val();
		let reg_password = $('#password').val();

		$.post(
			'../../../endterm/php/shayakhmet/register_logic.php',
			{ eml: reg_email, pwd: reg_password },
			function (response) {
				if (response.result == true) {
					window.location.href = 'login.html';
				} else {
					emailError.textContent = 'Произошла ошибка. Скорее всего, эта почта уже занята';
				}
			},
			'json'
		);
	});
});

function success() {
	let email = $('#email').val();
	if (!/^\S+@\S+\.\S+$/.test(email) || document.getElementById('password').value === '') {
		$('#submit').prop('disabled', true);
	} else {
		$('#submit').prop('disabled', false);
	}
}

function clearInput() {
	document.getElementById('password').value = '';
}

// email.addEventListener("login", (event) => {
//     if (email.validity.valid) {
//         emailError.textContent = "";
//         email.classList.remove("danger")
//     }
//     else {
//         showError();
//     }
// });

// password.addEventListener("login", (event) => {
//     if (password.validity.valid) {
//         passwordError.textContent = "";
//         password.classList.remove("danger");
//     }
//     else {
//         showError();
//     }
// });

// function showError() {
//     if (email.validity.valueMissing || email.validity.typeMismatch) {
//         emailError.textContent = "Введите вашу почту";
//     }
//     if (password.validity.valueMissing || password.validity.typeMismatch) {
//         emailError.textContent = "Введите ваш пароль";
//     }

//     email.classList.add("danger");
//     password.classList.add("danger")
// }
