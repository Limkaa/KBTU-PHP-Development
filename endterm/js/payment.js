$(document).ready(function () {
	const expiration_timer = $('#reserve-timer');
	let total_seconds = +expiration_timer.data('seconds') || 0;

	const clearChars = (value) => value.replace(/\D+/g, '');

	let cardNumber = '';
	let cardExpirationDate = '';
	let cardCv = '';

	const getParts = (value, length) => {
		let parts = [];
		for (i = 0; i < value.length; i += length) {
			parts.push(value.substring(i, i + length));
		}
		return parts;
	};

	const setCardType = (cardType) => {
		$('#cardtype-name').text(cardType);
		$('#cardType').val(cardType);
	};

	const formatCardNumber = (value) => {
		let parts = getParts(value, 4);
		setCardType('Карта не определена');

		if (parts.length == 0) return value;

		let prefix = parts[0][0];
		if (prefix == '3') setCardType('American Express');
		else if (prefix == '4') setCardType('Visa card');
		else if (prefix == '5') setCardType('Mastercard');
		else if (prefix == '6') setCardType('Discover Card');
		else setCardType('Карта не определена');

		return parts.join(' ');
	};

	const formatCardExpirationDate = (value) => {
		let parts = getParts(value, 2);
		if (parts.length) return parts.join('/');
		return value;
	};

	const cardExpirationDateIsValid = (value) => {
		let month = +value.substring(0, 2);
		let year = +value.substring(2, 4) + 2000;

		let current = new Date();
		let curYear = current.getFullYear();
		let curMonth = current.getMonth() + 1;

		if (year < curYear || month > 12) return false;
		if (year == curYear && month < curMonth) return false;

		return true;
	};

	const checkCardValidity = () => {
		if (
			cardNumber.length != 16 ||
			!cardExpirationDateIsValid(cardExpirationDate) ||
			cardCv.length != 3 ||
			$('#cardType').val() == 'Карта не определена'
		) {
			$('#pay-button').prop('disabled', true);
			return false;
		}

		$('#pay-button').prop('disabled', false);
		return true;
	};

	if (total_seconds) {
		let clearCardTimerInterval = null;

		function launchCardClearingHook() {
			secondsUntilCardInfoClean = 60;

			function clearCardInfo() {
				cardNumber = '';
				cardExpirationDate = '';
				cardCv = '';
				$('#cardNumber').val(cardNumber);
				$('#cardExpirationDate').val(cardExpirationDate);
				$('#cardCv').val(cardCv);
				clearInterval(clearCardTimerInterval);
				clearCardTimerInterval = null;
				setCardType('Карта не определена');
				$('#card-clear-timer').text('1:00');
			}

			if (cardNumber || cardExpirationDate || cardCv) {
				if (!clearCardTimerInterval) {
					clearCardTimerInterval = setInterval(() => {
						$('#card-clear-timer').text(formatTime(secondsUntilCardInfoClean));
						if (secondsUntilCardInfoClean <= 0) clearCardInfo();
						secondsUntilCardInfoClean -= 1;
					}, 1000);
				}
			} else {
				clearCardInfo();
			}
		}

		$('#cardNumber').on('focusout keyup change', function () {
			cardNumber = clearChars($(this).val());
			$(this).val(formatCardNumber(cardNumber));
			launchCardClearingHook();
			checkCardValidity();
		});

		$('#cardExpirationDate').on('focusout keyup change', function () {
			cardExpirationDate = clearChars($(this).val());
			$(this).val(formatCardExpirationDate(cardExpirationDate));
			launchCardClearingHook();
			checkCardValidity();
		});

		$('#cardCv').on('focusout keyup change', function () {
			cardCv = clearChars($(this).val());
			$(this).val(clearChars(cardCv));
			launchCardClearingHook();
			checkCardValidity();
		});
	}
});
