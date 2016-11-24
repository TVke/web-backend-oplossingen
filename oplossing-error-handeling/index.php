<?php $titel="error-handeling";

try {
	if (isset($_POST['stuur'])) {

		if (isset($_POST['code'])) {

		} else {
			new Exception("SUBMIT-ERROR");
		}
	}
}
catch (Exception $e) {
	$e->getMessage();
}


require("../generalheader.html");
require("body.html");
require("../generalfooter.html");