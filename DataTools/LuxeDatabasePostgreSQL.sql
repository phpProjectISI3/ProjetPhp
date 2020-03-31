-- Obligatoir : PostgreSql 9.5
-- En cas de problm .. ou si vous voulez supprimer la base de donnée mn serveur Postgre ..
-- 1-- selectionnez "postgre" f DropDownList dyl Aure data studio ^
-- 2- executez had les 3 requéte une par une.

select *
from pg_stat_activity
where datname = 'pgluxedatabase';

select pg_terminate_backend (pg_stat_activity.pid)
from pg_stat_activity
where pg_stat_activity.datname = 'pgluxedatabase';
-- suprime avec succes = true
drop database PgLuxeDatabase


-- Creer la BD 
create database PgLuxeDatabase
-- !!! ==> selectionnez "PgLuxeDatabase" f DropDownList dyl Aure data studio ^

create table SEXE
(
    id_sexe int primary key,
    libelle_sexe varchar(10)
);

create table GRADE
(
    id_grade int primary key,
    libelle_grade varchar(15)
);

create sequence PERSONNE_seq
start 1000;
create table PERSONNE
(
    id_client int default nextval ('PERSONNE_seq') primary key,
    nom varchar(50),
    prenom varchar(50),
    sexe_ int ,
    foreign key (sexe_)references SEXE(id_sexe),
    est_Marie boolean,
    nbr_Enfant_scolarise int,-- max 4
    check(nbr_Enfant_scolarise <=4),
    nbr_Enfant_non_scolarise int,--max 4
    check(nbr_Enfant_non_scolarise <=4),
    grade_ int,
    foreign key (grade_)references GRADE(id_grade),
    date_naissance date,
    point_personne int
    -- TODO : necessite un trigger.
);

create sequence REMARQUE_CLIENT_seq
start 1;
create table REMARQUE_CLIENT
(
    id_remarque int default nextval ('REMARQUE_CLIENT_seq') primary key,
    personne_id int,
    foreign key (personne_id) references PERSONNE(id_client),
    description_remarque varchar(100)
);

create table AUTH_ROLE
(
    id_role int primary key,
    description_role varchar(500),
    libelle_role varchar(15)
);

create table AUTH_ROLE_PERSONNE
(
    personne_role_ int ,
    auth_role_ int ,
    primary key(personne_role_,auth_role_),
    username_email varchar(50),
    mot_de_passe varchar(100)
);

create table TYPE_LOGEMENT
(
    id_type_logement int primary key,
    libelle_type_logement varchar(50)
);

create sequence DETAIL_LOGEMENT_seq
start 1;
create table DETAIL_LOGEMENT
(
    id_categorie int default nextval('DETAIL_LOGEMENT_seq') primary key,
    est_categorie BOOLEAN default false,
    type_logement_ int,
    foreign key (type_logement_)references TYPE_LOGEMENT(id_type_logement),-- villa/appartement/suite/chambre hotel
    superficie_logement double precision,-- en metre carre
    nbr_piece int,
    capacite_personne_max int,
    tarif_par_nuit_HS double precision,-- en dirham -- Haute saison
    tarif_par_nuit_BS double precision,-- en dirham -- basse saison
    description_logement varchar(1500),
    max_reserv int,-- nbr maximum de reservation par saison (Haute/Basse saison)
    tarif_annulation double precision,
    marge_annulation int
);

create sequence LOGEMENT_seq
start 1;
create table LOGEMENT
(
    id_logement int default nextval ('LOGEMENT_seq') primary key,
    nom_logement varchar(50),
    detail_logement_ int,
    foreign key (detail_logement_) references DETAIL_LOGEMENT,
    adress_logement varchar(100)
);

create sequence PHOTO_LOGEMENT_seq
start 1;
create table PHOTO_LOGEMENT
(
    id_photo int default nextval ('PHOTO_LOGEMENT_seq') primary key,
    chemin_photo varchar(250),
    logement_ int,
    foreign key (logement_) references LOGEMENT(id_logement)
);

create sequence PLANNING_LOGEMENT_seq
start 1;
create table PLANNING_LOGEMENT
(
    id_planing int default nextval ('PLANNING_LOGEMENT_seq') primary key,
    logement_ int,
    foreign key(logement_) references LOGEMENT(id_logement),
    est_disponible boolean,--status du logement (en travaux/disponible) <false/true>
    date_debut date,-- pas du tous obligatoires ... juste au cas au la maison est en etat de reparation ...
    date_fin date-- pas du tous obligatoires ... juste au cas au la maison est en etat de reparation ...

);

create sequence DEMANDE_RESERVATION_seq
start 1;
create table DEMANDE_RESERVATION
(
    id_demande int default nextval ('DEMANDE_RESERVATION_seq') primary key,
    date_demande date,
    personne_ int ,
    foreign key (personne_)references PERSONNE(id_client),
    logement_ int,
    foreign key(logement_) references LOGEMENT(id_logement),
    date_debut date,
    date_fin date,
    annule_par_client boolean default 'false',
    date_annulation date
);

create sequence RESERVATION_LOGEMENT_seq
start 1;
create table RESERVATION_LOGEMENT
(
    id_reservation int default nextval ('RESERVATION_LOGEMENT_seq') primary key,
    demande_reservation_ int,
    foreign key (demande_reservation_)references DEMANDE_RESERVATION(id_demande)
);

create table FACTURATION
(
    id_facture int primary key,
    reservation_logement_ int,
    foreign key(reservation_logement_) references RESERVATION_LOGEMENT(id_reservation),
    note_client int,-- L’echelle de satisfaction du collaborateur (0-5 etoile)
    check(note_client >=0 and note_client <=5),
    commentaire_client varchar(250)
);

create sequence SAUVEGARDE_LOGEMENT_seq
start 1;
create table SAUVEGARDE_LOGEMENT
(
    id_sauvegarde int default nextval ('SAUVEGARDE_LOGEMENT_seq') primary key,
    client_ int,
    foreign key (client_) references PERSONNE(id_client),
    logement_ int,
    foreign key (logement_)references LOGEMENT(id_logement)
);

create sequence MESSAGE_seq
start 1;
create table MESSAGE_CONTACT
(
    id_message int default nextval ('MESSAGE_seq') primary key,
    emetteur_ int,
    foreign key (emetteur_) references PERSONNE(id_client),
    Message_ecrit CHARACTER(250),
    vu boolean default 'false',
    recepteur_ int,
    foreign key (recepteur_) references PERSONNE(id_client)
);

-- insert AUTH_ROLE
INSERT into auth_role (id_role, description_role, libelle_role) 
VALUES 
(1, N'Votre tache principale est de gerer le sytem et veiller a la securite des donnees clientel.', N'Admin'),
(2, N'Vous pouvez reserver et profitez de toute nos offres clientele ! en plus vous etes base sur un systeme de points qui vous qualifiera aussitot que possible au moment de la reservation, soyez toujous les merveilleux bienvenues !', N'SimpleUser');

-- insert GRADE
INSERT into grade (id_grade, libelle_grade) 
VALUES 
(0, N'Administratif') ,
(1, N'Directeur')	  ,
(2, N'Employé/cadre.'),
(3, N'Retraité')	  ;

-- insert SEXE
INSERT into sexe (id_sexe, libelle_sexe) 
VALUES 
(1, N'Homme'),
(2, N'Femme');

-- insert PERSONNE
INSERT into personne (id_client, nom, prenom, sexe_, est_marie, nbr_enfant_scolarise, nbr_enfant_non_scolarise, grade_, date_naissance, point_personne) 
VALUES 
(1000, N'Sqat', N'Amina', 2, FALSE, 0, 0, 2, CAST(N'1998-08-07' AS Date), 0) ,
(1002, N'Tfaal', N'Omaima', 2, FALSE, 0, 0, 2, CAST(N'1998-12-08' AS Date), 0),
(1003, N'Ofdil', N'Ihssane', 2, TRUE, 2, 1, 2, CAST(N'1990-02-02' AS Date), 0),
(1004, N'Filali', N'Nisrine', 2, FALSE, 1, 1, 1, CAST(N'1985-09-05' AS Date), 0),
(1005, N'Chennouf', N'Hicham', 1, FALSE, 0, 0, 2, CAST(N'1995-04-06' AS Date), 0),
(1006, N'Lhlou', N'Nourdine', 1, TRUE, 1, 2, 1, CAST(N'1997-02-19' AS Date), 0),
(1007, N'Brahimi', N'Mohmmed', 1, TRUE, 0, 1, 2, CAST(N'1983-09-09' AS Date), 0),
(1008, N'Issaoui', N'Ahmed', 1, TRUE, 3, 0, 3, CAST(N'1970-03-05' AS Date), 0),
(1009, N'Toufiq', N'Ihab', 1, TRUE, 0, 0, 1, CAST(N'1990-07-20' AS Date), 0),
(1010, N'Biwi', N'israe', 2, FALSE, 0, 0, 2, CAST(N'2000-11-05' AS Date), 0),
(1011, N'Hmouti', N'Nihal', 2, FALSE, 2, 0, 2, CAST(N'1992-08-25' AS Date), 0),
(1012, N'O-Sfh', N'Hicham', 1, FALSE, 0, 0, 0, CAST(N'1997-08-25' AS Date), 0),
(1013, N'Yaagoubi', N'Nourdine', 1, FALSE, 0, 0, 0, CAST(N'1998-02-02' AS Date), 0),
(1014, N'Ziane', N'Mohmmed', 1, FALSE, 0, 0, 0, CAST(N'1996-09-02' AS Date), 0),
(1015, N'Yagobi', N'Ahmed', 1, FALSE, 0, 0, 0, CAST(N'1998-06-26' AS Date), 0);

-- insert AUTH_ROLE_PERSONNE
INSERT into auth_role_personne (personne_role_, auth_role_, username_email, mot_de_passe) 
VALUES 
(1000, 2, N'mail1@gmail.com', N'MotDePasse1') ,
(1002, 2, N'mail2@gmail.com', N'MotDePasse2') ,
(1003, 2, N'mail3@gmail.com', N'MotDePasse3') ,
(1004, 2, N'mail4@gmail.com', N'MotDePasse4') ,
(1005, 2, N'mail5@gmail.com', N'MotDePasse5') ,
(1006, 2, N'mail6@gmail.com', N'MotDePasse6') ,
(1007, 2, N'mail7@gmail.com', N'MotDePasse7') ,
(1008, 2, N'mail8@gmail.com', N'MotDePasse8') ,
(1009, 2, N'mail9@gmail.com', N'MotDePasse9') ,
(1010, 2, N'mail10@gmail.com', N'MotDePasse10'),
(1011, 2, N'mail11@gmail.com', N'MotDePasse11'),
(1012, 1, N'mail12@gmail.com', N'MotDePasse12'),
(1013, 1, N'mail13@gmail.com', N'MotDePasse13'),
(1014, 1, N'mail14@gmail.com', N'MotDePasse14'),
(1015, 1, N'mail15@gmail.com', N'MotDePasse15');