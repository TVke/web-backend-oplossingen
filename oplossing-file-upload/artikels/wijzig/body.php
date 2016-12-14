<nav class="article">
	<a href="../"><< artikels</a><a href="../../"><< terug naar dashboard</a><p>Ingelogd als <?= $cookiePart[0]?></p><a href="../../logout.php">uitloggen</a>
</nav>
<h3>Artikel wijzigen</h3>
<main>
	<?= isset($_SESSION['notify'])?"<span>".$_SESSION['notify'][1]."</span>":""?>
	<form action="wijzig-artikel-proces.php" method="post">
		<?php while($article = $selectedArticle->fetch(PDO::FETCH_ASSOC)):?>
		<input type="hidden" name="id" value="<?= $article['id']?>">
		<label for="articletitel">titel</label>
		<input type="text" name="titel" id="articletitel" value="<?= $article['titel']?>">
		<label for="content">artikel</label>
		<textarea name="article" id="content"><?= $article['artikel']?></textarea>
		<label for="date">datum (dd-mm-jjjj)</label>
		<input type="date" name="datum" id="date" value="<?= $article['datum']?>">
		<input type="submit" value="artikel wijzigen" name="edit">
		<?php endwhile;?>
	</form>
</main>