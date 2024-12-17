CREATE DATABASE menu  ;
use menu ; 


CREATE TABLE users (
    id_user INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    login VARCHAR(50) NOT NULL,
    mdp VARCHAR(50) NOT NULL,
    role ENUM('admin', 'client') DEFAULT 'client'
);


CREATE TABLE menu (
    id_menu INT(11) AUTO_INCREMENT PRIMARY KEY,
    nomMenu VARCHAR(50) NOT NULL,
    archive ENUM('0', '1') DEFAULT '0'
);

CREATE TABLE plat (
    id_plat INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    ingredient TEXT NOT NULL,
    categorie VARCHAR(50) NOT NULL,
    description TEXT,
    prix DECIMAL(10, 2), -- Préciser la précision du prix (10 chiffres, 2 après la virgule)
    id_menu INT(11),
    FOREIGN KEY (id_menu) REFERENCES menu(id_menu) ON DELETE CASCADE
);


CREATE TABLE photo (
    id_photo INT(11) AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    data_photo LONGBLOB,
    id_plat INT(11), 
    FOREIGN KEY (id_plat) REFERENCES plat(id_plat) ON DELETE CASCADE
);

CREATE TABLE reservation (
    id_reservation INT(11) AUTO_INCREMENT PRIMARY KEY,
    date_r DATE NOT NULL,
    heure TIME NOT NULL, -- Pour l'heure, utiliser le type TIME
    nb_personne INT(11) NOT NULL,
    statut ENUM('confirmée', 'annulée', 'en attente') DEFAULT 'en attente',
    id_user INT(11),
    id_menu INT(11),
    FOREIGN KEY (id_menu) REFERENCES menu(id_menu) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE
);
