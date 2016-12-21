<main>
	<?= isset($_GET['articles'])||isset($_GET['year'])?"<a href='clean/'><< terug naar overzicht</a>":""?>
	<form action="." method="get">
		<label for="article">Zoeken in de artikels:</label>
		<input type="search" id="article" name="articles"<?= isset($_GET['articles'])?" value='".$_GET['articles']."'":""?>>
		<label for="date">Zoeken in de datum:</label>
		<select name="year" id="date">
			<?= isset($_GET['year'])&&$_GET['year']!==""?"<option value='".$_GET['year']."'>".$_GET['year']."</option>":""?>
			<option value=""></option>
			<?php while ($year = $years->fetch(PDO::FETCH_ASSOC)):?>
				<option value="<?= $year['year']?>"><?= $year['year']?></option>
			<?php endwhile;?>
		</select>
		<input type="submit" value="zoeken">
	</form>
</main>
<h3>overzicht artikelen</h3>
<main>
	<?= isset($_SESSION['notify'])?"<p>".$_SESSION['notify']."</p>":""?>
	<a href="toevoegen/">nieuw artikel toevoegen</a>
	<?php if($articles->rowCount()>0):while($art = $articles->fetch(PDO::FETCH_ASSOC)):?>
		<article>
			<h4><?= $art['titel']?> | <span><?= $art['datum']?></span></h4>
			<p><?= $art['artikel']?></p>
			<?php $kern = $db->query("SELECT * FROM kernwoorden WHERE artikel_id = '".$art['id']."'");if($kern->rowCount()>0):?>
				<p>kernwoorden:
					<?php while($woorden = $kern->fetch(PDO::FETCH_ASSOC)):?>
						<span><?= $woorden['kernwoord']?></span>
					<?php endwhile;?>
				</p>
			<?php endif;?>
		</article>
	<?php endwhile;else:?>
		<p>Er werd niets als dit gevonden in het archief. </p>
	<?php endif;?>
</main>