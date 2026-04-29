CREATE DATABASE gestion_notesITU;

use gestion_notesITU;

CREATE TABLE responsables(
    id_responsable INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    id_parcours INT NOT NULL
);

CREATE TABLE parcours(
    id_parcours INT PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(50) NOT NULL
);

CREATE TABLE matieres(
    id_matiere INT PRIMARY KEY AUTO_INCREMENT,
    libelle VARCHAR(50) NOT NULL,
    semestre VARCHAR(20) NOT NULL,
    optionnel INT DEFAULT NULL
);

CREATE TABLE parcours_matieres(
    idParcours_matiere INT PRIMARY KEY AUTO_INCREMENT,
    id_parcours INT NOT NULL,
    id_matiere INT NOT NULL,
    coefficient INT NOT NULL,
    FOREIGN KEY (id_parcours) REFERENCES parcours(id_parcours),
    FOREIGN KEY (id_matiere) REFERENCES matieres(id_matiere)
);

CREATE TABLE etudiants(
    id_etudiant INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    date_naisssance DATE NOT NULL
);

CREATE TABLE notes(
    id_note INT PRIMARY KEY AUTO_INCREMENT,
    idParcours_matiere INT NOT NULL,
    id_etudiant INT NOT NULL,
    note DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (idParcours_matiere) REFERENCES parcours_matieres(idParcours_matiere),
    FOREIGN KEY (id_etudiant) REFERENCES etudiants(id_etudiant)
);

CREATE TABLE users(
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (email, password) VALUES ('admin@sysinfo.mg', '123456');

INSERT INTO etudiants (nom, prenom, date_naisssance) VALUES
('Rakoto', 'Jean', '2001-03-15'),
('Rabe', 'Marie', '2000-07-22'),
('Andriamihaja', 'Luc', '2002-01-10'),
('Rasoa', 'Sophie', '2001-11-05'),
('Randria', 'Kevin', '1999-06-18'),
('Rakotomalala', 'Nina', '2003-09-27'),
('Razanajatovo', 'Paul', '2000-12-14'),
('Raharisoa', 'Clara', '2002-05-09'),
('Andrianina', 'Mickael', '2001-08-30'),
('Ravelomanana', 'Julie', '2000-02-17'),
('Ratsimba', 'Hery', '1998-10-25'),
('Rakotondrabe', 'Fania', '2003-04-12'),
('Rafanomezantsoa', 'Lova', '2001-07-03'),
('Ramanandraibe', 'Aina', '2002-06-21'),
('Razafindrakoto', 'Tiana', '1999-09-11'),
('Rabetsimandranto', 'Mialy', '2000-01-29'),
('Andriantsitohaina', 'Toky', '2001-12-08'),
('Raharimalala', 'Hanta', '2002-03-26'),
('Rakotovao', 'Fitia', '2000-05-16'),
('Rasoanandrasana', 'Tahina', '2003-08-04');