<h2>deel 1 & 2</h2>
<h3>Contacteer ons</h3>
<main>
	<form action="contact/" method="post">
		<?= isset($_SESSION['notify'])?"<span>".$_SESSION['notify'][1]."</span>":""?>
		<label for="mail">e-mailadres</label>
		<input type="email" name="email" id="mail" value="<?= isset($_SESSION['email'])?$_SESSION['email']:""?>">
		<label for="boodschap">booschap</label>
		<textarea name="message" id="boodschap"><?= isset($_SESSION['message'])?$_SESSION['message']:""?></textarea>
		<label for="kopie"><input type="checkbox" id="kopie" name="copy"<?= $_SESSION['checkbox']?" checked":""?>>stuur een kopie naar mezelf</label>
		<input type="submit" name="send" value="verstuur">
	</form>
</main>