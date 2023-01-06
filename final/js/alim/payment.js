$(document).ready(function () {
	const clearChars = (value) => value.replace(/\D+/g, '');

	let cardNumber = '';
	let amount = 0;
	let isJusanClient = false;
	let cardChecked = false;

	const getParts = (value, length) => {
		let parts = [];
		for (i = 0; i < value.length; i += length) {
			parts.push(value.substring(i, i + length));
		}
		return parts;
	};

	const formatCardNumber = (value) => {
		let parts = getParts(value, 4);
		if (parts.length == 0) return value;
		return parts.join(' ');
	};

	const isCardIssuedByJusan = (value) => {
		$.post(
			'/final/php/alim/is_card_exist.php',
			{ card_number: cardNumber },
			function (response) {
				if (response.result == true) {
					isJusanClient = true;
					$('#to_card_id').val(`${response.card_id}`);
					if (response.card_id == $('#from-account-select').val()) {
						$('#card-issued').text('Нельзя перевести деньги на счет, откуда они должны быть списаны');
						$('#card-issued').addClass('text--danger');
					} else {
						$('#card-issued').text('Счет зарегистрирован в Jusan');
						$('#card-issued').addClass('text--success');
					}
				} else {
					isJusanClient = false;
					$('#to_card_id').val(`-1`);
					$('#card-issued').text('Счет другого банка');
				}
			},
			'json'
		);
		renderFinanceData();
	};

	const renderFinanceData = () => {
		let fee = '' + Math.round(amount * 0.01);

		if (isJusanClient) {
			$('#fee-amount').text('0');
			$('#fee').val('0');
			$('#total-amount').text(amount);
		} else {
			$('#fee-amount').text(fee);
			$('#fee').val(fee);
			$('#total-amount').text(+fee + amount);
		}
	};

	const checkTransferValidity = () => {
		renderFinanceData();

		if (cardNumber.length != 16 || amount <= 0 || $('#from-account-select').val() == $('#to_card_id').val()) {
			$('#transfer-button').prop('disabled', true);
			$('#transfer-button').removeClass('btn--success');
			return false;
		}

		$('#transfer-button').prop('disabled', false);
		$('#transfer-button').addClass('btn--success');
		return true;
	};

	$('#cardNumber').on('focusout keyup change', function () {
		cardNumber = clearChars($(this).val());
		if (cardNumber.length < 16) {
			$(this).val(formatCardNumber(cardNumber));
			isJusanClient = false;
			cardChecked = false;
			$('#to_card_id').val(`-1`);
			$('#card-issued').text('');
			$('#card-issued').removeClass('text--success');
			$('#card-issued').removeClass('text--danger');
			renderFinanceData();
		}
		if (cardNumber.length == 16 && !cardChecked) {
			isCardIssuedByJusan(cardNumber);
			cardChecked = true;
		}

		checkTransferValidity();
	});

	$('#transferAmount').on('focusout keyup change', function () {
		amount = +clearChars($(this).val());
		$(this).val(amount);
		checkTransferValidity();
	});

	function checkBalance() {
		console.log('checking...');
		let result = $.post(
			'/final/php/alim/check_card_balance.php',
			{ from_account: $('#from-account-select').val(), amount: amount },
			function (response) {
				if (response.result == true) {
					$('#transfer-form').submit();
				} else {
					alert(
						'Перевод денег с выбранного счета невозможен, так как сумма перевода превышает баланс счета! Укажите сумму меньше или выберите другой счет.'
					);
					return false;
				}
			},
			'json'
		);
		return result;
	}

	$('.cardNumber').each(function (i, obj) {
		$(obj).text(formatCardNumber($(obj).text()));
	});

	$('#transfer-button').on('click', function (e) {
		e.preventDefault();
		checkBalance();
	});
});
