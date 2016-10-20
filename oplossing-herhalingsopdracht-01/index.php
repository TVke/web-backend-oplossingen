<?phpfunction showList($link){    $list=[];	foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($link)) as $file)	{		if (array_pop(explode(".",$file)) == "php"){			array_push($list,$file);		}	}    return $list;}$zoekopdracht="";if(isset($_GET['zoeknaar'])){	function searchFiles(){		$found=false;		$foundFiles=[];		$tezoeken = $_GET['zoeknaar'];		$voorbeelden = showList("../../cursus/public/cursus/voorbeelden/");		$opdrachten = showList("../../cursus/public/cursus/opdrachten/");		foreach ($voorbeelden as $link) {			if (preg_match("/" . $tezoeken . "/i", basename($link))) {				$found = true;				array_push($foundFiles, $link);			}		}		foreach ($opdrachten as $link){			if(preg_match("/".$tezoeken."/i",basename($link))){				$found=true;				array_push($foundFiles,$link);			}		}		if($found){			return $foundFiles;		}else{			return $found;		}	}	$zoekopdracht=" ".$_GET['zoeknaar'];}?><!DOCTYPE html><html><head>    <title>herhalingsopdracht 01</title>    <link href="stijl.css" rel="stylesheet" type="text/css"></head><body><h1>herhalingsopdracht 01</h1><h2>Pagina index</h2><a href="index.php?link=cursus">Cursus</a><a href="index.php?link=voorbeelden">Voorbeelden</a><a href="index.php?link=opdrachten">Opdrachten</a><form action="index.php" method="get">    <label for="zoekveld">Zoeken naar: </label>    <input type="search" placeholder="Geef een zoekterm in" name="zoeknaar" id="zoekveld">    <input type="submit" value="zoek"></form><h2>Inhoud<?= $zoekopdracht?></h2><?php if(isset($_GET['link'])):?><?php switch($_GET['link']):case "cursus":?>    <iframe src="http://web-backend.local/cursus/web-backend-cursus.pdf"></iframe><?php break;?><?php case "voorbeelden":?>    <ul>    <?php  foreach (showList("../../cursus/public/cursus/voorbeelden/") as $listItem):?>	    <li><a href="<?= str_replace("../../cursus/public","http://web-backend.local",$listItem)?>"><?= basename($listItem)?></a></li>	<?php endforeach;?>    </ul><?php break;?><?php case "opdrachten":?>	<ul>		<?php  foreach (showList("../../cursus/public/cursus/opdrachten/") as $listItem):?>			<li><a href="<?= str_replace("../../cursus/public","http://web-backend.local",$listItem)?>"><?= basename($listItem)?></a></li>		<?php endforeach;?>	</ul><?php default:?><?php break;?><?php endswitch;?><?php elseif (isset($_GET['zoeknaar'])):?>	<?php if(searchFiles()):?>		<ul>			<?php foreach (searchFiles() as $resultaat):?>				<li><a href="<?= str_replace("../../cursus/public","http://web-backend.local",$resultaat)?>"><?= basename($resultaat)?></a></li>			<?php endforeach;?>		<?php else:?>			<p>Spijtig, geen zoekresultaten gevonden voor <?= $_GET['zoeknaar']?></p>	<?php endif;?><?php endif;?></body></html>