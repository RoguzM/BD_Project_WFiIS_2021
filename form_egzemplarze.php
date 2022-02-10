<?php
require_once 'naglowek.php';
require_once 'polaczenie.php';
if($pdo != null)
{
    $zapytanie_auta ="SELECT id_auto, concat(cennik_klasa,' ', marka,' ', model,' ', rok_produkcji,' ', kolor,' ', silnik) as auto ".
    " FROM wypozyczalnia.auto ORDER BY marka, model, rok_produkcji;";
    $wynik_auta = $pdo->query($zapytanie_auta);
    $rekordy_auta = $wynik_auta->fetchAll(PDO::FETCH_ASSOC);
    
}
?>
<div id="tresc">
<form method="post" action="zapisz_dane.php">
	<table>
		<tr>
			<td><label>Nr rejestracyjny</label></td>
			<td><input type="text" name="nr_rejestracyjny" required></td>
		</tr>
		<tr>
			<td><label>Auto</label></td>
			<td>
				<select name="auto_id_auto" id="auto_id_auto">
				
				<?php 
				foreach ($rekordy_auta as $rekord) {
				    echo '<option value="'.$rekord['id_auto'].'">'.$rekord['auto'].'</option>';
				}
				?>
                </select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="DODAJ"><input type="reset" value="WYCZYŚĆ"></td>
			<input type="text" name="strona" value="form_egzemplarze.php" hidden>
		</tr>
	</table>
</form>

<table><caption>Lista Egzemplarzy</caption>
	<tr>
		<th>Nr rejestracyjny</th>
		<th>Auto</th>
	</tr>

<?php


if($pdo != null)
{
    $zapytanie = "SELECT e.nr_rejestracyjny , concat(cennik_klasa,' ', marka,' ', model,' ', rok_produkcji,' ', kolor,' ', silnik) as auto ".
    " FROM wypozyczalnia.auto a inner join wypozyczalnia.egzemplarz e on a.id_auto = e.auto_id_auto ;";
    $wynik = $pdo->query($zapytanie);
    $rekordy = $wynik->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rekordy as $rekord) {
        echo "<tr>";
        echo "<td>".$rekord['nr_rejestracyjny'] . "</td>";
        echo "<td>". $rekord['auto'] ."</td>";
         echo "</tr>";
    }
}
?>
</table>
</div>