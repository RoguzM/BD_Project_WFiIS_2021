<?php 
if(isset($_POST['strona']))
{
    require_once 'polaczenie.php';
    if($_POST['strona'] == 'form_kary.php')
    {
        if(!empty($_POST['klient_id_klient']) && $pdo != null) //dodanie nowego rekordu
        {
            
            
            $klient_id_klient = $_POST['klient_id_klient'];
            $naleznosc_kary = $_POST['naleznosc_kary'];
            $zapytanie_nowe_id = "select (max(id_kary) + 1) as nowe_id FROM wypozyczalnia.kary";
            //$zapytanie_insert = "INSERT INTO uslugi_dodatkowe (id_uslugi_dodatkowe, usluga, opis) VALUES((select max(id_uslugi_dodatkowe) + 1 FROM uslugi_dodatkowe), '$usluga', '$opis');";
            
            //echo $zapytanie_insert;
            try {
                
                $nowe_id_wynik = $pdo->query($zapytanie_nowe_id);
                $nowe_id_rekord = $nowe_id_wynik->fetchAll(PDO::FETCH_ASSOC);
                $nowe_id = $nowe_id_rekord[0]['nowe_id'];
                if($nowe_id == NULL) //zabezpieczenie dla pierwszego id
                    $nowe_id = 1;
                    $zapytanie_insert = "INSERT INTO wypozyczalnia.kary (id_kary, klient_id_klient, naleznosc_kary) VALUES($nowe_id, $klient_id_klient, $naleznosc_kary);";
                    $pdo->query($zapytanie_insert);
            } catch (PDOException $e) {
                //if($e->getCode() == '23505')
                //echo '<p class="error">Klasa o wartosci: '.$klasa.' już istnieje, wpis nie został dodany</p>';
                //else
                die($e->getMessage());
            }
            
            unset($_POST['klient_id_klient']);
            unset($_POST['naleznosc_kary']);
            header('location:form_kary.php');
            
        }
    }
    else if($_POST['strona'] == 'form_uslugi.php')
    {
        if(isset($_POST['usluga']) && isset($_POST['opis']) && $pdo != null) //dodanie nowego rekordu
        {
            
            
            $opis = $_POST['opis'];
            $usluga = $_POST['usluga'];
            $doplata = $_POST['doplata'];
            $zapytanie_insert = "INSERT INTO wypozyczalnia.uslugi_dodatkowe (id_uslugi_dodatkowe, usluga, opis, doplata) VALUES((select max(id_uslugi_dodatkowe) + 1 FROM wypozyczalnia.uslugi_dodatkowe), '$usluga', '$opis', $doplata);";
            //echo $zapytanie_insert;
            try {
                $pdo->query($zapytanie_insert);
            } catch (PDOException $e) {
                if($e->getCode() == '23505')
                echo '<p class="error">Klasa o wartosci: '.$usluga.' już istnieje, wpis nie został dodany</p>';
                else
                die($e->getMessage());
            }
            
            unset($_POST['id_uslugi_dodatkowe']);
            unset($_POST['usluga']);
            unset($_POST['opis']);
            unset($_POST['doplata']);
            header('location:form_uslugi.php');
        }
    }
    else if($_POST['strona'] == 'form_cennik.php')
    {
        if(isset($_POST['klasa']) && isset($_POST['opis']) && $pdo != null) //dodanie nowego rekordu
        {
            $klasa = $_POST['klasa'];
            $opis = $_POST['opis'];
            $cena_za_dobe = $_POST['cena'];
            $zapytanie_insert = "INSERT INTO wypozyczalnia.cennik (klasa, opis, cena_za_dobe) VALUES('$klasa', '$opis', $cena_za_dobe);";
            try {
                $pdo->query($zapytanie_insert);
            } catch (PDOException $e) {
                if($e->getCode() == '23505')
                    echo '<p class="error">Klasa o wartosci: '.$klasa.' już istnieje, wpis nie został dodany</p>';
                    else //print_r($e);
                        die($e->getMessage());
            }
            
            unset($_POST['klasa']);
            unset($_POST['opis']);
            unset($_POST['cena']);
            header('location:form_cennik.php');
        }
    }//dodanie nowej zniżki
    else if($_POST['strona'] == 'form_znizki.php')
    {
        if(!empty($_POST['klient_id_klient'])  && $pdo != null) //dodanie nowego rekordu
        {
            
            
            $klient_id_klient = $_POST['klient_id_klient'];
            $rabat = $_POST['rabat'];
            $zapytanie_nowe_id = "select (max(id_znizki) + 1) as nowe_id FROM wypozyczalnia.znizki";
            //$zapytanie_insert = "INSERT INTO uslugi_dodatkowe (id_uslugi_dodatkowe, usluga, opis) VALUES((select max(id_uslugi_dodatkowe) + 1 FROM uslugi_dodatkowe), '$usluga', '$opis');";
            
            //echo $zapytanie_insert;
            try {
                
                $nowe_id_wynik = $pdo->query($zapytanie_nowe_id);
                $nowe_id_rekord = $nowe_id_wynik->fetchAll(PDO::FETCH_ASSOC);
                $nowe_id = $nowe_id_rekord[0]['nowe_id'];
                if($nowe_id == NULL) //zabezpieczenie dla pierwszego id
                    $nowe_id = 1;
                    $zapytanie_insert = "INSERT INTO wypozyczalnia.znizki (id_znizki, klient_id_klient, rabat) VALUES($nowe_id, $klient_id_klient, $rabat);";
                    $pdo->query($zapytanie_insert);
            } catch (PDOException $e) {
                //if($e->getCode() == '23505')
                //echo '<p class="error">Klasa o wartosci: '.$klasa.' już istnieje, wpis nie został dodany</p>';
                //else
                die($e->getMessage());
            }
            
            unset($_POST['klient_id_klient']);
            unset($_POST['rabat']);
            header('location:form_znizki.php');
            
        }
    } //dodanie nowego auta
    else if($_POST['strona'] == 'form_auta.php')
    {
        if(!empty($_POST['cennik_klasa']) && $pdo != null) //dodanie nowego rekordu
        {
            
            
            $cennik_klasa = $_POST['cennik_klasa'];
            $marka = $_POST['marka'];
            $model = $_POST['model'];
            $rok_produkcji = $_POST['rok_produkcji'];
            $kolor = $_POST['kolor'];
            $silnik = $_POST['silnik'];
            $zapytanie_nowe_id = "select (max(id_auto) + 1) as nowe_id FROM wypozyczalnia.auto";
            
            try {
                
                $nowe_id_wynik = $pdo->query($zapytanie_nowe_id);
                $nowe_id_rekord = $nowe_id_wynik->fetchAll(PDO::FETCH_ASSOC);
                $nowe_id = $nowe_id_rekord[0]['nowe_id'];
                if($nowe_id == NULL) //zabezpieczenie dla pierwszego id
                    $nowe_id = 1;
                $zapytanie_insert = "INSERT INTO wypozyczalnia.auto (id_auto, cennik_klasa, marka, model, rok_produkcji, kolor, silnik) ".
                    " VALUES($nowe_id, '$cennik_klasa', '$marka', '$model', $rok_produkcji, '$kolor', '$silnik');";
                //echo $zapytanie_insert;
                    
                $pdo->query($zapytanie_insert);
            } catch (PDOException $e) {
                //echo $e->getMessage();
                die($e->getMessage());
            }
            
            unset($_POST['cennik_klasa']);
            unset($_POST['marka']);
            unset($_POST['model']);
            unset($_POST['rok_produkcji']);
            unset($_POST['kolor']);
            unset($_POST['silnik']);
            header('location:form_auta.php');
            
        }
    }
    else if($_POST['strona'] == 'form_klienci.php')
    {
        if($pdo != null) //dodanie nowego rekordu
        {
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $pesel = $_POST['pesel'];
            $nr_telefonu = $_POST['nr_telefonu'];
            $adres_zameldowania = $_POST['adres_zameldowania'];
            $nr_telefonu = $_POST['nr_telefonu'];
            $kod_pocztowy = $_POST['kod_pocztowy'];
            $kraj = $_POST['kraj'];
            $email = $_POST['email'];
            $zapytanie_nowe_id = "select (max(id_klient) + 1) as nowe_id FROM wypozyczalnia.klient";
            
            try {
                
                $nowe_id_wynik = $pdo->query($zapytanie_nowe_id);
                $nowe_id_rekord = $nowe_id_wynik->fetchAll(PDO::FETCH_ASSOC);
                $nowe_id = $nowe_id_rekord[0]['nowe_id'];
                if($nowe_id == NULL) //zabezpieczenie dla pierwszego id
                    $nowe_id = 1;
                    $zapytanie_insert = "INSERT INTO wypozyczalnia.klient (id_klient, imie, nazwisko, pesel) ".
                    " VALUES($nowe_id, '$imie', '$nazwisko', '$pesel');";
                    $pdo->query($zapytanie_insert);
                    //echo $zapytanie_insert;
                    
                    $zapytanie_insert2 = "INSERT INTO wypozyczalnia.klient_dane_kontaktowe (nr_telefonu, klient_id_klient, adres_zameldowania, kod_pocztowy, kraj, email) ".
                    " VALUES('$nr_telefonu', $nowe_id, '$adres_zameldowania', '$kod_pocztowy', '$kraj', '$email');";
                    
                    $pdo->query($zapytanie_insert2);
            } catch (PDOException $e) {
                //echo $e->getMessage();
                die($e->getMessage());
            }
            
            unset($_POST['imie']);
            unset($_POST['nazwisko']);
            unset($_POST['pesel']);
            unset($_POST['nr_telefonu']);
            unset($_POST['adres_zameldowania']);
            unset($_POST['nr_telefonu']);
            unset($_POST['kraj']);
            unset($_POST['email']);
            header('location:form_klienci.php');
            
        }
    }//INSERT INTO public.egzemplarz     (nr_rejestracyjny, auto_id_auto) VALUES('', 0);
    else if($_POST['strona'] == 'form_egzemplarze.php')
    {
        if(!empty($_POST['nr_rejestracyjny']) && !empty($_POST['auto_id_auto']) && $pdo != null) //dodanie nowego rekordu
        {
            
            
            $auto_id_auto = $_POST['auto_id_auto'];
            $nr_rejestracyjny = $_POST['nr_rejestracyjny'];
            
            //echo $zapytanie_insert;
            try {
                
                
                $zapytanie_insert = "INSERT INTO wypozyczalnia.egzemplarz (nr_rejestracyjny, auto_id_auto) VALUES('$nr_rejestracyjny', $auto_id_auto);";
                    $pdo->query($zapytanie_insert);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
            
            unset($_POST['auto_id_auto']);
            unset($_POST['nr_rejestracyjny']);
            header('location:form_egzemplarze.php');
            
        }
    }
    else if($_POST['strona'] == 'form_rezerwacje.php')
    {
        if($pdo != null) //dodanie nowego rekordu
        {
            
            
            $id_klient = $_POST['id_klient'];
            $nr_rejestracyjny = $_POST['nr_rejestracyjny'];
            $id_uslugi_dodatkowe = $_POST['id_uslugi_dodatkowe'];
            $data_wynajem = $_POST['data_wynajem'];
            $data_zwrot = $_POST['data_zwrot'];
            $zapytanie_nowe_id = "select (max(id_rezerwacja) + 1) as nowe_id FROM wypozyczalnia.rezerwacja";
            //echo $zapytanie_insert;
            try {
                
                $nowe_id_wynik = $pdo->query($zapytanie_nowe_id);
                $nowe_id_rekord = $nowe_id_wynik->fetchAll(PDO::FETCH_ASSOC);
                $nowe_id = $nowe_id_rekord[0]['nowe_id'];
                if($nowe_id == NULL) //zabezpieczenie dla pierwszego id
                    $nowe_id = 1;
                $zapytanie_insert = "INSERT INTO wypozyczalnia.rezerwacja ".
                " (id_rezerwacja, egzemplarz_nr_rejestracyjny, uslugi_dodatkowe_id_uslugi_dodatkowe, klient_id_klient, data_wynajem, data_zwrot) ".
                " VALUES($nowe_id, '$nr_rejestracyjny',$id_uslugi_dodatkowe,  $id_klient, '$data_wynajem', '$data_zwrot');";
                $pdo->query($zapytanie_insert);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
            
            header('location:form_rezerwacje.php');
            
        }
    }
    
}


?>