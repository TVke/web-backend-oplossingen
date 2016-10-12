<?php
	
	// deel 1
	$rij=10;
	$kolom=10;
	
	$table1="";
	
	for($i=0;$i<$rij;$i++){
		$table1.="\t\t\t\t<tr><td>rij</td></tr>\n";
	}
	
	$table2="";
	
	for($i=0;$i<$kolom;$i++){
		$table2.="\t\t\t<tr>\n";
		for($j=0;$j<$rij;$j++){
			$table2.="\t\t\t\t<td>kolom</td>\n";
		}
		$table2.="\t\t\t</tr>\n";
	}
	
	// deel 2
	$table3="";
	
	for($i=0;$i<=$kolom;$i++){
		$table3.="\t\t\t<tr>\n";
		for($j=0;$j<=$rij;$j++){
			$table3.="\t\t\t\t<td";
			if(($i*$j)%2==1)
				$table3.=" class=\"even\"";
			$table3.=">".$i*$j."</td>\n";
		}
		$table3.="\t\t\t</tr>\n";
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>loops for</title>
		<link href="stijl.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<h1>loops for</h1>
		<h2>deel 1</h2>
		<table>
<?= $table1?>
		</table>
		<table>
<?= $table2?>
		</table>
		<h2>deel 2</h2>
		<table>
<?= $table3?>
		</table>
	</body>
</html>