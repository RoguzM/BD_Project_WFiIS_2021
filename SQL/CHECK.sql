ALTER TABLE Klient ADD CHECK (pesel ~ '^[0-9]*$');
ALTER TABLE Klient ADD CHECK (length(pesel) IN (11));
ALTER TABLE Klient_dane_kontaktowe ADD CHECK (length(nr_telefonu) IN (9));
ALTER TABLE klient_dane_kontaktowe ADD CHECK (kod_pocztowy ~ '^[0-9]{2}-[0-9]{3}$');
ALTER TABLE klient_dane_kontaktowe ADD CHECK (email ~ '^[a-z\d]+[\w\d.-]*@(?:[a-z\d]+[a-z\d-]+\.){1,5}[a-z]{2,6}$');
ALTER TABLE Auto ADD CHECK (silnik IN ('benzyna', 'diesel'));

