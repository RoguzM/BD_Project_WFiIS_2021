<?php
require_once 'naglowek.php';
require_once 'polaczenie.php';
if($pdo != null)
{
    $zapytanie_klient ="SELECT id_klient, concat(nazwisko,' ',imie) as Klient FROM wypozyczalnia.klient ORDER BY nazwisko;";
    $wynik_klient = $pdo->query($zapytanie_klient);
    $rekordy_klient = $wynik_klient->fetchAll(PDO::FETCH_ASSOC);
    
}
?>
<div id="tresc">
<form method="post" action="zapisz_dane.php">
	<table>
		<!-- <tr>
			<td><label>Usługa</label></td>
			<td><input type="text" name="usluga" required></td>
		</tr>
		<tr>
			<td><label>Opis</label></td>
			<td><input type="text" name="opis" required></td>
		</tr> -->
		<tr>
			<td><label>Klient</label></td>
			<td>
				<select name="klient_id_klient" id="klient_id_klient">
				
				<?php 
				foreach ($rekordy_klient as $rekord) {
				    echo '<option value="'.$rekord['id_klient'].'">'.$rekord['klient'].'</option>';
				}
				?>
                </select>
			</td>
		</tr>
		
		
		</tr>
			<td><label>Cena [PLN]</label></td>
			<td><input type="number" name="rabat" value=0 required></td>
		<tr>
		<tr>
			<td></td>
			<td><input type="submit" value="DODAJ"><input type="reset" value="WYCZYŚĆ"></td>
			<input type="text" name="strona" value="form_znizki.php" hidden>
		</tr>
	</table>
</form>

<table><caption>Lista Zniżek</caption>
	<tr>
		<th>ID zniżki</th>
		<th>Klient</th>
		<th>Rabat [PLN]</th>
	</tr>

<?php


if($pdo != null)
{
    $zapytanie = 'SELECT id_znizki, klient_id_klient, k2.nazwisko ,k2.imie ,rabat FROM wypozyczalnia.znizki z inner join wypozyczalnia.klient k2 on z.klient_id_klient = k2.id_klient';
    $wynik = $pdo->query($zapytanie);
    $rekordy = $wynik->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rekordy as $rekord) {
        echo "<tr>";
        echo "<td>".$rekord['id_znizki'] . "</td>";
        echo "<td>". $rekord['nazwisko'] ." ".$rekord['imie']."</td>";
        echo "<td>". $rekord['rabat'] . "</td>";
        echo "</tr>";
    }
}
?>
</table>
</div>