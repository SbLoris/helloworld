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