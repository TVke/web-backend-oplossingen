<h2>Deel 1</h2>
<h3>Voeg een brouwer toe</h3>
<?php if(isset($succes)):?>
	<p><?= $succes?></p>
<?php endif;?>
<main>
	<form action="." method="post">
		<label for="name">brouwernaam</label>
		<input type="text" name="brnaam" id="name">
		<label for="adress">adres</label>
		<input type="text" name="adres" id="adress">
		<label for="postalcode">postcode</label>
		<input type="number" name="postcode" id="postalcode" min="1000">
		<label for="city">gemeente</label>
		<input type="text" name="gemeente" id="city">
		<label for="profit">omzet</label>
		<input type="number" name="omzet" id="profit">
		<input type="submit" name="submit" value="toevoegen">
	</form>
</main>