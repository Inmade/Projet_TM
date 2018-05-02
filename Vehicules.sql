drop database if exists vehicules;

create database vehicules character set = 'utf8';

use vehicules;

create table if not exists voiture(
    id int not null auto_increment,
    marque varchar(50) not null,
    modele varchar(50) not null,
    portes int not null,
    boite_manuelle boolean not null,
    valises int not null,
    PRIMARY key(id)
)engine=innodb;

create table if not exists moto(
    id int not null auto_increment,
    marque varchar(50) not null,
    modele varchar(50) not null,
    permis varchar(50) not null,
    puissance int not null,
    cylindre int not null,
    PRIMARY key(id)
)engine=innodb;

create table if not exists camion(
    id int not null auto_increment,
    marque varchar(50) not null,
    modele varchar(50) not null,
    permis varchar(50) not null,
    volume decimal(4,2) not null,
    charge int not null,
    ouvert boolean not null,
    PRIMARY key(id)
)engine=innodb;

create table if not exists velo(
    id int not null auto_increment,
    marque varchar(50) not null,
    modele varchar(50) not null,
    tandem boolean not null,
    PRIMARY key(id)
)engine=innodb;

create table if not exists car(
    id int not null auto_increment,
    nbplacesmax int not null,
    toilettes boolean not null,
)engine=innodb;

insert into voiture(marque, modele, portes, boite_manuelle,valises) VALUES
("Ford","Focus",5,true,3),
("Peugeot","208",3,true,2),
("Volkswagen","Golf",5,false,3),
("Ford","Mustang",3,true,3);

insert into moto(marque, modele, permis, puissance, cylindre) VALUES
("Harley Davidson", "CVO", "A", 106,1923),
("Ducati", "Monster","A", 75, 803);

insert into camion(marque, modele, permis, volume, charge, ouvert) VALUES
("Mercedes-Benz","Atego","C",34.8, 4960,false);
("Renault","XLOAD","C",35.8, 4960,false);
("MAN","TGX","C",33.8, 4960,false);

insert into velo(marque, modele, tandem) values
("Ortler","Motala",false),
("Cube","Cyclo-cross",false),
("Lapierre","Road Tandem",true);

insert into car(marque,nbplacesmax, toilettes) VALUES
("Mercedez-Benz",18,false),
("Ford",56,true),
("Volvo",82, true);
