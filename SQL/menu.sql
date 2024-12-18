CREATE DATABASE menu  ;
use menu ; 

create table role (id int(11) PRIMARY key AUTO_INCREMENT , 
                    role ENUM('admin', 'client') DEFAULT 'client'	);
CREATE TABLE users (
    id_user INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    email VARCHAR(50) NOT NULL,
    mdp VARCHAR(50) NOT NULL,
    id_role int(11) NOT NULL,
      FOREIGN KEY (id_role) REFERENCES role(id_role) ON DELETE CASCADE
);


CREATE TABLE menu (
    id_menu INT(11) AUTO_INCREMENT PRIMARY KEY,
    nomMenu VARCHAR(50) NOT NULL,
    archive ENUM('0', '1') DEFAULT '0',
    prix DECIMAL(10, 2),
);

CREATE TABLE plat (
    id_plat INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    ingredient TEXT NOT NULL,
    categorie VARCHAR(50) NOT NULL,
    description TEXT,
    id_menu INT(11),
    photo varchar(100) , 
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



-- modification de role 

create table role (id int(11) PRIMARY key AUTO_INCREMENT , 
                    role varchar(10)  NOT null	);

alter table users drop COLUMN role ;        

alter table users ADD id_role int(11) NOT null REFERENCES role(id);