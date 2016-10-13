<?php
	
	// deel 1
	$startBedrag=100000;
	$renteProcent=8;
	$jaarSparen=10;
	
	function plusRenteOpJaarbasis($start,$rente,$jaar,$jaren=0){
		if($jaren<$jaar){
			$start+=$start*$rente/100;
			++$jaren;
			return plusRenteOpJaarbasis($start,$rente,$jaar,$jaren);
		}
		else{
			return $start;
		}
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>functions recursive</title>
	</head>
	<body>
		<h1>functions recursive</h1>
		<h2>deel 1</h2>
		<p>Het bedrag €<?= $startBedrag?> met een rente van <?= $renteProcent?>% word na <?= $jaarSparen?> jaar €<?= plusRenteOpJaarbasis($startBedrag,$renteProcent,$jaarSparen)?></p>
	</body>
</html>