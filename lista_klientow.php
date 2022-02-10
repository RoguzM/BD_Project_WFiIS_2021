<?php
require_once 'naglowek.php';
?>
<table><caption>Lista Klientów</caption>
	<tr>
		<th>Imie</th>
		<th>Nazwisko</th>
		<th>Numer</th>
		<th>Email</th>
	</tr>

<?php
require_once 'polaczenie.php';
if($pdo != null)
{
    $zapytanie = 'SELECT "Nazwisko", "Imie", "Numer", "Email" FROM wypozyczalnia.kontakt_klient;';
    $wynik = $pdo->query($zapytanie);
    $rekordy = $wynik->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rekordy as $rekord) {
        echo "<tr>";
        echo "<td>".$rekord['Imie'] . "</td>";
        echo "<td>". $rekord['Nazwisko'] . "</td>";
        echo "<td>". $rekord['Numer'] . "</td>";
        echo "<td>". $rekord['Email'] . "</td>";
        echo "</tr>";
    }
}
?>
</table>