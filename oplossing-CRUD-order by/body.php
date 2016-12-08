<h2>Deel 1</h2>
<h3>Overzicht van bieren</h3>
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
				<td><a <?php if($biernrA):?>href="?col=biernr_DESC"<?php else:?>href="?col=biernr_ASC"<?php endif;?>>Biernummer<img src="asc.svg" <?php if($biernrA):?>class="asc" alt="van laag naar hoog"<?php else:?>class="desc" alt="van hoog naar laag"<?php endif;?>></a></td>
				<td><a <?php if($naamA):?>href="?col=naam_DESC"<?php else:?>href="?col=naam_ASC"<?php endif;?>>Bier<img src="asc.svg" <?php if($naamA):?>class="asc" alt="van laag naar hoog"<?php else:?>class="desc" alt="van hoog naar laag"<?php endif;?>></a></td>
				<td><a <?php if($brnaamA):?>href="?col=brnaam_DESC"<?php else:?>href="?col=brnaam_ASC"<?php endif;?>>Brouwer<img src="asc.svg" <?php if($brnaamA):?>class="asc" alt="van laag naar hoog"<?php else:?>class="desc" alt="van hoog naar laag"<?php endif;?>></a></td>
				<td><a <?php if($soortA):?>href="?col=soort_DESC"<?php else:?>href="?col=soort_ASC"<?php endif;?>>Soort<img src="asc.svg" <?php if($soortA):?>class="asc" alt="van laag naar hoog"<?php else:?>class="desc" alt="van hoog naar laag"<?php endif;?>></a></td>
				<td><a <?php if($alcoholA):?>href="?col=alcohol_DESC"<?php else:?>href="?col=alcohol_ASC"<?php endif;?>>Alcoholpercentage<img src="asc.svg" <?php if($alcoholA):?>class="asc" alt="van laag naar hoog"<?php else:?>class="desc" alt="van hoog naar laag"<?php endif;?>></a></td>
				<td></td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<form action="." method="post">
				<?php while ($bier = $allBiers->fetch(PDO::FETCH_ASSOC)):?>
				<tr<?php if(isset($question) && $question ===$bier['biernr']):?> class="selected" <?php endif;?>>
					<td><?= $bier['biernr']?></td>
					<td><?= $bier['naam']?></td>
					<td><?= $bier['brnaam']?></td>
					<td><?= $bier['soort']?></td>
					<td><?= $bier['alcohol']?>%</td>
					<td><input type="image" src="delete.svg" alt="verwijder" name="delete" value="<?= $bier['biernr']?>"></td>
					<td><input type="image" src="edit.svg" alt="wijzig" name="edit" class="edit" value="<?= $bier['biernr']?>"></td>
				</tr>
				<?php endwhile;?>
			</form>
		</tbody>
	</table>
</main>