<?php
require_once 'naglowek.php';
?>
<table><caption>Lista Aut</caption>
	<tr>
		<th>Numer Rejestracyjny</th>
		<th>Marka</th>
		<th>Model</th>
		<th>Rocznik</th>
		<th>Klasa</th>
    <th>Kolor</th>
    <th>Silnik</th>
	</tr>

<?php
require_once 'polaczenie.php';
if($pdo != null)
{
    $zapytanie = 'SELECT "Numer Rejestracyjny", "Marka", model, "Rocznik", "Klasa", "Kolor", "Silnik" FROM wypozyczalnia.wszystkie_auta;';
    $wynik = $pdo->query($zapytanie);
    $rekordy = $wynik->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rekordy as $rekord) {
        echo "<tr>";
        echo "<td>".$rekord['Numer Rejestracyjny'] . "</td>";
        echo "<td>". $rekord['Marka'] . "</td>";
        echo "<td>". $rekord['model'] . "</td>";
        echo "<td>". $rekord['Rocznik'] . "</td>";
        echo "<td>". $rekord['Klasa'] . "</td>";
        echo "<td>". $rekord['Kolor'] . "</td>";
        echo "<td>". $rekord['Silnik'] . "</td>";
        echo "</tr>";
    }
}
?>
</table>