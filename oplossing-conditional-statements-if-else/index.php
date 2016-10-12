<?php
	
	// deel 1
	$jaartal=2016;
	$schrik="geen";
	
	if($jaartal%4==0){
		$schrik="een";
		if($jaartal%400==0){
			$schrik="een";
		}
		elseif($jaartal%100==0){
			$schrik="geen";
		}
	}
		
	// deel 2
	$sec=221108521;
	$minuten=$sec/60;
	$uren=$minuten/60;
	$dagen=$uren/24;
	$weken=$dagen/7;
	$maanden=$dagen/31;
	$jaren=$dagen/365;
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>conditional statements if else</title>
	</head>
	<body>
		<h1>conditional statements if else</h1>
		<h2>deel 1</h2>
		<p>Het jaar <?= $jaartal?> is <?= $schrik?> schrikkeljaar</p>
		<h2>deel 2</h2>
		<p>In <?= $sec?> zitten er:</p>
		<ul>
			<li>minuten: <?= $minuten?></li>
			<li>uren: <?= $uren?></li>
			<li>dagen: <?= $dagen?></li>
			<li>weken: <?= $weken?></li>
			<li>maanden (31): <?= $maanden?></li>
			<li>jaren (365): <?= $jaren?></li>
		</ul>
	</body>
</html>