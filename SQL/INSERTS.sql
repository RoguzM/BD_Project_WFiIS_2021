INSERT INTO Cennik (klasa, opis, cena_za_dobe) VALUES ('A', 'Auta miejskie', 80);
INSERT INTO Cennik (klasa, opis, cena_za_dobe) VALUES ('B', 'Male auta', 100);
INSERT INTO Cennik (klasa, opis, cena_za_dobe) VALUES ('C', 'Auta typu SUV', 120);
INSERT INTO Cennik (klasa, opis, cena_za_dobe) VALUES ('D', 'Auta rodzinne', 160); 


INSERT INTO Auto (id_Auto, Cennik_klasa, marka, model, rok_produkcji, kolor, silnik) VALUES (1, 'A', 'Toyota', 'Yaris', 2013,
'bordowy', 'benzyna');

INSERT INTO Auto (id_Auto, Cennik_klasa, marka, model, rok_produkcji, kolor, silnik) VALUES (2, 'A', 'Hyundai', 'i20', 2015,
'granatowy', 'benzyna');

INSERT INTO Auto (id_Auto, Cennik_klasa, marka, model, rok_produkcji, kolor, silnik) VALUES (3, 'B', 'Opel', 'Meriva',
2014, 'czarny', 'benzyna');

INSERT INTO Auto (id_Auto, Cennik_klasa, marka, model, rok_produkcji, kolor, silnik) VALUES (4, 'B', 'Audi', 'A3',
2018, 'turkusowy', 'diesel');

INSERT INTO Auto (id_Auto, Cennik_klasa, marka, model, rok_produkcji, kolor, silnik) VALUES (5, 'C', 'Opel', 'Mokka',
2014, 'bialy', 'benzyna');

INSERT INTO Auto (id_Auto, Cennik_klasa, marka, model, rok_produkcji, kolor, silnik) VALUES (6, 'C', 'Volvo', 'XC60',
2017, 'czarny', 'diesel');

INSERT INTO Auto (id_Auto, Cennik_klasa, marka, model, rok_produkcji, kolor, silnik) VALUES (7, 'C', 'Hyundai', 'Tucson',
2013, 'grafitowy', 'benzyna');

INSERT INTO Auto (id_Auto, Cennik_klasa, marka, model, rok_produkcji, kolor, silnik) VALUES (8, 'D', 'Opel', 'Zafira',
2012, 'granatowy', 'diesel');

INSERT INTO Auto (id_Auto, Cennik_klasa, marka, model, rok_produkcji, kolor, silnik) VALUES (9, 'D', 'Peugeot', '508',
2011, 'srebrny', 'diesel');



INSERT INTO Egzemplarz (nr_rejestracyjny, Auto_id_Auto) VALUES ('WW 12556', 1);
INSERT INTO Egzemplarz (nr_rejestracyjny, Auto_id_Auto) VALUES ('WW 15665', 2);
INSERT INTO Egzemplarz (nr_rejestracyjny, Auto_id_Auto) VALUES ('WW 18882', 3);
INSERT INTO Egzemplarz (nr_rejestracyjny, Auto_id_Auto) VALUES ('WW 17727', 4);
INSERT INTO Egzemplarz (nr_rejestracyjny, Auto_id_Auto) VALUES ('WW 15555', 5);
INSERT INTO Egzemplarz (nr_rejestracyjny, Auto_id_Auto) VALUES ('WW 12121', 6);
INSERT INTO Egzemplarz (nr_rejestracyjny, Auto_id_Auto) VALUES ('WW 57582', 7);
INSERT INTO Egzemplarz (nr_rejestracyjny, Auto_id_Auto) VALUES ('WW 31321', 8);
INSERT INTO Egzemplarz (nr_rejestracyjny, Auto_id_Auto) VALUES ('WW 17892', 9);


INSERT INTO Uslugi_dodatkowe (id_Uslugi_dodatkowe, usluga, opis) VALUES (1, 'Podstawowa', 'Kamizelka odblaskowa, nawigacja
GPS', 0);

INSERT INTO Uslugi_dodatkowe (id_Uslugi_dodatkowe, usluga, opis) VALUES (2, 'Premium', 'Kamizelka odblaskowa, nawigacja GPS,
fotelik dzieciecy, bagaznik dachowy, uchwyty na rowery', 50);

INSERT INTO Uslugi_dodatkowe (id_Uslugi_dodatkowe, usluga, opis) VALUES (3, 'VIP', 'Kamizelka odblaskowa, nawigacja GPS,
fotelik dzieciecy, bagaznik dachowy, uchwyty na rowery, odtwarzacz DVD, dodatkowe ubezpieczenie', 100); 

INSERT INTO Uslugi_dodatkowe (id_Uslugi_dodatkowe, usluga, opis) VALUES (4, 'King', 'Szofer, pelne wyposazenie oraz wszelkie ubezpieczenia', 300);

