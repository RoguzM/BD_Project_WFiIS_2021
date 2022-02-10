ALTER TABLE Auto ADD FOREIGN KEY (Cennik_klasa) REFERENCES Cennik(klasa)
 ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE Egzemplarz ADD FOREIGN KEY (Auto_id_Auto) REFERENCES
Auto(id_Auto)
 ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE Klient_dane_kontaktowe ADD FOREIGN KEY (Klient_id_Klient) REFERENCES Klient(id_Klient)
 ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE Rezerwacja ADD FOREIGN KEY (Klient_id_Klient) REFERENCES Klient(id_Klient)
 ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE Rezerwacja ADD FOREIGN KEY (Egzemplarz_nr_rejestracyjny) REFERENCES
Egzemplarz(nr_rejestracyjny)
 ON UPDATE CASCADE; 

ALTER TABLE Rezerwacja ADD FOREIGN KEY (Uslugi_dodatkowe_id_Uslugi_dodatkowe) REFERENCES
Uslugi_dodatkowe(id_Uslugi_dodatkowe)
 ON UPDATE CASCADE; 

ALTER TABLE Znizki ADD FOREIGN KEY (Klient_id_Klient) REFERENCES Klient(id_Klient);

ALTER TABLE Kary ADD FOREIGN KEY (Klient_id_Klient) REFERENCES Klient(id_Klient);