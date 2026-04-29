CREATE DATABASE gestion_notesItu;

use gestion_notesItu;

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
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'responsable') NOT NULL
);