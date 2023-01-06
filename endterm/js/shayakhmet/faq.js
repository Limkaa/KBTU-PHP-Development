$(document).ready(function () {
	$('.accordion__header').on('click', function () {
		$(this).siblings('.accordion__body').toggleClass('accordion__body--active');
		// e.preventDefault();
	});
});

let $accordions = jQuery('.accordion');
let $tagLink = $('.tag');

$tagLink.click(function (evt) {
	let linkText = $(this).children('.tag__title').text();

	if (linkText == 'Все') {
		$accordions.hide().filter(textFiltering).show();
	} else {
		$accordions
			.hide()
			.filter('.' + linkText)
			.filter(textFiltering)
			.show();
	}
	if (!$(this).hasClass('tag--active')) {
		$('.tag--active').toggleClass('tag--active');
		$(this).toggleClass('tag--active');
	}
});

$('#form_text').bind('keyup', function () {
	let currentTag = $('.tag--active').children('.tag__title').text();
	let items = $('.accordion.' + currentTag);

	if (currentTag == 'Все') items = $('.accordion');

	items.hide();
	items.filter(textFiltering).show();
});

function textFiltering() {
	let text = $('#form_text').val().toLowerCase();
	return (
		$(this).find('.accordion__body').text().toLowerCase().indexOf(text.toLowerCase()) > -1 ||
		$(this).find('.accordion__header_title').text().toLowerCase().indexOf(text.toLowerCase()) > -1
	);
}
