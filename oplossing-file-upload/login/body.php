<h3>Login</h3>
<main>
	<form action="login-process.php" method="post">
		<?php if(isset($_SESSION['notify'])):?>
			<span><?= $_SESSION['notify'][1]?></span>
		<?php endif;?>
		<label for="email">e-mail</label>
		<input type="email" name="mail" id="email"<?php if(isset($_SESSION['notify']) && $_SESSION['notify'][0] === "mail"):?> class="wrong"<?php endif;?> value="<?= isset($_SESSION['email'])?$_SESSION['email']:""?>">
		<label for="pass">wachtwoord</label>
		<input type="password" name="password" id="pass" <?php if(isset($_SESSION['notify']) && $_SESSION['notify'][0] === "pass"):?> class="wrong"<?php endif;?>>
		<input type="submit" name="login" value="Inloggen">
	</form>
	<p>Nog geen account? Maak er dan eentje aan op de <a href="../register/">registratiepagina</a>. </p>
</main>