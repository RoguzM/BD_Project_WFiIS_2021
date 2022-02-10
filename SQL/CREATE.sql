CREATE TABLE Klient_dane_kontaktowe (
  nr_telefonu VARCHAR(15)  NOT NULL,
  Klient_id_Klient INTEGER  NOT NULL  ,
  adres_zameldowania VARCHAR(45)  NOT NULL  ,
  kod_pocztowy VARCHAR(10)  NOT NULL  ,
  kraj VARCHAR(45)  NOT NULL  ,
  email VARCHAR(45)  NOT NULL    ,
PRIMARY KEY(nr_telefonu));


CREATE TABLE Klient (
  id_Klient INTEGER  NOT NULL,
  imie VARCHAR(45)  NOT NULL ,
  nazwisko VARCHAR(45)  NOT NULL  ,
  pesel VARCHAR(11)  NOT NULL    ,
PRIMARY KEY(id_Klient));


CREATE TABLE Znizki (
  id_Znizki INTEGER  NOT NULL,
  Klient_id_Klient INTEGER  NOT NULL  ,
  rabat INTEGER NOT NULL    ,
PRIMARY KEY(id_Znizki));


CREATE TABLE Kary (
  id_Kary INTEGER  NOT NULL,
  Klient_id_Klient INTEGER  NOT NULL  ,
  naleznosc_kary INTEGER NOT NULL    ,
PRIMARY KEY(id_Kary)  );


CREATE TABLE Rezerwacja (
  id_Rezerwacja INTEGER  NOT NULL,
  Egzemplarz_nr_rejestracyjny VARCHAR(9)  NOT NULL  ,
  Uslugi_dodatkowe_id_Uslugi_dodatkowe INTEGER  NOT NULL  ,
  Klient_id_Klient INTEGER  NOT NULL  ,
  data_wynajem DATE NOT NULL  ,
  data_zwrot DATE NOT NULL    ,
PRIMARY KEY(id_Rezerwacja));


CREATE TABLE Uslugi_dodatkowe (
  id_Uslugi_dodatkowe INTEGER  NOT NULL,
  usluga VARCHAR(45) NOT NULL  ,
  opis VARCHAR NOT NULL    ,
  doplata INTEGER NOT NULL ,
PRIMARY KEY(id_Uslugi_dodatkowe));


CREATE TABLE Egzemplarz (
  nr_rejestracyjny VARCHAR(9)  NOT NULL  ,
  Auto_id_Auto INTEGER  NOT NULL    ,
PRIMARY KEY(nr_rejestracyjny));


CREATE TABLE Auto (
  id_Auto INTEGER  NOT NULL,
  Cennik_klasa VARCHAR(20)  NOT NULL,
  marka VARCHAR(45) NOT NULL  ,
  model VARCHAR(45) NOT NULL  ,
  rok_produkcji INTEGER  NULL  ,
  kolor VARCHAR(20) NOT NULL  ,
  silnik VARCHAR(20) NOT NULL ,
PRIMARY KEY(id_Auto));


CREATE TABLE Cennik (
  klasa VARCHAR(20)  NOT NULL,
  opis VARCHAR NOT NULL  ,
  cena_za_dobe INTEGER NOT NULL    ,
PRIMARY KEY(klasa));
