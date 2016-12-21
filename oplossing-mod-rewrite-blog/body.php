<main>
	<form action="." method="get">
		<label for="article">Zoeken in de artikels:</label>
		<input type="search" id="article" name="articles">
		<input type="submit" value="zoeken">
	</form>
	<form action="." method="get">
		<label for="date">Zoeken in de datum:</label>
		<select name="year" id="date">
			<option></option>
			<?php while ($year = $years->fetch(PDO::FETCH_ASSOC)):?>
				<option><?= $year['year']?></option>
			<?php endwhile;?>
		</select>
		<input type="submit" value="zoeken">
	</form>
</main>
<h3>overzicht artikelen</h3>
<main>
	<?= isset($_SESSION['notify'])?"<p>".$_SESSION['notify']."</p>":""?>
	<a href="add/">nieuw artikel toevoegen</a>
	<?php while($art = $articles->fetch(PDO::FETCH_ASSOC)):?>
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
	<?php endwhile;?>
</main>