function toggleVisibility(idname) {
	var x = document.getElementById(idname);
	if (x.style.display === 'none') {
		x.style.display = 'block';
	} else {
		x.style.display = 'none';
	}
}
