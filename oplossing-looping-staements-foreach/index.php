<?php
	
	// deel 1
	$text=file_get_contents("text-file.txt");
	$textChars=str_split($text);
	sort($textChars);
	$textChars=array_reverse($textChars);
	$UniqueChars=array_count_values($textChars);
	$amountUniqueChars=count($UniqueChars);
	$listOfChars="";
	foreach($UniqueChars as $char=>$times){
		$listOfChars.="\t\t\t<li>".$char.": ".$times."</li>\n";
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>loops for</title>
	</head>
	<body>
		<h1>loops for</h1>
		<h2>deel 1</h2>
		<p>Er komen <?= $amountUniqueChars?> verschillende karakters voor</p>
		<p>Dit is hoe vaak elk karakter voorkomt:</p>
		<ul>
<?= $listOfChars?>
		</ul>
	</body>
</html>