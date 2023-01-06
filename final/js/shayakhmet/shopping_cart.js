$(document).ready(function () {
	$('.remove_button').on('click', function () {
		let inputID = $(this).val();
		$.post(
			'../../../final/php/shayakhmet/delete_logic.php',
			{ id: inputID },
			function (response) {
				if (response.result == true) {
					// $(`#cartitem-${inputID}`).remove();
                    location.reload(true);
				} else {
					alert(
						'Произошла ошибка удаления товара из корзины'
					);
				}
			},
			'json'
		);
	});
});