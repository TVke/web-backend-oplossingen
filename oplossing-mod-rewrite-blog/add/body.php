<h3>Toevoegen</h3>
<main>
	<a href="../"><< terug naar overzicht</a>
	<?= isset($_SESSION['notify'])?"<p>".$_SESSION['notify']."</p>":""?>
	<form action="verwerken.php" method="post">
		<label for="title">titel</label>
		<input type="text" id="title" name="titel"<?= isset($_SESSION['titel'])?" value=\"".$_SESSION['titel']."\"":""?>>
		<label for="aticle">artikel</label>
		<textarea name="artikel" id="article"><?= isset($_SESSION['artikel'])?$_SESSION['artikel']:""?></textarea>
		<label for="kernwoord">kernwoorden (woord 1, woord 2)</label>
		<input type="text" id="kernwoord" name="kernwoorden"<?= isset($_SESSION['kernwoorden'])?" value=\"".$_SESSION['kernwoorden']."\"":""?>>
		<label for="date">datum (dd-mm-jjjj)</label>
		<input type="date" id="date" name="datum"<?= isset($_SESSION['datum'])?" value=\"".$_SESSION['datum']."\"":""?>>
		<input type="submit" value="toevoegen" name="add">
	</form>
</main>