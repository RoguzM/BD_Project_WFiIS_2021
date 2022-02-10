<?php
require_once 'naglowek.php';
require_once 'polaczenie.php';
?>
<div id="tresc">
<form method="post" action="zapisz_dane.php">
	<table>
		<tr>
			<td><label>Imię</label></td>
			<td><input type="text" name="imie" required></td>
		</tr>
		<tr>
			<td><label>Nazwisko</label></td>
			<td><input type="text" name="nazwisko" required></td>
		</tr>
		
		</tr>
			<td><label>PESEL</label></td>
			<td><input type="text" name="pesel" required></td>
		<tr>
		<tr>
			<td><label>Nr telefonu</label></td>
			<td><input type="text" name="nr_telefonu" required></td>
		</tr>
		<tr>
			<td><label>Adres zameldowania</label></td>
			<td><input type="text" name="adres_zameldowania" required></td>
		</tr>
		<tr>
			<td><label>Kod pocztowy</label></td>
			<td><input type="text" name="kod_pocztowy" required></td>
		</tr>
		<tr>
			<td><label>Kraj</label></td>
			<td><input type="text" name="kraj" required></td>
		</tr>
		<tr>
			<td><label>Email</label></td>
			<td><input type="text" name="email" required></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="DODAJ"><input type="reset" value="WYCZYŚĆ"></td>
			<input type="text" name="strona" value="form_klienci.php" hidden>
		</tr>
	</table>
</form>

<table><caption>Lista Klienci</caption>
	<tr>
		<th>Id klienta</th>
		<th>Imię</th>
		<th>Nazwisko</th>
		<th>PESEL</th>
		<th>Nr telefonu</th>
		<th>Adres zameldowania</th>
		<th>Kod pocztowy</th>
		<th>Kraj</th>
		<th>email</th>
	</tr>

<?php


if($pdo != null)
{
    $zapytanie = 'select k.id_klient ,k.imie ,k.nazwisko ,k.pesel ,kdk.adres_zameldowania ,kdk.email ,kdk.kod_pocztowy ,kdk.kraj ,kdk.nr_telefonu 
from wypozyczalnia.klient k  left outer join wypozyczalnia.klient_dane_kontaktowe kdk on k.id_klient = kdk.klient_id_klient ;';
    $wynik = $pdo->query($zapytanie);
    $rekordy = $wynik->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rekordy as $rekord) {
        echo "<tr>";
        echo "<td>".$rekord['id_klient'] . "</td>";
        echo "<td>". $rekord['imie'] ."</td>";
        echo "<td>". $rekord['nazwisko'] . "</td>";
        echo "<td>". $rekord['pesel'] . "</td>";
        echo "<td>". $rekord['nr_telefonu'] . "</td>";
        echo "<td>". $rekord['adres_zameldowania'] . "</td>";
        echo "<td>". $rekord['kod_pocztowy'] . "</td>";
        echo "<td>". $rekord['kraj'] . "</td>";
        echo "<td>". $rekord['email'] . "</td>";
        echo "</tr>";
    }
}
?>
</table>
</div>