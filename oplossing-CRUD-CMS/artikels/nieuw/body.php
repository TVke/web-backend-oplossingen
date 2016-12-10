<nav class="article">
	<a href="../"><< artikels</a><a href="../../"><< terug naar dashboard</a><p>Ingelogd als <?= $cookiePart[0]?></p><a href="../../logout.php">uitloggen</a>
</nav>
<h3>Artikel toevoegen</h3>
<main>
	<span><?= isset($_SESSION['notify'])?$_SESSION['notify'][1]:""?></span>
	<form action="nieuw-artikel-proces.php" method="post">
		<label for="articletitel">titel</label>
		<input type="text" name="titel" id="articletitel" value="<?= isset($_SESSION['titel'])?$_SESSION['titel']:""?>">
		<label for="content">artikel</label>
		<textarea name="article" id="content"><?= isset($_SESSION['article'])?$_SESSION['article']:""?></textarea>
		<label for="keywords">kernwoorden (kajak, banaan)</label>
		<input type="text" name="kernwoorden" id="keywords" value="<?= isset($_SESSION['article'])?$_SESSION['article']:""?>">
		<label for="date">datum (dd-mm-jjjj)</label>
		<input type="date" name="datum" id="date" value="<?= isset($_SESSION['datum'])?$_SESSION['datum']:""?>">
		<input type="submit" value="artikel toevoegen" name="add">
	</form>
</main>