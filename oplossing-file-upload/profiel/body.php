<nav>
	<a href="../"><< terug naar dashboard</a><p>Ingelogd als <?= $cookiePart[0]?></p><a href="../logout.php">uitloggen</a>
</nav>
<h3>Gegevens wijzigen</h3>
<main>
	<?= isset($_SESSION['notify'])?"<span>".$_SESSION['notify'][1]."</span>":""?>
	<?php while ($info = $user->fetch(PDO::FETCH_ASSOC)):?>
		<form action="../img/" method="post" enctype="multipart/form-data">
			<input type="hidden" value="<?= $info['id']?>" name="id">
			<label for="picture">Profielfoto</label>
			<?php if($info['profile_picture']===""):?>
				<img src="../img/user.svg" alt="<?= $info['email']?>">
			<?php else:?>
				<img src="../img/pics/<?= $info['profile_picture']?>" alt="<?= $info['email']?>">
			<?php endif;?>
			<input type="file" id="picture" name="foto">
			<label for="mail">email</label>
			<input type="text" name="email" id="mail" value="<?= $info['email']?>">
			<input type="submit" name="edit" value="Gegevens wijzigen">
		</form>
	<?php endwhile;?>
</main>