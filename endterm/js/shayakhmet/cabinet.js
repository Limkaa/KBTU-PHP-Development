$(document).ready(function () {
	$('.deleteButton').on('click', function () {
		let inputID = $(this).val();
		$.post(
			'../../../endterm/php/shayakhmet/delete_logic.php',
			{ id: inputID },
			function (response) {
				if (response.result == true) {
					$(`#ticket-${inputID}`).remove();
				} else {
					alert(
						'Произошла ошибка отмены билета. Возможность отмены купленного билета доступна только за 3 часа до вылета'
					);
				}
			},
			'json'
		);
	});
});
