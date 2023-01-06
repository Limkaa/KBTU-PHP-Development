let selected_id = $('.payment_option.selected').data('toggle');

$('.payment_option').on('click', function () {
	let id = $(this).data('toggle');
	if (id == selected_id) return;
	$('.payment_option.selected').removeClass('selected');
	$(this).addClass('selected');
	$(`#${selected_id}`).hide();
	$(`#${id}`).show();
	selected_id = id;
});
