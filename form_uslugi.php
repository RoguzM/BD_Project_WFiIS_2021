<?php
require_once 'naglowek.php';
?>
<div id="tresc">
<form method="post" action="zapisz_dane.php">
	<table>
		<tr>
			<td><label>Usługa</label></td>
			<td><input type="text" name="usluga" required></td>
		</tr>
		<tr>
			<td><label>Opis</label></td>
			<td><input type="text" name="opis" required></td>
		</tr>
		<tr>
			<td><label>Doplata</label></td>
			<td><input type="number" name="doplata" value=0 required></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="DODAJ"><input type="reset" value="WYCZYŚĆ"></td>
			<input type="text" name="strona" value="form_uslugi.php" hidden>
		</tr>
	</table>
</form>

<table><caption>Lista Usług</caption>
	<tr>
		<th>Id usługi</th>
		<th>Usluga</th>
		<th>Opis</th>
   <th>Dopłata [PLN]</th>
	</tr>

<?php
require_once 'polaczenie.php';

if($pdo != null)
{
    $zapytanie = 'SELECT id_uslugi_dodatkowe, usluga, opis, doplata FROM wypozyczalnia.uslugi_dodatkowe;';
    $wynik = $pdo->query($zapytanie);
    $rekordy = $wynik->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rekordy as $rekord) {
        echo "<tr>";
        echo "<td>".$rekord['id_uslugi_dodatkowe'] . "</td>";
        echo "<td>". $rekord['usluga'] . "</td>";
        echo "<td>". $rekord['opis'] . "</td>";
        echo "<td>". $rekord['doplata'] . "</td>";
        echo "</tr>";
    }
}
?>
</table>
</div>