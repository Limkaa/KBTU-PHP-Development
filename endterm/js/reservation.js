const place_prices = {};
let age = 0;

const sumValues = (obj) => Object.values(obj).reduce((a, b) => a + b, 0);

function setTotalPrice(amount) {
	$('#total-price').text(amount);
}

function setDiscount(amount) {
	$('#discount').text(amount);
	if (amount == 0) {
		$('#discount-block').addClass('hidden');
	} else {
		$('#discount-block').removeClass('hidden');
	}
}

function calculateFinalPrice() {
	let discount = 0;
	let total_price = sumValues(place_prices);
	if ((age >= 18 && age <= 25) || age >= 65) discount += Math.floor(total_price * 0.1);

	total_price -= discount;
	setDiscount(discount);
	setTotalPrice(total_price);
}

$('#birthDate').on('change', function () {
	birthDate = new Date(this.value);
	let today = new Date();
	age = Math.floor((today - birthDate) / (365 * 24 * 60 * 60 * 1000));
	calculateFinalPrice();
});

$('.place-selection').on('change', function () {
	place_prices[$(this).data('flight')] = +$(this).find(':selected').data('price');
	calculateFinalPrice();
});
