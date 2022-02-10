CREATE OR REPLACE FUNCTION wiek_klienta() RETURNS TRIGGER AS '
BEGIN
 IF substring(NEW.pesel from 1 for 2)>''04'' AND substring(NEW.pesel from 1 for 2)<''22'' THEN
 RAISE EXCEPTION ''Wymagane 18 lat by wypozyczyc auto!'';
 END IF;
 RETURN NEW;
END;
' LANGUAGE 'plpgsql';
CREATE TRIGGER wiek_klienta BEFORE INSERT OR UPDATE ON Klient
 FOR EACH ROW EXECUTE PROCEDURE wiek_klienta();


CREATE OR REPLACE FUNCTION rocznik_auta() RETURNS TRIGGER AS '
BEGIN
 IF NEW.rok_produkcji<2010 THEN
 RAISE EXCEPTION ''Wprowadz auto z rocznika 2011 lub nowsze!'';
 END IF;
 RETURN NEW;
END;
' LANGUAGE 'plpgsql';
CREATE TRIGGER rocznik_auta BEFORE INSERT OR UPDATE ON Auto
 FOR EACH ROW EXECUTE PROCEDURE rocznik_auta(); 
