var generateButton = document.getElementById('generate');
var passwordField = document.getElementById('pass');

generateButton.addEventListener("click",function(e) {
	e.preventDefault();
	passwordField.type = "text";
	passwordField.value = generatePassword(15);
});

function generatePassword(size) {
	var toUse = "azertyuiopqsdfghjklmwxcvbn,;:=ù`^-)àç!è§(é&@AZERTYUIOPQSDFGHJKLMWXCVBN?./+£%*¨_°0987654321#";
	var arToUse = toUse.split("");
	var pass = "";
	for(var i = 0;i<size;++i){
		var rand = Math.round(Math.random()*(arToUse.length-1));
		pass += arToUse[rand];
	}
	return pass;
}