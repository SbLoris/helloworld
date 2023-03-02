CREATE DATABASE julesimmobilier

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
    id_profil INT,
    FOREIGN KEY (id_profil) REFERENCES profil(id)
);

INSERT INTO users (nom, prenom, mail, mdp, id_profil)
VALUES (
    'Martin',
    'Jules',
    'jules.martin@julesimmobilier.fr',
    MD5('jaimelimmobilier123'),
    1
), (
    'Lebreton',
    'Loris',
    'loris.lebreton@julesimmobilier.fr',
    MD5('lasecretaire'),
    2
), (
    'Seigeot',
    'Maxence',
    'maxence.seigeot@julesimmobilier.fr',
    MD5('lacompta'),
    5
), (
    'Linget',
    'Evhan',
    'evhan.linget@julesimmobilier.fr',
    MD5('lagentdentretien'),
    6
), (
    'Comba',
    'Yannick',
    'yannick.comba@julesimmobilier.fr',
    MD5('themanager'),
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

CREATE TABLE rendezvous (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    date_debut DATETIME,
    date_fin DATETIME,
    nom_client VARCHAR(50),
    adresse_rdv VARCHAR(50),
    commentaire VARCHAR(250),
    id_statut_rdv INT,
    id_user INT,
    FOREIGN KEY (id_user) REFERENCES users(id),
    FOREIGN KEY (id_statut_rdv) REFERENCES statut_rdv(id)
);

INSERT INTO rendezvous (date_debut, date_fin, nom_client, adresse_rdv, commentaire, id_statut_rdv, id_user)
VALUES (
    "2023-03-06 15:00:00",
    "2023-03-06 16:00:00",
    "Tom Bachelot",
    "Chez Paul",
    "Il est blond le type, il a l'air de pas avoir beaucoup d'argent, l'agent d'entretien va s'en occuper",
    1,
    4
);