CREATE DATABASE autoberles DEFAULT CHARACTER SET UTF8 COLLATE utf8_hungarian_ci;

CREATE TABLE berlok (
   id INT AUTO_INCREMENT,
   nev VARCHAR(100) NOT NULL,
   jogositvany VARCHAR(15) NOT NULL,
   telefonszam VARCHAR(20),
   PRIMARY KEY (id)
);

CREATE TABLE autok (
    id INT AUTO_INCREMENT,
    rendszam VARCHAR(6) NOT NULL UNIQUE,
    tipus VARCHAR(100) NOT NULL,
    evjarat INT,
    szin VARCHAR(30),
    
    PRIMARY KEY(id)
);


CREATE TABLE kolcsonzes (
    id INT AUTO_INCREMENT,
    berloid INT,
    autoid INT,
    berletkezdete DATE NOT NULL,
    napokszama INT,
    napidij NUMERIC NOT NULL,
    
    PRIMARY KEY(id),
    FOREIGN KEY (berloid) REFERENCES 	 berlok(id),
    FOREIGN KEY (autoid) REFERENCES 	 autok(id)
);

INSERT INTO autok (rendszam, tipus, evjarat, szin)
VALUES ("ABC456", "Ford Ka", 2003, "Pink");

INSERT INTO autok(rendszam, tipus, evjarat, szin)
VALUES("ABC123", "Volkswagen Golf", 2011, "Fehér");

INSERT INTO autok(rendszam, tipus, evjarat, szin)
VALUES("ABC157", "Ford Mondeo", 2015, "Fekete");

INSERT INTO autok(rendszam, tipus, evjarat, szin)
VALUES("ABC448", "Volkswagen Golf", 2012, "Kék");

INSERT INTO berlok(nev, berlok.jogositvany, berlok.telefonszam)
VALUES("Kandúr Károly", "LR337157", "06-41-334112");

INSERT INTO berlok(nev, berlok.jogositvany, berlok.telefonszam)
VALUES("Kandúr Károly", "LR337157", "06-41-334112");

INSERT INTO kolcsonzes (kolcsonzes.berloid, kolcsonzes.autoid, kolcsonzes.berletkezdete, kolcsonzes.napidij)
VALUES (1, 3, '2017-04-23', 12500);

INSERT INTO kolcsonzes (kolcsonzes.berloid, kolcsonzes.autoid, kolcsonzes.berletkezdete, kolcsonzes.napidij)
VALUES (2, 2, '2017-04-25', 9999);



