DROP database forma_green;
create DATABASE forma_green;
use forma_green;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL PRIMARY key AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
);

INSERT INTO `admin` (`id_admin`, `nom`, `prenom`, `login`, `PASSWORD`) VALUES
(1, 'fotso', 'pires', 'fotso pires', '123123');

CREATE TABLE `type_membre` (
  `id_type_membre` int(11) NOT NULL PRIMARY key AUTO_INCREMENT,
  `type_membre` varchar(30) NOT NULL
);
INSERT INTO `type_membre` (`type_membre`)
 VALUES ('individua'), ('school');

CREATE TABLE `membre` (
  `login` varchar(200) NOT NULL PRIMARY KEY,
  `mot_pass` varchar(100) NOT NULL,
  `id_type_membre` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `age` date NOT NULL,
  `gender` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `postal_code` varchar(30) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `barcode` varchar(100) NOT NULL
);
ALTER table membre ADD CONSTRAINT `fk_membre_id_typ` FOREIGN KEY (`id_type_membre`) REFERENCES `type_membre` (`id_type_membre`) ON UPDATE CASCADE;


create table green_area (
id_membre int not null AUTO_INCREMENT primary key,
 longitude varchar(60) not null,
 latitute varchar(60) not null,
    area_name varchar(100) not null,
    login varchar(200) NOT NULL,
    INDEX(login),
    CONSTRAINT fk_log_green FOREIGN KEY (login) REFERENCES membre(login) on update CASCADE
);

CREATE TABLE `abonnement` (
  `id_abon` varchar(30) NOT NULL PRIMARY key,
  `date_start` datetime NOT NULL DEFAULT current_timestamp(),
  `date_end` datetime NOT NULL,
   `login` varchar(200) NOT NULL
);
alter TABLE abonnement ADD CONSTRAINT `fk_abon_abon` FOREIGN KEY (`login`) REFERENCES `membre` (`login`) ON UPDATE CASCADE;
