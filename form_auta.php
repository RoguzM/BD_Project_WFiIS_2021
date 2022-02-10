<?php
require_once 'naglowek.php';
require_once 'polaczenie.php';
if($pdo != null)
{
    $zapytanie = 'SELECT klasa, opis, cena_za_dobe FROM wypozyczalnia.cennik;';
    $wynik = $pdo->query($zapytanie);
    $rekordy_cennik = $wynik->fetchAll(PDO::FETCH_ASSOC);
    
}
?>
<div id="tresc">
<form method="post" action="zapisz_dane.php">
	<table>
		
		<tr>
			<td><label>Klasa</label></td>
			<td>
				<select name="cennik_klasa" id="klasa">
				
				<?php 
				foreach ($rekordy_cennik as $rekord) {
				    echo '<option value="'.$rekord['klasa'].'">'.$rekord['opis'].', cena za dobę '.$rekord['cena_za_dobe'].' PLN</option>';
				}
				?>
                </select>
			</td>
		</tr>
		<tr>
			<td><label>Marka</label></td>
			<td><input type="text" name="marka" required></td>
		</tr>
		<tr>
			<td><label>Model</label></td>
			<td><input type="text" name="model" required></td>
		</tr>
		
		</tr>
			<td><label>Rok produkcji</label></td>
			<td><input type="number" name="rok_produkcji" value=2020 required></td>
		<tr>
		<tr>
			<td><label>Kolor</label></td>
			<td><input type="text" name="kolor" required></td>
		</tr>
		<tr>
			<td><label>Silnik</label></td>
			<td>
    			<label for="Benzyna">Benzyna</label><input type="radio" name="silnik" value="benzyna" id="Benzyna" required checked>
    			<label for="Diesel">Diesel</label><input type="radio" name="silnik" value="diesel" id="Diesel" required>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="DODAJ"><input type="reset" value="WYCZYŚĆ"></td>
			<input type="text" name="strona" value="form_auta.php" hidden>
		</tr>
	</table>
</form>

<table><caption>Lista Aut</caption>
	<tr>
		<th>Id auto</th>
		<th>Klasa</th>
		<th>Marka</th>
		<th>Model</th>
		<th>Rok produkcji</th>
		<th>Kolor</th>
		<th>Silnik</th>
	</tr>

<?php


if($pdo != null)
{
    $zapytanie = 'SELECT id_auto, cennik_klasa, marka, model, rok_produkcji, kolor, silnik FROM wypozyczalnia.auto;';
    $wynik = $pdo->query($zapytanie);
    $rekordy = $wynik->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rekordy as $rekord) {
        echo "<tr>";
        echo "<td>".$rekord['id_auto'] . "</td>";
        echo "<td>". $rekord['cennik_klasa'] ."</td>";
        echo "<td>". $rekord['marka'] . "</td>";
        echo "<td>". $rekord['model'] . "</td>";
        echo "<td>". $rekord['rok_produkcji'] . "</td>";
        echo "<td>". $rekord['kolor'] . "</td>";
        echo "<td>". $rekord['silnik'] . "</td>";
        echo "</tr>";
    }
}
?>
</table>
</div>