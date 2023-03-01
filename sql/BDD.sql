CREATE DATABASE julesimmobilier

CREATE TABLE profil (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    profil VARCHAR(50)
)

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
)

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    mail VARCHAR(50),
    mdp VARCHAR(50),
    id_profil INT,
    FOREIGN KEY (id_profil) REFERENCES profil(id)
)

INSERT INTO users (nom, prenom, mail, mdp, id_profil)
VALUES (
    'Martin',
    'Jules',
    'jules.martin@julesimmobilier.fr',
    'jaimelimmobilier123',
    1
), (
    'Lebreton',
    'Loris',
    'loris.lebreton@julesimmobilier.fr',
    'lasecretaire',
    2
), (
    'Seigeot',
    'Maxence',
    'maxence.seigeot@julesimmobilier.fr',
    'lacompta',
    5
), (
    'Linget',
    'Evhan',
    'evhan.linget@julesimmobilier.fr',
    'lagentdentretien',
    6
), (
    'Comba',
    'Yannick',
    'yannick.comba@julesimmobilier.fr',
    'themanager',
    3
)

CREATE TABLE statut_rdv (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    statut VARCHAR(50)
)

INSERT INTO statut_rdv (statut)
VALUES (
    'En cours'
), (
    'Terminé'
)

CREATE TABLE rendezvous (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    date_debut DATETIME,
    date_fin DATETIME,
    nom_client VARCHAR(50),
    adresse_rdv VARCHAR(50),
    commentaire VARCHAR(250),
    id_statut_rdv INT,
    id_users INT,
    FOREIGN KEY (id_users) REFERENCES users(id),
    FOREIGN KEY (id_statut_rdv) REFERENCES statut_rdv(id)
)

INSERT INTO rendezvous (date_debut, date_fin, nom_client, adresse_rdv, commentaire, id_statut_rdv, id_users)
VALUES (
    "2023-03-06 15:00:00",
    "2023-03-06 16:00:00",
    "Tom Bachelot",
    "Chez Paul",
    "Il est blond le type, il a l'air de pas avoir beaucoup d'argent, l'agent d'entretien va s'en occuper",
    1,
    4
)