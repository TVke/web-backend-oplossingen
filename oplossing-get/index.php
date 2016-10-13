<?php
	
	$articles=array(
	array("titel"=>"DeAnna overtuigt haar man om er een tweede vrouw bij te nemen: \"Onze kinderen hebben nu twee mama's\"","paragraaf"=>"Het geheim van een bloeiende relatie volgens DeAnna Rivas? Polyamorie, oftewel de kunst om in alle eerlijkheid met meerdere personen tegelijk een liefdesaffaire te ontwikkelen. De 27-jarige vrouw uit Florida kan zich nu geen leven meer voorstellen zonder haar echtgenoot Manny én haar vriendin Melissa James in de buurt. En die ijzersterke band wil ze nu zelfs bekrachtigen met een 'triohuwelijk'.","afbeelding"=>"images/artikel1.jpg","beschrijvingAfbeelding"=>"2 vrouwen die een man op het hoofd kussen"),
	array("titel"=>"Man verstopt zich in vaatwasser voor politie","paragraaf"=>"In Polen heeft een voortvluchtige man zich op een bizarre manier verstopt voor de politie. Wanneer hij hoorde dat er agenten aan kwamen, brak hij in bij zijn buurman en kroop er in de vaatwasmachine. De politie kon filmen hoe ze de man uit zijn bizarre schuilplaats meepakten.","afbeelding"=>"images/artikel2.jpg","beschrijvingAfbeelding"=>"een hand met een handschoen opent de deur van een vaatwasser ingebouwd in kasten"),
	array("titel"=>"BMW onthult de motor van de toekomst, waarmee je nooit kunt vallen","paragraaf"=>"Hij lijkt een beetje op de 'Batpod' uit de Batman-films, maar deze motor rijdt straks misschien wel echt rond op de openbare weg. BMW onthulde de Motorrad Vision Next 100 ter gelegenheid van zijn honderdste verjaardag. De bolide balanceert zelf, waardoor bestuurders nooit nog hun evenwicht kunnen verliezen.","afbeelding"=>"images/artikel3.jpg","beschrijvingAfbeelding"=>"een zeer futurisch gedesignde motor met een BMW logo, rechtopstaand zonder poot")
	);
	
	$showOne=false;
	if(isset($_GET['id'])&&$_GET['id']<count($articles)){
		$showOne=true;
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>GET</title>
		<link href="stijl.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<h1>GET</h1>
		<h3>K<s>ran</s>dG</h3>
		<main>
			<div class="overlay<?php if($showOne)echo" showOne";?>">
				<?php if($showOne):?>
				<h4><?= $articles[$_GET['id']]['titel']?></h4>
				<img src="<?= $articles[$_GET['id']]['afbeelding']?>" alt="<?= $articles[$_GET['id']]['beschrijvingAfbeelding']?>">
				<p><?= $articles[$_GET['id']]['paragraaf']?></p>
				<?php endif?>
			</div>
			<?php foreach($articles as $id => $article):?>
			<article id="<?php echo $id;?>">
				<h4><?php echo $article["titel"];?></h4>
				<img src="<?php echo $article["afbeelding"];?>" alt="<?php echo $article["beschrijvingAfbeelding"];?>">
				<p><?php echo substr($article["paragraaf"],0,50);?>...</p>
				<a href="index.php?id=<?php echo $id;?>">lees meer</a>
			</article>
			<?php endforeach?>
		</main>
		<script type="text/javascript">
			document.getElementsByClassName('overlay')[0].addEventListener("click",function(){document.getElementsByClassName('overlay')[0].classList.remove('showOne');});
		</script>
	</body>
</html>