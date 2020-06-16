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
    id_detail int default nextval('DETAIL_LOGEMENT_seq') primary key,
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
    marge_annulation int,
    piscine_disponible BOOLEAN,
    parking_disponible BOOLEAN,
    jardin_cours BOOLEAN,
    massage_disponible BOOLEAN
);

create sequence LOGEMENT_seq
start 1;
create table LOGEMENT
(
    id_logement int default nextval ('LOGEMENT_seq') primary key,
    nom_logement varchar(50),
    detail_logement_ int,
    foreign key (detail_logement_) references DETAIL_LOGEMENT,
    adress_logement varchar(100),
    localisation_logement varchar(1500)
);


create sequence PHOTO_LOGEMENT_seq
start 1;
create table PHOTO_LOGEMENT
(
    id_photo int default nextval ('PHOTO_LOGEMENT_seq') primary key,
    chemin_photo varchar(250),
    -- detail_logement_ int;
    -- foreign key (detail_logement_) references DETAIL_LOGEMENT; -- la foreign key a été remplacé (voir en dessous)
    logement_ int,
    foreign key (logement_) references LOGEMENT
);


create sequence PLANNING_LOGEMENT_seq
start 1;
create table PLANNING_LOGEMENT
(
    id_planing int default nextval ('PLANNING_LOGEMENT_seq') primary key,
    logement_ int,
    foreign key(logement_) references LOGEMENT(id_logement),
    est_disponible boolean,--status du logement (en travaux/disponible) <false/true>
    date_debut date,
    date_fin date

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
    refuse_par_admin boolean default 'false',
    date_refus date,
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


CREATE OR REPLACE FUNCTION ATTRIBUTION_POINTS_INITIAL
() -- au moment de l'inscription
  RETURNS trigger AS
$PERSONNE$
BEGIN
   NEW.point_personne :=
(NEW.nbr_enfant_scolarise * 5);
   NEW.point_personne := NEW.point_personne +
(NEW.nbr_Enfant_non_scolarise * 2);
   raise notice '%',
(NEW.point_personne);
IF(NEW.est_marie is TRUE) THEN
        NEW.point_personne := NEW.point_personne + 3;
    ELSE
        NEW.point_personne := NEW.point_personne + 1;
END
IF;

    IF(NEW.grade_ = 1) THEN
        NEW.point_personne := NEW.point_personne + 4;
    ELSIF
(NEW.grade_ = 2) THEN
        NEW.point_personne := NEW.point_personne + 3;
END
IF;

   RETURN NEW;
END;
$PERSONNE$ 
LANGUAGE plpgsql;

-- DROP TRIGGER TRIGGER_MODIFICATION_DATA
-- ON PERSONNE;

CREATE trigger TRIGGER_ATTRIBUTION_POINTS_INITIAL
  BEFORE
insert
  ON
PERSONNE
FOR
EACH
ROW
EXECUTE PROCEDURE ATTRIBUTION_POINTS_INITIAL
();

-- insert AUTH_ROLE
INSERT into AUTH_ROLE
    (id_role, description_role, libelle_role)
VALUES
    (1, N'Votre tache principale est de gerer le sytem et veiller a la securite des donnees clientel.', N'Admin'),
    (2, N'Vous pouvez reserver et profitez de toute nos offres clientele ! en plus vous etes base sur un systeme de points qui vous qualifiera aussitot que possible au moment de la reservation, soyez toujous les merveilleux bienvenues !', N'SimpleUser');

-- insert GRADE
INSERT into GRADE
    (id_grade, libelle_grade)
VALUES
    (0, N'Administratif') ,
    (1, N'Directeur')	  ,
    (2, N'Employé/cadre.'),
    (3, N'Retraité')
;

-- insert SEXE
INSERT into SEXE
    (id_sexe, libelle_sexe)
VALUES
    (1, N'Homme'),
    (2, N'Femme');

-- insert PERSONNE
INSERT into PERSONNE
    (id_client, nom, prenom, sexe_, est_marie, nbr_enfant_scolarise, nbr_enfant_non_scolarise, grade_, date_naissance, point_personne)
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
INSERT into AUTH_ROLE_PERSONNE
    (personne_role_, auth_role_, username_email, mot_de_passe)
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

-- insert MESSAGE_CONTACT
INSERT into MESSAGE_CONTACT
    (emetteur_, message_ecrit, vu, recepteur_)
VALUES
    (1012, N'Bonjour soyez le bienvenue ', FALSE, 1000),
    (1013, N'Bonjour soyez le bienvenue ', FALSE, 1002),
    (1014, N'Bonjour soyez le bienvenue ', TRUE, 1003),
    (1015, N'Bonjour soyez le bienvenue ', FALSE, 1004),
    (1013, N'Bonjour soyez le bienvenue ', TRUE, 1005),
    (1015, N'Bonjour soyez le bienvenue ', FALSE, 1006),
    (1014, N'Bonjour soyez le bienvenue ', FALSE, 1007),
    (1012, N'Bonjour soyez le bienvenue ', FALSE, 1008),
    (1013, N'Bonjour soyez le bienvenue', TRUE, 1009),
    (1012, N'Bonjour soyez le bienvenue', FALSE, 1010),
    (1014, N'Bonjour soyez le bienvenue', FALSE, 1011);


-- insert TYPE_LOGEMENT
INSERT into TYPE_LOGEMENT
    (id_type_logement, libelle_type_logement)
VALUES
    (1, N'Villa') 			   ,
    (2, N'Appartement')		   ,
    (3, N'Maison')			   ,
    (4, N'Chambre Hotel Luxe') ,
    (5, N'Chambre Hotel Sympa');

-- insert DETAIL_LOGEMENT
INSERT into DETAIL_LOGEMENT
    (est_categorie, type_logement_, superficie_logement, nbr_piece, capacite_personne_max, tarif_par_nuit_hs, tarif_par_nuit_bs, description_logement, max_reserv, tarif_annulation, marge_annulation, piscine_disponible, parking_disponible, jardin_cours, massage_disponible)
VALUES
    (true, 5, 95, 3, 3, 350, 200, 'Des murs lambrissés en chêne, des volets en bois et un parquet chaleureux vous entourent. Faites votre choix parmi des centaines de livres et lisez-les dans une boîte à lit secrète derrière des étagères allant du sol au plafond. Les portraits de famille et les objets de famille cohabitent avec bonheur avec des œuvres d''art moderne.', 20, 150, 10, false, true, false, false),
    (false, 3, 300, 4, 6, 1000, 700, 'Faites une expérience hors du temps, dans cette magnifique maison marocaine traditionnelle avec sa piscine et ses jardins privatifs. Idéale pour une famille ou des amis, elle vous permettra de vous détendre dans un cadre élégant et épuré.', 3, 500, 10, true, true, true, false),
    (true, 1, 200, 4, 5, 1570, 1150, 'Un lieu exceptionnel idéalement situé. Tout se fait facilement à pieds. Une chambre magnifique, une terrasse des plus agréables, une piscine chauffée. La nourriture succulente ! Et quel accueil ! Une équipe aux petits soins qui prend le temps de tout vous expliquer et vous conseiller. Le hammam, un bonheur. Bref, tout était plus que parfait.', 50, 450, 31, true, true, true, true),
    (true, 2, 150, 3, 4, 600, 470, 'Appartement panoramique Medina', 10, 200, 10, false, true, true, true),
    (false, 2, 270, 4, 6, 680, 550, 'Notre maison cosy, colorée et confortable, située dans une très vieille maison traditionnelle de la médina, est disponible pour tous ceux qui souhaitent approfondir la sensation de fraîcheur d’Essaouira et retrouver la tranquillité d’esprit en cette période de forte activité. Vous avez votre espace totalement privé comprenant une chambre avec lit double, un salon, une petite cuisine, une salle de bain et un grand hall ressemblant à un patio, mais nous sommes prêts à socialiser si vous le souhaitez!', 15, 700, 15, true, false, true, false),
    (true, 4, 180, 3, 2, 1100, 980, 'Studio charifa une chambre dans riad diamant blanc au 2 eme étage la chambre a une vue sur mer et le jardin .', 0, 600, 7, true, true, true, true);

-- insert LOGEMENT
INSERT INTO logement
    (nom_logement, detail_logement_, adress_logement, localisation_logement)
VALUES
    ('Hotel Tildi', 1, 'Agadir, Rue Hubert Giraud, Ville Nouvelle', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3440.4389929673735!2d-9.608750185015307!3d30.423655007513922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb3b6eb8109e6bf%3A0xad42a94b990584be!2sTildi%20H%C3%B4tel%20Agadir%20%26%20SPA!5e0!3m2!1sfr!2sma!4v1587334240445!5m2!1sfr!2sma'),
    ('Hotel Tildi', 1, 'Agadir, Rue Hubert Giraud, Ville Nouvelle', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3440.4389929673735!2d-9.608750185015307!3d30.423655007513922!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb3b6eb8109e6bf%3A0xad42a94b990584be!2sTildi%20H%C3%B4tel%20Agadir%20%26%20SPA!5e0!3m2!1sfr!2sma!4v1587334240445!5m2!1sfr!2sma'),
    ('Dar Itrane - Superbe maison berbère', 2, 'Tagadirt, Marrakech-Tensift-Al Haouz, Maroc', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3413.5001445159774!2d-8.926176984999138!3d31.179143021031695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb1e67f9cf6de1f%3A0x11e05a07f71d7a98!2sTagadirt!5e0!3m2!1sfr!2sma!4v1587334309771!5m2!1sfr!2sma'),
    ('Villa Authentique Medina', 3, 'Marrakech, Tensift, Maroc', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3413.5001445159774!2d-8.926176984999138!3d31.179143021031695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb1e67f9cf6de1f%3A0x11e05a07f71d7a98!2sTagadirt!5e0!3m2!1sfr!2sma!4v1587334309771!5m2!1sfr!2sma'),
    ('Villa Authentique Medina', 3, 'Marrakech, El Haouz, Maroc', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3413.5001445159774!2d-8.926176984999138!3d31.179143021031695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb1e67f9cf6de1f%3A0x11e05a07f71d7a98!2sTagadirt!5e0!3m2!1sfr!2sma!4v1587334309771!5m2!1sfr!2sma'),
    ('Appartement panoramique', 4, 'Marrakech, entre Tensift et El Haouz, Maroc', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1736306.2546897426!2d-9.53658258776723!3d31.79166768479669!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafb63e1068fa4d%3A0xb8db0d2bbe8e616!2sMarrakech-Tensift-Al%20Haouz!5e0!3m2!1sfr!2sma!4v1587334666432!5m2!1sfr!2sma'),
    ('Appartement panoramique', 4, 'Marrakech, entre Tensift et El Haouz, Maroc', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1736306.2546897426!2d-9.53658258776723!3d31.79166768479669!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafb63e1068fa4d%3A0xb8db0d2bbe8e616!2sMarrakech-Tensift-Al%20Haouz!5e0!3m2!1sfr!2sma!4v1587334666432!5m2!1sfr!2sma'),
    ('Appartement panoramique', 5, 'Marrakech, entre Tensift et El Haouz, Maroc', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1736306.2546897426!2d-9.53658258776723!3d31.79166768479669!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdafb63e1068fa4d%3A0xb8db0d2bbe8e616!2sMarrakech-Tensift-Al%20Haouz!5e0!3m2!1sfr!2sma!4v1587334666432!5m2!1sfr!2sma'),
    ('Appartement paisible ', 5, 'Essaouira, Marrakech-Safi, Maroc', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27211.838586174523!2d-9.780051766383684!3d31.510978945210496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdad9a4e9f588ccf%3A0x57421a176d5d7d30!2sEssaouira!5e0!3m2!1sfr!2sma!4v1587334695072!5m2!1sfr!2sma'),
    ('Studio charifa', 6, 'Fes, Boulvard Asslat, Maroc', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1704327.2032885654!2d-5.2656814032804915!3d33.45545279192627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9fa4608762a383%3A0xb32d64f9c27479c7!2sF%C3%A8s-Boulemane!5e0!3m2!1sfr!2sma!4v1587334715834!5m2!1sfr!2sma'),
    ('Studio charifa double vue mer', 6, 'Fes, environs de quartier El Mouahidine, Maroc', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1704327.2032885654!2d-5.2656814032804915!3d33.45545279192627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9fa4608762a383%3A0xb32d64f9c27479c7!2sF%C3%A8s-Boulemane!5e0!3m2!1sfr!2sma!4v1587334715834!5m2!1sfr!2sma');

--insert planning_logement
INSERT INTO planning_logement
    (logement_, est_disponible, date_debut, date_fin)
VALUES
    (1, NULL, CAST(N'2020-05-01' AS Date), CAST(N'2020-06-01' AS Date)),
    (1, NULL, CAST(N'2020-07-15' AS Date), CAST(N'2020-07-24' AS Date)),
    (3, NULL, CAST(N'2020-05-01' AS Date), CAST(N'2020-06-01' AS Date)),
    (1, NULL, CAST(N'2020-07-30' AS Date), CAST(N'2020-07-08' AS Date));

-- insert REMARQUE_CLIENT
INSERT into REMARQUE_CLIENT
    (id_remarque, personne_id, description_remarque)
VALUES
    (1, 1000, 'Prend bien soin du logement.'),
    (2, 1010, 'lay3merha dar.'),
    (3, 1008, 'Il a cassé 2 vase.');

-- insert SAUVEGARDE_LOGEMENT
INSERT into SAUVEGARDE_LOGEMENT
    (client_, logement_)
VALUES
    (1000, 5),
    (1000, 2),
    (1005, 3);

--insert PHOTO_LOGEMENT
INSERT INTO public.photo_logement
    (id_photo, chemin_photo, logement_)
VALUES
    (1, 'https://media.expedia.com/hotels/2000000/1460000/1452800/1452729/1856a7d1_b.jpg', 1),
    (2, '//www.alibabuy.com/img_hotel/5/3/7/1_240046_1.jpg', 2),
    (3, 'https://a0.muscache.com/4ea/air/v2/pictures/173f07df-c883-4e64-9dec-d166280cf935.jpg?t=r:w2500-h1500-sfit,e:fjpg-c90', 3),
    (4, 'https://a0.muscache.com/4ea/air/v2/pictures/704b3781-d26a-4c4e-a62d-433d8a1dbaf0.jpg?t=r:w2500-h1500-sfit,e:fjpg-c90', 3),
    (5, 'https://a0.muscache.com/4ea/air/v2/pictures/3874656c-63cd-4993-a643-3b144871821a.jpg?t=r:w2500-h1500-sfit,e:fjpg-c90', 3),
    (6, 'https://a0.muscache.com/4ea/air/v2/pictures/296774d1-4de3-4933-ae35-7bdef0840c87.jpg?t=r:w2500-h1500-sfit,e:fjpg-c90', 3),
    (7, 'https://a0.muscache.com/im/pictures/e85d7dbf-ff50-42d6-8e61-dfb242813fd5.jpg?aki_policy=xx_large', 4),
    (8, 'https://a0.muscache.com/im/pictures/9581cd43-cc28-4372-b91f-3805af5e7ba2.jpg?aki_policy=xx_large', 4),
    (9, 'https://a0.muscache.com/im/pictures/5bcf78c7-c516-4179-bdec-95c9e4c1fe7d.jpg?aki_policy=xx_large', 4),
    (10, 'https://a0.muscache.com/im/pictures/40ae82a4-273e-4ac8-909f-b8d5f0d531cd.jpg?aki_policy=xx_large', 5),
    (11, 'https://a0.muscache.com/im/pictures/826c1d2a-eab6-49ce-b69b-3aa6a6405746.jpg?aki_policy=xx_large', 5),
    (12, 'https://a0.muscache.com/im/pictures/d51a9a29-34cf-41d9-b190-4ea2d75be255.jpg?aki_policy=xx_large', 5),
    (13, 'https://a0.muscache.com/im/pictures/89ffe1e9-da75-48ac-b5a1-65dfce0927e2.jpg?aki_policy=xx_large', 5),
    (14, 'https://a0.muscache.com/im/pictures/52495953/2dfd8669_original.jpg?aki_policy=xx_large', 4),
    (15, 'https://a0.muscache.com/im/pictures/fd001e9d-8e9e-4bd7-b000-652215c3b080.jpg?aki_policy=xx_large', 6),
    (16, 'https://a0.muscache.com/im/pictures/d0cac70d-0439-4f18-9eae-7cc4851c9d81.jpg?aki_policy=xx_large', 7),
    (17, 'https://a0.muscache.com/im/pictures/88164979-9ddf-4bc9-bb66-a45dcea2d84f.jpg?aki_policy=xx_large', 8),
    (18, 'https://a0.muscache.com/im/pictures/01842582-baa8-494e-9340-f02acbf2b895.jpg?aki_policy=xx_large', 9),
    (19, 'https://a0.muscache.com/im/pictures/bd2244f3-d622-4439-8d55-67e7020fe09d.jpg?aki_policy=xx_large', 9),
    (20, 'https://a0.muscache.com/im/pictures/8561d349-0617-477f-a744-09e2e8758e76.jpg?aki_policy=xx_large', 9),
    (21, 'https://a0.muscache.com/im/pictures/8dd027a5-4505-4d68-86e3-938b3e0bed2d.jpg?aki_policy=xx_large', 9),
    (22, 'https://a0.muscache.com/im/pictures/a123e39f-7cd9-4feb-9c17-1de850dd7a97.jpg?aki_policy=xx_large', 9),
    (23, 'https://a0.muscache.com/im/pictures/b3208ea0-36f5-4aa3-8681-d848fae1ce66.jpg?aki_policy=xx_large', 9),
    (24, 'https://a0.muscache.com/im/pictures/1ec971bd-22ec-47e8-9fed-0ac02601ae29.jpg?aki_policy=xx_large', 9),
    (25, 'https://a0.muscache.com/im/pictures/6a428bbb-769a-44a8-a559-415e8c1ec733.jpg?aki_policy=xx_large', 10),
    (26, 'https://a0.muscache.com/im/pictures/718adfcf-5676-46fe-9340-2c913fb508cc.jpg?aki_policy=xx_large', 10),
    (27, 'https://a0.muscache.com/im/pictures/be22e103-0ea4-4762-96cb-821cd66685e1.jpg?aki_policy=xx_large', 11),
    (28, 'https://a0.muscache.com/im/pictures/dce3f89f-679e-45bd-ae1b-d0bc9685c9fa.jpg?aki_policy=xx_large', 10),
    (29, 'https://a0.muscache.com/im/pictures/cbdd4593-ef20-4d5c-acfa-3fb2fb5a6d6a.jpg?aki_policy=xx_large', 11);

--insert DEMANDE_RESERVATION
INSERT INTO public.demande_reservation
    (date_demande, personne_, logement_, date_debut, date_fin, refuse_par_admin, date_refus, annule_par_client, date_annulation)
VALUES
    ('2020-05-02', 1005, 6, '2020-06-08', '2020-06-13', true, '2020-06-01', false, NULL),/* meme logement meme date mais refuser par admin*/
    ('2020-05-06', 1002, 6, '2020-06-08', '2020-06-13', true, '2020-06-01', false, NULL),/* meme logement meme date mais refuser par admin*/
    ('2020-05-25', 1000, 6, '2020-06-08', '2020-06-13', false, NULL, false, NULL),/* meme logement meme date mais accepte et payé ! */

    ('2019-02-02', 1000, 3, '2019-02-15', '2019-02-21', false, NULL, false, NULL),/*en attente*/
    ('2019-02-02', 1000, 4, '2019-02-20', '2019-03-21', false, NULL, false, NULL),/*en attente*/
    ('2019-03-12', 1000, 7, '2020-06-15', '2020-06-22', false, NULL, false, NULL),/*accepté ! */

    ('2020-05-01', 1000, 1, '2020-05-18', '2020-05-25', true, '2020-05-05', false, NULL),/*refuser par admin*/
    ('2019-04-15', 1000, 5, '2020-05-06', '2020-05-12', true, '2019-04-20', false, NULL),/*refuser par admin*/
    ('2020-05-01', 1003, 1, '2020-05-28', '2020-06-04', true, '2020-05-05', false, NULL),/*refuser par admin*/

    ('2019-01-02', 1000, 2, '2019-02-01', '2019-02-08', false, NULL, true, '2019-01-15'),/*annule par client*/
    ('2020-04-09', 1003, 1, '2020-05-20', '2020-05-25', false, NULL, true, '2020-04-30'),/*annule par client*/

    ('2020-05-02', 1005, 6, '2020-06-26', '2020-07-31', false, NULL, false, NULL),/* meme logement meme date et en attente !*/
    ('2020-05-06', 1002, 6, '2020-06-26', '2020-07-31', false, NULL, false, NULL),/* meme logement meme date et en attente !*/
    ('2020-05-25', 1000, 6, '2020-06-26', '2020-07-31', false, NULL, false, NULL);/* meme logement meme date et en attente ! */

--insert RESERVATION_LOGEMENT
INSERT INTO public.reservation_logement
    (demande_reservation_)
VALUES
    (3),
    (6);

--insert facturation
INSERT INTO public.facturation
    (id_facture, reservation_logement_, note_client, commentaire_client)
VALUES
    (1, 1, NULL, '');

------------------------ TODO :-----------------------------
-- Trigger : Attribution des demande & des réservation !!!
---------------------------------------------------------------------


-----------------------Informations---------------------------------------------------------------------
--Pour faire backup : aller dans  => C:\Program Files\PostgreSQL\9.5\bin
-- commande : pg_dump -U postgres --column-inserts -p 5433 -d pgluxedatabase > C:\Users\pc\Desktop\testBackup.sql
-- -U : postgres : Username 
-- -d : pgluxedatabse : database name 
-- -a : generer que le script INSERT (Copy .. \.)
-- -p : port : 5433
-- > chemin du Ficier Backup (extension .sql/.backup obligatoire).
-----------------------------------------------------------------------------------------------------------

----------------------- Documentation -----------------------------------------------------------------

-----------------------------------------------------------------------------------------------------------
