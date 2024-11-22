CREATE DATABASE Tanfolyam_Bakos DEFAULT CHARACTER SET UTF8 COLLATE utf8_hungarian_ci;

CREATE TABLE tanulok_Bakos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nev VARCHAR(100) NOT NULL,
    telefonszam VARCHAR(20),
    szuletesiido DATE NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE tantargyak_Bakos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    megnevezes VARCHAR(100) NOT NULL UNIQUE,
    tanar VARCHAR(100) NOT NULL
);

CREATE TABLE ertekelesek_Bakos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    tanuloid INT,
    tantargyid INT,
    jegy INT NOT NULL,
    
    FOREIGN KEY (tanuloid) REFERENCES tanulok_Bakos(id),
    FOREIGN KEY (tantargyid) REFERENCES tantargyak_Bakos(id)
);

INSERT INTO `tantargyak_Bakos`(`megnevezes`, `tanar`) VALUES ('Angol nyelv','Nemes Angéla');
INSERT INTO `tantargyak_Bakos`(`megnevezes`, `tanar`) VALUES ('Informatika','Kis Ede');