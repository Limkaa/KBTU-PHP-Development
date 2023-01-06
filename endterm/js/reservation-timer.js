$(document).ready(function () {
	const expiration_timer = $('#reserve-timer');
	let total_seconds = +expiration_timer.data('seconds') || 0;

	function formatTime(total_seconds) {
		let minutes = Math.floor(total_seconds / 60);
		let seconds = total_seconds % 60;
		let time = `${minutes}:`;

		if (seconds < 10) time += '0' + seconds;
		else time += seconds;

		return time;
	}

	if (total_seconds) {
		const timer = setInterval(() => {
			if (total_seconds <= 0) {
				window.location.reload(1);
				clearTimer();
				return;
			}
			expiration_timer.text(formatTime(total_seconds));
			total_seconds -= 1;
		}, 1000);

		function clearTimer() {
			clearInterval(timer);
		}
	}
});
