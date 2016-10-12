<?php
	
	// deel 1
	$start=1;
	$getallenString="0";
	while($start<=100){
		$getallenString.=", ".$start;
		$start++;
	}
	$deelDoorDrie="42";
	$start=43;
	while($start<=80){
		if($start%3==0){
			$deelDoorDrie.=", ".$start;
		}
		$start++;
	}
	
	// deel 2
	$boodschappenlijstje=array("melk","boter","spruiten","snoep","brood");
	$lijstString="<ul>\n";
	$i=0;
	while($i<count($boodschappenlijstje)){
		$lijstString.="\t\t\t<li>".$boodschappenlijstje[$i]."</li>\n";
		$i++;
	}
	$lijstString.="\t\t</ul>\n";
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>loops while</title>
	</head>
	<body>
		<h1>loops while</h1>
		<h2>deel 1</h2>
		<p>dit zijn getallen: <?= $getallenString?></p>
		<p>alle getallen tussen 40 en 80 die deelbaar zijn door 3: <?= $deelDoorDrie?></p>
		<h2>deel 2</h2>
		<?= $lijstString?>
	</body>
</html>