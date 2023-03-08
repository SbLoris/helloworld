-- CREATE DATABASE julesimmobilier

CREATE TABLE profil (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    profil VARCHAR(50)
);

INSERT INTO profil (profil)
VALUES (
    'Président'
), (
    'Secretaire'
), (
    'Manager'
), (
    'RH'
), (
    'Comptabilité'
), (
    'Agent'
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    mail VARCHAR(50) UNIQUE,
    mdp VARCHAR(50),
    team VARCHAR(6),
    id_profil INT,
    FOREIGN KEY (id_profil) REFERENCES profil(id)
);

INSERT INTO users (nom, prenom, mail, mdp, team, id_profil)
VALUES (
    'Martin',
    'Jules',
    'jules.martin@julesimmobilier.fr',
    MD5('jaimelimmobilier123'),
    NULL,
    1
), (
    'Lebreton',
    'Loris',
    'loris.lebreton@julesimmobilier.fr',
    MD5('lasecretaire'),
    NULL,
    2
), (
    'Seigeot',
    'Maxence',
    'maxence.seigeot@julesimmobilier.fr',
    MD5('lacompta'),
    NULL,
    5
), (
    'Linget',
    'Evhan',
    'evhan.linget@julesimmobilier.fr',
    MD5('lagentdentretien'),
    'team A',
    6
), (
    'Comba',
    'Yannick',
    'yannick.comba@julesimmobilier.fr',
    MD5('themanager'),
    'team A',
    3
);

CREATE TABLE statut_rdv (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    statut VARCHAR(50)
);

INSERT INTO statut_rdv (statut)
VALUES (
    'En cours'
), (
    'Terminé'
);

CREATE TABLE clients (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom VARCHAR(20),
    prenom VARCHAR(20),
    adresse VARCHAR (100),
    email VARCHAR (50),
    telephone VARCHAR(20)
);

INSERT INTO clients (nom, prenom, adresse, email, telephone)
VALUES (
    'Bachelot',
    'Tom',
    '25 rue de la nonexistence',
    'bachelot.tom@gmail.com',
    '01 02 03 04 05'
), (
    'Brossard',
    'Pierre',
    '42 rue de la vie',
    'brossard.pierre@yahoo.fr',
    '05 04 03 02 01'
), (
    'Toto',
    'Tata',
    'AmenoTorino',
    'toto.tata@laposte.net',
    '01 23 45 67 89'
);

CREATE TABLE rendezvous (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    date_debut DATETIME,
    date_fin DATETIME,
    adresse_rdv VARCHAR(50),
    commentaire VARCHAR(250),
    id_statut_rdv INT,
    id_user INT,
    id_client INT,
    FOREIGN KEY (id_statut_rdv) REFERENCES statut_rdv(id),
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_client) REFERENCES clients(id)
);

INSERT INTO rendezvous (date_debut, date_fin, adresse_rdv, commentaire, id_statut_rdv, id_user, id_client)
VALUES (
    "2023-03-06 15:00:00",
    "2023-03-06 16:00:00",
    "Chez Paul",
    "Il est blond le type, il a l'air de pas avoir beaucoup d'argent, l'agent d'entretien va s'en occuper",
    1,
    4,
    1
), (
    "2023-03-06 14:00:00",
    "2023-03-06 15:00:00",
    "rdmAdresse",
    "oui",
    1,
    4,
    2
), (
    "2023-03-06 15:00:00",
    "2023-03-06 16:00:00",
    "tata",
    "oui",
    1,
    4,
    3
), (
    "2023-03-06 15:00:00",
    "2023-03-06 16:00:00",
    "rdmAdresse",
    "oui",
    2,
    4,
    2
), (
    "2023-10-06 15:00:00",
    "2023-10-06 16:00:00",
    "rdmAdresse",
    "oui",
    2,
    4,
    2
), (
    "2023-03-04 15:00:00",
    "2023-03-04 16:00:00",
    "rdmAdresse",
    "oui",
    2,
    4,
    2
), (
    "2023-03-05 15:00:00",
    "2023-03-05 16:00:00",
    "rdmAdresse",
    "oui",
    2,
    4,
    2
), (
    "2023-03-02 15:00:00",
    "2023-03-02 16:00:00",
    "rdmAdresse",
    "oui",
    2,
    4,
    2
);