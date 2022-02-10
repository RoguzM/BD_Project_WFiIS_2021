<?php
require_once 'naglowek.php';
?>
<div id="tresc">

<table><caption>Statystyki rozliczenia końcowego wypożyczalni (część zaokrąglona)</caption>
	<tr>
		<th>Suma należności [PLN]</th>
		<th>Średnia należność~ [PLN]</th>
		<th>Najwyższa należność [PLN]</th>
		<th>Najniższa należność [PLN]</th>
   <th>Wariancja~ [PLN]</th>
		<th>Odchylenie standardowe~ [PLN]</th>
	</tr>

<?php
require_once 'polaczenie.php';

if($pdo != null)
{
    $zapytanie = 'select   sum((r.data_zwrot - r.data_wynajem) * ce.cena_za_dobe + kar.naleznosc_kary - znn.rabat + usd.doplata) as suma, round(avg((r.data_zwrot - r.data_wynajem) * ce.cena_za_dobe + kar.naleznosc_kary - znn.rabat + usd.doplata),2) as srednia, max((r.data_zwrot - r.data_wynajem) * ce.cena_za_dobe + kar.naleznosc_kary - znn.rabat + usd.doplata) as maximum, min((r.data_zwrot - r.data_wynajem) * ce.cena_za_dobe + kar.naleznosc_kary - znn.rabat + usd.doplata) as minimum, round(variance((r.data_zwrot - r.data_wynajem) * ce.cena_za_dobe + kar.naleznosc_kary - znn.rabat + usd.doplata), 2) as wariancja, round(stddev((r.data_zwrot - r.data_wynajem) * ce.cena_za_dobe + kar.naleznosc_kary - znn.rabat + usd.doplata), 2) as std_odchylenie  from (((((((wypozyczalnia.cennik as ce join wypozyczalnia.auto as au on ce.klasa = au.cennik_klasa) join wypozyczalnia.egzemplarz as e on au.id_auto = e.auto_id_auto) join wypozyczalnia.rezerwacja as r on r.egzemplarz_nr_rejestracyjny = e.nr_rejestracyjny) join wypozyczalnia.klient as kl on kl.id_klient = r.klient_id_klient) join wypozyczalnia.znizki as znn on znn.klient_id_klient = kl.id_klient) join wypozyczalnia.kary as kar on kar.klient_id_klient = kl.id_klient) join wypozyczalnia.uslugi_dodatkowe as usd on usd.id_uslugi_dodatkowe = r.uslugi_dodatkowe_id_uslugi_dodatkowe);';
    $wynik = $pdo->query($zapytanie);
    $rekordy = $wynik->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rekordy as $rekord) {
        echo "<tr>";
        echo "<td>".$rekord['suma'] . "</td>";
        echo "<td>". $rekord['srednia'] . "</td>";
        echo "<td>". $rekord['maximum'] . "</td>";
        echo "<td>". $rekord['minimum'] . "</td>";
        echo "<td>". $rekord['wariancja'] . "</td>";
        echo "<td>". $rekord['std_odchylenie'] . "</td>";
        echo "</tr>";
    }
}
?>
</table>
</div>