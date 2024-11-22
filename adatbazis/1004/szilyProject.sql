termekek
     id int auto_increment - termekek azonositoja elsodleges kulcs
     nev text nem lehet ures - termekek neve
     ar int nem lehet ures - termekek ara

vasarlok
     id int auto_increment - vasarlok elsodleges kulcs
     nev text nem lehet ures - vasarlok neve
     telefonszam int lehet ures - vasarlok telefonszama

tranzakciok
    id int auto_increment - tranzakciok azonositoja elsodleges kulcs
    vasarloid vasarlok azonositoja idegen kulcs
    termekid termekek azonositoja idegen kulcs
    db int nem lehet ures - termek dbszama
    osszeg int nem lehet ures - fizetendo osszeg

CREATE DATABASE szilyProject DEFAULT CHARACTER SET UTF8 COLLATE utf8_hungarian_ci;

CREATE TABLE termekek (
    id int(11) AUTO_INCREMENT PRIMARY KEY, 
    nev VARCHAR(100) NOT NULL,
    ar int(11) not null
);

CREATE TABLE vasarlok ( 
    id INT AUTO_INCREMENT,
    nev VARCHAR(30) NOT NULL,
    telefonszam INT(11),
    
    PRIMARY KEY(id)
);

CREATE TABLE tranzakciok (
	id INT AUTO_INCREMENT,
    vasarloid INT,
    termekid INT,
    db INT NOT NULL,
    osszeg INT NOT NULL,
    
    PRIMARY KEY(id),
    FOREIGN KEY(vasarloid) REFERENCES vasarlok(id),
    FOREIGN KEY (termekid) REFERENCES termekek(id)
)

INSERT INTO termekek VALUES(1,"Sajtos Pogácsa",200);
INSERT INTO termekek VALUES(2,"Zero Coca Cola",750);
INSERT INTO termekek VALUES(3,"Virslis Táska",250);
INSERT INTO termekek VALUES(4,"Protein puding ",540);
INSERT INTO termekek VALUES(5,"Szeletelt sonka",600);

INSERT INTO vasarlok(nev) VALUES ('Fábian Zoltán');
INSERT INTO vasarlok(nev) VALUES ('Lipák Tibor');
INSERT INTO vasarlok(nev) VALUES ('Oláh Róbert');
INSERT INTO vasarlok(nev) VALUES ('Tihanyi Emese');
INSERT INTO vasarlok(nev) VALUES ('Fodor Zsolt');



Fábián Zoltán vásárolt egy darab virslis táskát osszeg-ért!

INSERT INTO `tranzakciok`(`vasarloid`, `termekid`, `db`, `osszeg`)
	VALUES(
        (SELECT vasarlok.id FROM vasarlok WHERE vasarlok.nev = 'Fábián Zoltán'),
        (SELECT termekek.id FROM termekek WHERE termekek.nev = 'Virslis táska'),
        1,
        (SELECT termekek.ar*2 FROM termekek WHERE termekek.nev = 'Virslis táska'))

Oláh Róbert vásárolt kettő darab Zero Coca Colát osszeg-ért!

INSERT INTO `tranzakciok`(`vasarloid`, `termekid`, `db`, `osszeg`)
	VALUES(
        (SELECT vasarlok.id FROM vasarlok WHERE vasarlok.nev = 'Oláh Róbert'),
        (SELECT termekek.id FROM termekek WHERE termekek.nev = 'Zero Coca Cola'),
        2,
        (SELECT termekek.ar*2 FROM termekek WHERE termekek.nev = 'Zero Coca Cola'))

Lipák Tibor vásárolt három darab Protein pudingot osszeg-ért!

INSERT INTO `tranzakciok`(`vasarloid`, `termekid`, `db`, `osszeg`)
	VALUES(
        (SELECT vasarlok.id FROM vasarlok WHERE vasarlok.nev = 'Lipák Tibor'),
        (SELECT termekek.id FROM termekek WHERE termekek.nev = 'Protein puding'),
        3,
        (SELECT termekek.ar*3 FROM termekek WHERE termekek.nev = 'Protein puding'))

Fodor Zsolt vásárolt négy darab Virslis táskát osszeg-ért!

INSERT INTO `tranzakciok`(`vasarloid`, `termekid`, `db`, `osszeg`)
	VALUES(
        (SELECT vasarlok.id FROM vasarlok WHERE vasarlok.nev = 'Fodor Zsolt'),
        (SELECT termekek.id FROM termekek WHERE termekek.nev = 'Virslis táska'),
        4,
        (SELECT termekek.ar*3 FROM termekek WHERE termekek.nev = 'Virslis táska'))

Tihanyi Emese vásárolt három darab Zero Coca Colát osszeg-ért!

INSERT INTO `tranzakciok`(`vasarloid`, `termekid`, `db`, `osszeg`)
	VALUES(
        (SELECT vasarlok.id FROM vasarlok WHERE vasarlok.nev = 'Tihanyi Emese'),
        (SELECT termekek.id FROM termekek WHERE termekek.nev = 'Zero Coca Cola'),
        3,
        (SELECT termekek.ar*3 FROM termekek WHERE termekek.nev = 'Zero Coca Cola'))