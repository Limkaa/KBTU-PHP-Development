const plusBtn = $('#plus');
const minusBtn = $('#minus');
const amount = $('#product_quantity');
let amountValue = 0;

function handlePlus() {
	amountValue++;
	amount.text(amountValue);
}
function handleMinus() {
	if (amountValue > 0) {
		amountValue--;
	}
	amount.text(amountValue);
}

plusBtn.on('click', handlePlus);
minusBtn.on('click', handleMinus);
