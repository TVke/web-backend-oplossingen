<h3>Registratie</h3>
<main>
	<form action="registratie-process.php" method="post">
		<?php if(isset($_SESSION['notify']) && $_SESSION['notify'][0] === "mail"):?>
		<span><?= $_SESSION['notify'][1]?></span>
		<?php endif;?>
		<label for="email">e-mail</label>
		<input type="email" name="mail" id="email"<?php if(isset($_SESSION['notify']) && $_SESSION['notify'][0] === "mail"):?> class="wrong"<?php endif;?> value="<?= isset($_SESSION['email'])?$_SESSION['email']:""?>">
		<label for="pass">paswoord</label>
		<input type="password" name="password" id="pass" value="<?= isset($_SESSION['password'])?$_SESSION['password']:""?>"><input type="submit" value="Genereer een paswoord" id="generate">
		<input type="submit" name="register" value="Registreer">
	</form>
</main>
<script src="generatePassword.js"></script>