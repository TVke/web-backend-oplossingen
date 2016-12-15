<h2>deel 1 & 2</h2>
<h3>RegEx tester</h3>
<main>
	<form action="." method="post">
		<label for="regEx">Regular Expression</label>
		<input type="text" id="regEx" name="test" value="<?= isset($_POST['test'])?$_POST['test']:""?>">
		<label for="tekst">string</label>
		<textarea name="text" id="tekst"><?= isset($_POST['text'])?$_POST['text']:""?></textarea>
		<?= isset($_POST['resultaat'])?"<p>".$_POST['resultaat']."</p>":""?>
		<input type="submit" value="check" name="check">
	</form>
</main>