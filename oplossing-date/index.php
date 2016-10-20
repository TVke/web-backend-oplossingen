<?php

	$datum=mktime(22,35,25,1,21,1904);
	$fullDate= date("d F Y, h:i:s a",$datum);
setlocale('LC_ALL', 'nl_NL');
	$dutchDate= strftime("%d %B %Y, %I:%M:%S %P",$datum);
?>
<!DOCTYPE html>
<html>
<head>
	<title>date</title>
</head>
<body>
	<h1>date</h1>
	<h2>deel 1</h2>
	<p>de timestamp is <?= $datum?></p>
	<p>de datum is <?= $fullDate?></p>
	<h2>deel 2</h2>
	<p>de datum is <?= $fullDate?></p>
</body>
</html>
