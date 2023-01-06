const submit = document.getElementById('submit');
const email = document.getElementById('email');
const password = document.getElementById('password');
const emailError = document.querySelector('span.email_err');
const passwordError = document.querySelector('span.password_err');

$(document).ready(function () {
	$('#submit').on('click', function () {
		let login_email = $('#email').val();
		let login_password = $('#password').val();

		$.post(
			'../../../endterm/php/shayakhmet/login_logic.php',
			{ eml: login_email, pwd: login_password },
			function (response) {
				if (response.result == true) {
					window.location.href = 'index.php';
				} else {
					emailError.textContent = 'Проверьте правильность ввода';
					passwordError.textContent = 'Проверьте правильность ввода';
					email.classList.add('danger');
					password.classList.add('danger');
				}
			},
			'json'
		);
	});
});

// function login() {
//     if (!email.validity.valid || !password.validity.valid) {
//         showError();
//         this.preventDefault();
//     } else {

//     }
// }

email.addEventListener('login', (event) => {
	if (email.validity.valid) {
		emailError.textContent = '';
		email.classList.remove('danger');
	} else {
		showError();
	}
});

password.addEventListener('login', (event) => {
	if (password.validity.valid) {
		passwordError.textContent = '';
		password.classList.remove('danger');
	} else {
		showError();
	}
});

// submit.addEventListener("click", login())

function showError() {
	if (email.validity.valueMissing || email.validity.typeMismatch) {
		emailError.textContent = 'Введите вашу почту';
	}
	if (password.validity.valueMissing || password.validity.typeMismatch) {
		passwordError.textContent = 'Введите ваш пароль';
	}

	email.classList.add('danger');
	password.classList.add('danger');
}
