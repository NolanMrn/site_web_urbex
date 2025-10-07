drop table if exists LIEUX;
drop table if exists CATEGORIE;

create table CATEGORIE (
    nom_categorie varchar(30) primary key
);

create table LIEUX (
    idL int,
    nom_categorie varchar(30),
    slug varchar(30) UNIQUE,
    nom varchar(100),
    date_explo date,
    primary key (idL, nom_categorie),
    foreign key (nom_categorie) references CATEGORIE(nom_categorie)
);

delimiter | 
create or replace trigger GenererIdLieux before insert on LIEUX for each row
begin 
    declare IdActuel int;

    select ifnull(max(idL), 0) into IdActuel from LIEUX 
    where nom_categorie = NEW.nom_categorie;

    set NEW.idL = IdActuel + 1;
end |
delimiter ;

insert into CATEGORIE values ("Châteaux");

insert into LIEUX (nom_categorie, slug, nom, date_explo) 
values ("Châteaux", "bois", "Le Château du Bois", "2023-12-01");

insert into LIEUX (nom_categorie, slug, nom, date_explo) 
values ("Châteaux", "douves", "Le Château aux Douves", "2023-08-01");

insert into CATEGORIE values ("Usines");

insert into LIEUX (nom_categorie, slug, nom, date_explo) 
values ("Usines", "gattes", "La Cimenterie des Gattes", "2025-04-01");