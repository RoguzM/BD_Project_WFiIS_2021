<?php
require_once 'naglowek.php';
?>
<table><caption>Podsumowanie i rozliczenia</caption>
	<tr>
		<th>Imię</th>
		<th>Nazwisko</th>
		<th>Marka</th>
		<th>Model</th>
		<th>Uslugi</th>
   <th>Wynajem</th>
   <th>Zwrot</th>
   <th>Opłata podstawowa [PLN]</th>
   <th>Należność końcowa [PLN]</th>
	</tr>

<?php
require_once 'polaczenie.php';
if($pdo != null)
{
    $zapytanie = 'SELECT "Imie", "Nazwisko", "Marka", "Model", "Uslugi", "Wynajem", "Zwrot", "Cena", "Final" FROM wypozyczalnia.wszystkie_rezerwacje;';
    $wynik = $pdo->query($zapytanie);
    $rekordy = $wynik->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rekordy as $rekord) {
        echo "<tr>";
        echo "<td>".$rekord['Imie'] . "</td>";
        echo "<td>". $rekord['Nazwisko'] . "</td>";
        echo "<td>". $rekord['Marka'] . "</td>";
        echo "<td>". $rekord['Model'] . "</td>";
        echo "<td>". $rekord['Uslugi'] . "</td>";
        echo "<td>". $rekord['Wynajem'] . "</td>";
        echo "<td>". $rekord['Zwrot'] . "</td>";
        echo "<td>". $rekord['Cena'] . "</td>";
        echo "<td>". $rekord['Final'] . "</td>";
        echo "</tr>";
    }
}
?>
</table>