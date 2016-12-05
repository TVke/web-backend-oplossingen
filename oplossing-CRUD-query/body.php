<h2>Deel 1</h2>
<h3>Overzicht bieren</h3>
<main>
	<table>
		<thead>
			<tr>
				<td>#</td>
				<td>naam</td>
				<td>alcohol</td>
				<td>brouwer</td>
				<td>adres</td>
				<td>postcode</td>
				<td>gemeente</td>
				<td>omzet</td>
			</tr>
		</thead>
		<tbody>
			<?php while($bier=$biers->fetch(PDO::FETCH_ASSOC)):?>
				<tr>
					<td><?= $bier['biernr']?></td>
					<td><?= $bier['naam']?></td>
					<td><?= $bier['alcohol']?>%</td>
					<td><?= $bier['brnaam']?></td>
					<td><?= $bier['adres']?></td>
					<td><?= $bier['postcode']?></td>
					<td><?= $bier['gemeente']?></td>
					<td><?= $bier['omzet']?></td>
				</tr>
			<?php endwhile;?>
		</tbody>
	</table>
</main>
<h2>Deel 2</h2>
<h3>Formulier</h3>
<main>
	<form action="." method="get">
		<label for="brouwer">brouwer: </label>
		<select name="brouwerijen" id="brouwer">
			<?php if(isset($showBrouwer) && $_GET['brouwerijen']!=0):?>
			<option><?= $showBrouwer->fetch()[0]?></option>
			<?php endif;?>
			<option value="0"></option>
			<?php while ($brouwer=$brouwers->fetch(PDO::FETCH_ASSOC)):?>
			<option value="<?= $brouwer['brouwernr']?>"><?= $brouwer['brnaam']?></option>
			<?php endwhile;?>
		</select>
		<input type="submit" value="toon bieren">
	</form>
	<?php if(isset($showBiers) && $_GET['brouwerijen']!=0):?>
	<table>
		<thead>
			<tr>
				<td>bieren</td>
			</tr>
		</thead>
		<tbody>
		<?php while ($bierTabel=$showBiers->fetch(PDO::FETCH_ASSOC)):?>
			<tr>
				<td><?= $bierTabel['naam']?></td>
			</tr>
		<?php endwhile;?>
		</tbody>
	</table>
	<?php endif;?>
</main>