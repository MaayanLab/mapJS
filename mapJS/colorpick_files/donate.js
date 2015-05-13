var insertDonationButton = function (id) {
	document.getElementById(id).innerHTML =
		'<form action="https://www.paypal.com/cgi-bin/webscr" method="post">' +
		'<input type="hidden" name="cmd" value="_donations">' +
		'<input type="hidden" name="business" value="MY2J2G87EHUH2">' +
		'<input type="hidden" name="lc" value="CZ">' +
		'<input type="hidden" name="item_name" value="JSColor">' +
		'<input type="hidden" name="currency_code" value="USD">' +
		'<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHosted">' +
		'<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">' +
		'<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">' +
		'</form>';
};
