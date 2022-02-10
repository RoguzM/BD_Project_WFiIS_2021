<?php
require_once 'naglowek.php';
require_once 'polaczenie.php';
if($pdo != null)
{
    $zapytanie_klient ="SELECT id_klient, concat(nazwisko,' ',imie) as Klient2 FROM wypozyczalnia.klient ORDER BY nazwisko;";
    $wynik_klient = $pdo->query($zapytanie_klient);
    $rekordy_klient = $wynik_klient->fetchAll(PDO::FETCH_ASSOC);
     
    $zapytanie_egzemplarze ="SELECT e.nr_rejestracyjny , concat(cennik_klasa,' ', marka,' ', model,' ', rok_produkcji,' ', kolor,' ', silnik) as auto
    FROM wypozyczalnia.auto a inner join wypozyczalnia.egzemplarz e on a.id_auto = e.auto_id_auto ;";
    $wynik_egzemplarze = $pdo->query($zapytanie_egzemplarze);
    $rekordy_egzemplarze = $wynik_egzemplarze->fetchAll(PDO::FETCH_ASSOC);
    
    $zapytanie_uslugi = "SELECT id_uslugi_dodatkowe, CONCAT(usluga,' ',opis) as usluga FROM wypozyczalnia.uslugi_dodatkowe;";
    $wynik_uslugi = $pdo->query($zapytanie_uslugi);
    $rekordy_uslugi = $wynik_uslugi->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div id="tresc">
<form method="post" action="zapisz_dane.php">
	<table>
		<tr>
			<td><label>Egzemplarz</label></td>
			<td>
				<select name="nr_rejestracyjny" id="nr_rejestracyjny">
				
				<?php 
				foreach ($rekordy_egzemplarze as $rekord) {
				    echo '<option value="'.$rekord['nr_rejestracyjny'].'">'.$rekord['nr_rejestracyjny'].' - '.$rekord['auto'].'</option>';
				}
				?>
                </select>
			</td>
		</tr>
		<tr>
			<td><label>Klient</label></td>
			<td>
				<select name="id_klient" id="id_klient">
				
				<?php 
				foreach ($rekordy_klient as $rekord) {
				    echo '<option value="'.$rekord['id_klient'].'">'.$rekord['klient2'].'</option>';
				}
				?>
                </select>
			</td>
		</tr>
		<tr>
			<td><label>Usługi</label></td>
			<td>
				<select name="id_uslugi_dodatkowe" id="id_uslugi_dodatkowe">
				
				<?php 
				foreach ($rekordy_uslugi as $rekord) {
				    echo '<option value="'.$rekord['id_uslugi_dodatkowe'].'">'.$rekord['usluga'].'</option>';
				}
				?>
                </select>
			</td>
		</tr>
		</tr>
			<td><label>Wynajem</label></td>
			<td><input type="date" name="data_wynajem" required></td>
		<tr>
		</tr>
			<td><label>Zwrot</label></td>
			<td><input type="date" name="data_zwrot"  required></td>
		<tr>
		<tr>
			<td></td>
			<td><input type="submit" value="DODAJ"><input type="reset" value="WYCZYŚĆ"></td>
			<input type="text" name="strona" value="form_rezerwacje.php" hidden>
		</tr>
	</table>
</form>

<table><caption>Lista Rezerwacje</caption>
	<tr>
		<th>Data wynajmu</th>
		<th>Data zwrotu</th>
		<th>Egzemplarz</th>
		<th>Klient</th>
		<th>Usługa</th>
	</tr>

<?php


if($pdo != null)
{
    $zapytanie = "select r.data_wynajem , r.data_zwrot , concat(nazwisko,' ',imie) as klientdane, egzemplarz_nr_rejestracyjny, ud.usluga ".
    " FROM wypozyczalnia.rezerwacja r inner join wypozyczalnia.klient k on r.klient_id_klient = k.id_klient ".
    " inner join wypozyczalnia.uslugi_dodatkowe ud on r.uslugi_dodatkowe_id_uslugi_dodatkowe = ud.id_uslugi_dodatkowe ".
    " ORDER BY r.data_wynajem , r.data_zwrot ;";
    $wynik = $pdo->query($zapytanie);
    $rekordy = $wynik->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rekordy as $rekord) {
        echo "<tr>";
        echo "<td>".$rekord['data_wynajem'] . "</td>";
        echo "<td>". $rekord['data_zwrot'] ."</td>";
        echo "<td>". $rekord['egzemplarz_nr_rejestracyjny'] ."</td>";
        echo "<td>". $rekord['klientdane'] ."</td>";
        echo "<td>". $rekord['usluga'] ."</td>";
         echo "</tr>";
    }
}
?>
</table>
</div>