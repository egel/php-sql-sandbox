DROP database IF EXISTS private_zoo;
CREATE database `private_zoo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE private_zoo;

/*
ALTER DATABASE 'private_zoo' DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
*/

DROP TABLE IF EXISTS continents;
CREATE TABLE continents
(
    id INT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(40) COLLATE utf8_general_ci NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO continents VALUES(1, 'North America');
INSERT INTO continents VALUES(2, 'South America');
INSERT INTO continents VALUES(3, 'Europe');
INSERT INTO continents VALUES(4, 'Africa');
INSERT INTO continents VALUES(5, 'Asia');
INSERT INTO continents VALUES(6, 'Australia');
INSERT INTO continents VALUES(7, 'Antarctica');



DROP TABLE IF EXISTS rangs;
CREATE TABLE rangs
(
    id INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) COLLATE utf8_general_ci NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO rangs VALUES(1, 'Praktykant');
INSERT INTO rangs VALUES(2, 'Kierownik');
INSERT INTO rangs VALUES(3, 'Prezes');
INSERT INTO rangs VALUES(4, 'Opierun');



DROP TABLE IF EXISTS employees;
CREATE TABLE employees
(
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	id_rang INT(5) UNSIGNED,
    name VARCHAR(30) COLLATE utf8_general_ci,
    surename VARCHAR(70) COLLATE utf8_general_ci,
    city VARCHAR(50) COLLATE utf8_general_ci,
    adress VARCHAR(255) COLLATE utf8_general_ci,
    email VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
    phone VARCHAR(20) COLLATE utf8_general_ci,
    PRIMARY KEY (id),
    FOREIGN KEY (id_rang) REFERENCES rangs(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO employees VALUES(1, 4, 'Maciej','Luzacki', 'Warszawa', 'Aleje Ujazdowskie 134', 'maciej.luzacki@gmail.com', '533-363-760');
INSERT INTO employees VALUES(2, 1, 'Wiktoria', 'Wątrubeczka', 'Gdańsk', 'Kasztanowa 356', 'watrubeczka.wiktoria@op.pl', '610 345 108');
INSERT INTO employees VALUES(3, 1, 'Wojciech', 'Trębacz', 'Koniusza', 'Wierzbno 23/4', 'adamtrebacz@yahoo.com', '600 345 108');
INSERT INTO employees VALUES(4, 2, 'Elżbieta','Wrzeszczak', 'Kraków', 'Os. Kolorowe 14/12', 'e.wrzeszczak@gmail.com', '888-376-001');
INSERT INTO employees VALUES(5, 3, 'Anna','Skotarska', 'Kraków', 'Wybojowa 57/18a', 'annaskotarska@wp.pl', '501-366-804');
INSERT INTO employees VALUES(6, 4, 'Norman','Osborn', 'Kraków', 'Zamkowa 1', 'norman.osborn@gmail.com', '503-636-706');
INSERT INTO employees VALUES(7, 4, 'Anna','Osborn', 'Kraków', 'Zamkowa 1', 'anna.osborn@gmail.com', '504-636-704');



DROP TABLE IF EXISTS animals;
CREATE TABLE animals
(
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    type VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
    continent_id INT(3) UNSIGNED NOT NULL,
    name VARCHAR(50) COLLATE utf8_general_ci NOT NULL,
    age INT(4) UNSIGNED NOT NULL,
    like_todo VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
    image_name VARCHAR(255) COLLATE utf8_general_ci NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (continent_id) REFERENCES continents(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO animals VALUES(2, 'Crocodile', 2, 'Jimmy', 12, 'swimming', 'crocodile.jpg');
INSERT INTO animals VALUES(3, 'Elephant', 5, 'Bobby', 25, 'eating leafs and jumping into watter', 'elephant.jpg');
INSERT INTO animals VALUES(4, 'Giraffe', 4,'Fiona', 7, 'running and eating delicious green leafs', 'giraffe.jpg');
INSERT INTO animals VALUES(5, 'Hippo', 4,'Tommy', 10, 'swimming and getting dirty in mud :P', 'hippo.jpg');
INSERT INTO animals VALUES(6, 'Lion', 4,'Ricky', 15, 'sleeping to late hours', 'lion.jpg');
INSERT INTO animals VALUES(7, 'Monkey', 2,'Danny', 8, 'jumping from thee to tree', 'monkey.jpg');
INSERT INTO animals VALUES(8, 'Zebra', 4,'Lily', 12, 'fast running on the fields', 'zebra.jpg');



DROP TABLE IF EXISTS licznik_odwiedzin;
CREATE TABLE licznik_odwiedzin
(
    id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    id_ip INT(11) UNSIGNED NOT NULL,
    browser VARCHAR(255) COLLATE utf8_general_ci,
    data_dodania DATE DEFAULT '0000-00-00',
    czas_dodania TIME DEFAULT '00:00:00',
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
