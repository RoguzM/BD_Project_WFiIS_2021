CREATE VIEW Wszystkie_rezerwacje AS(
 SELECT k.imie AS "Imie", k.nazwisko AS "Nazwisko", s.marka AS "Marka", s.model AS "Model",
pu.opis AS "Uslugi", w.data_wynajem AS "Wynajem", w.data_zwrot AS "Zwrot", (w.data_zwrot - w.data_wynajem) * ce.cena_za_dobe AS "Cena", (w.data_zwrot - w.data_wynajem) * ce.cena_za_dobe + ka.naleznosc_kary - zn.rabat + pu.doplata AS "Final"
 FROM Klient AS k, Rezerwacja AS w, Egzemplarz AS se, Auto AS s, Uslugi_dodatkowe AS pu, Cennik AS ce, kary AS ka, znizki AS zn
 WHERE k.id_Klient=w.Klient_id_Klient AND w.Egzemplarz_nr_rejestracyjny=se.nr_rejestracyjny AND
se.Auto_id_Auto=s.id_Auto AND ce.klasa = s.Cennik_klasa AND w.Uslugi_dodatkowe_id_Uslugi_dodatkowe=pu.id_Uslugi_dodatkowe AND k.id_klient = ka.klient_id_klient AND k.id_klient = zn.klient_id_klient
 ORDER BY w.data_wynajem
); 


CREATE VIEW Wszystkie_auta AS(
 SELECT se.nr_rejestracyjny AS "Numer Rejestracyjny", s.marka AS "Marka", s.model AS Model,
s.rok_produkcji AS "Rocznik", s.Cennik_klasa AS "Klasa", s.kolor AS "Kolor", s.silnik AS "Silnik"
 FROM Egzemplarz AS se, Auto AS s
 WHERE se.Auto_id_Auto=s.id_Auto
 ORDER BY se.nr_rejestracyjny
); 


CREATE VIEW Kontakt_klient AS(
 SELECT k.nazwisko AS "Nazwisko", k.imie AS "Imie", t.nr_telefonu AS "Numer", t.email AS "Email"
 FROM Klient AS k, Klient_dane_kontaktowe AS t
 WHERE k.id_Klient=t.Klient_id_Klient
 ORDER BY k.nazwisko
); 
