<h2>Deel 1 & Deel 2</h2>
<h3>Overzicht van de brouwers</h3>
<main>
	<?php if(isset($question)):?>
		<form action="." method="post">
			<span>
				<p>Bent u zeker dat u deze datarij wil verwijderen?</p>
				<input type="hidden" value="<?= $question?>" name="confirm">
				<input type="submit" value="Ja!" autofocus name="ja"><input type="submit" value="Neeeee!" name="nee">
			</span>
		</form>
	<?php endif;?>
	<?php if(isset($succes)):?>
		<span><?= $succes?></span>
	<?php endif;?>
	<table>
		<thead>
			<tr>
				<td>brouwernummer</td>
				<td>brouwernaam</td>
				<td>adres</td>
				<td>postcode</td>
				<td>gemeente</td>
				<td>omzet</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<form action="." method="post">
				<?php while ($brewer = $allBrewers->fetch(PDO::FETCH_ASSOC)):?>
				<tr<?php if(isset($question) && $question ===$brewer['brouwernr']):?> class="selected" <?php endif;?>>
					<td><?= $brewer['brouwernr']?></td>
					<td><?= $brewer['brnaam']?></td>
					<td><?= $brewer['adres']?></td>
					<td><?= $brewer['postcode']?></td>
					<td><?= $brewer['gemeente']?></td>
					<td><?= $brewer['omzet']?></td>
					<td><input type="image" src="delete.svg" alt="verwijder" name="delete" value="<?= $brewer['brouwernr']?>"></td>
				</tr>
				<?php endwhile;?>
			</form>
		</tbody>
	</table>
</main>