CREATE TABLE Dolgozok (
    Dolgozok_ID INT AUTO_INCREMENT,
    nev VARCHAR(30) NOT NULL,
    beosztas VARCHAR(30) NOT NULL,
    telephely INT NOT NULL,
    
    PRIMARY KEY(Dolgozok_ID),
    FOREIGN KEY (telephely) REFERENCES Telephelyek(Telephelyek_ID)
)

CREATE TABLE Fizetes (
    Fizetes_ID INT AUTO_INCREMENT,
    beosztas VARCHAR(30) NOT NULL,
    ber INT(6) NOT NULL,
    
    PRIMARY KEY(Fizetes_ID)
)

CREATE TABLE Telephelyek (
    Telephelyek_ID INT AUTO_INCREMENT,
    nev VARCHAR(30) NOT NULL,
    cim VARCHAR(50) NOT NULL,
    irszam INT(4) NOT NULL,
    telefon VARCHAR(30),
    
    PRIMARY KEY(Telephelyek_ID)
)