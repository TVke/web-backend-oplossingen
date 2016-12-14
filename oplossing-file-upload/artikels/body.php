<nav>
	<a href="../"><< terug naar dashboard</a><p>Ingelogd als <?= $cookiePart[0]?></p><a href="../logout.php">uitloggen</a>
</nav>
<h3>Overzicht van de artikels</h3>
<main>
	<?= isset($_SESSION['notify'])?"<span>".$_SESSION['notify'][1]."</span>":""?>
	<a href="nieuw/">Voeg een artikel toe</a>
	<?php if($articles):while ($article = $articles->fetch(PDO::FETCH_ASSOC)):if($article['is_archived']==0):?>
	<article class="<?= ($article['is_active']==0)?"non-active":"active"?>">
		<h4><?= $article['titel']?></h4>
		<ul>
			<li>artikel: <?= $article['artikel']?></li>
			<li>datum: <?= $article['datum']?></li>
		</ul>
		<a href="wijzig/?artikel=<?= $article['id']?>">artikel wijzigen</a>
		<a href="activeer/?artikel=<?= $article['id']?>">artikel <?= ($article['is_active']==0)?"activeren":"deactiveren"?></a>
		<a href="verwijder/?artikel=<?= $article['id']?>">artikel verwijderen</a>
	</article>
	<?php endif;endwhile;else:?>
	<p>Geen artikels gevonden</p>
	<?php endif;?>
</main>