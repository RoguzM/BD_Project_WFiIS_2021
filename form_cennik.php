<?php
require_once 'naglowek.php';
?>
<div id="tresc">
<form method="post" action="zapisz_dane.php">
	<table>
		<tr>
			<td><label>Klasa</label></td>
			<td><input type="text" name="klasa" required></td>
		</tr>
		<tr>
			<td><label>Opis</label></td>
			<td><input type="text" name="opis" required></td>
		</tr>
		<tr>
			<td><label>Cena za dobę [PLN]</label></td>
			<td><input type="number" name="cena" value=0 required></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="DODAJ"><input type="reset" value="WYCZYŚĆ"></td>
			<input type="text" name="strona" value="form_cennik.php" hidden>
		</tr>
	</table>
</form>

<table><caption>Cennik</caption>
	<tr>
		<th>Klasa</th>
		<th>Opis</th>
		<th>Cena za dobę [PLN]</th>
	</tr>

<?php
require_once 'polaczenie.php';

if($pdo != null)
{
    $zapytanie = 'SELECT klasa, opis, cena_za_dobe FROM wypozyczalnia.cennik;';
    $wynik = $pdo->query($zapytanie);
    $rekordy = $wynik->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rekordy as $rekord) {
        echo "<tr>";
        echo "<td>".$rekord['klasa'] . "</td>";
        echo "<td>". $rekord['opis'] . "</td>";
        echo "<td>". $rekord['cena_za_dobe'] . "</td>";
        echo "</tr>";
    }
}
?>
</table>
</div>