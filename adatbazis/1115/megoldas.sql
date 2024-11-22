    CREATE DATABASE gyakorlas_bakos DEFAULT CHARACTER SET UTF8 COLLATE utf8_hungarian_ci;

1,
    CREATE TABLE dolgozo (
        id INT AUTO_INCREMENT,
        vezeteknev VARCHAR(30) NOT NULL,
        keresztnev VARCHAR(30) NOT NULL,
        PRIMARY KEY(id)
    )

2,

    INSERT INTO `dolgozo`(`vezeteknev`, `keresztnev`) VALUES ('Kiss','József');
    INSERT INTO `dolgozo`(`vezeteknev`, `keresztnev`) VALUES ('Hámory','Imre');
    INSERT INTO `dolgozo`(`vezeteknev`, `keresztnev`) VALUES ('Varjasi','Kornél');
    INSERT INTO `dolgozo`(`vezeteknev`, `keresztnev`) VALUES ('Tóth','Barnabás');
    INSERT INTO `dolgozo`(`vezeteknev`, `keresztnev`) VALUES ('Horváth','Tamás');
    INSERT INTO `dolgozo`(`vezeteknev`, `keresztnev`) VALUES ('Koncz','István');

3,

    ALTER TABLE dolgozo ADD szulev INT(4) NOT NULL AFTER keresztnev;

4,

    ALTER TABLE dolgozo ADD fizetes INT(6) NOT NULL AFTER szulev;

5,

    UPDATE `dolgozo` SET `szulev`=1965,`fizetes`=178300 WHERE id = 1;
    UPDATE `dolgozo` SET `szulev`=1974,`fizetes`=103600 WHERE id = 2;
    UPDATE `dolgozo` SET `szulev`=1957,`fizetes`=98700 WHERE id = 3;
    UPDATE `dolgozo` SET `szulev`=1945,`fizetes`=120000 WHERE id = 4;
    UPDATE `dolgozo` SET `szulev`=1979,`fizetes`=79500 WHERE id = 5;
    UPDATE `dolgozo` SET `szulev`=1955,`fizetes`=168000 WHERE id = 6;

6,

    UPDATE `dolgozo` SET `fizetes`=fizetes*1.10 WHERE fizetes<100000

7,

    UPDATE `dolgozo` SET `fizetes`=fizetes*1.05 WHERE (CURRENT_DATE-szulev) > 52

8, 

    DELETE FROM `dolgozo` WHERE CURRENT_DATE-szulev > 50
    DELETE FROM `dolgozo` WHERE 2024-szulev > 50