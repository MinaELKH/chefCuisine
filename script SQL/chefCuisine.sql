CREATE DATABASE chefcuisine  ;
use chefcuisine ; 

create table role (id int(11) PRIMARY key  , 
                    role ENUM('admin', 'client') DEFAULT 'client'	);
CREATE TABLE users (
    id_user INT(11) AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    email VARCHAR(50) NOT NULL,
    mdp VARCHAR(255) NOT NULL,
    id_role int(11) NOT NULL,
      FOREIGN KEY (id_role) REFERENCES role(id) 
);


CREATE TABLE menu (
    id_menu INT(11) AUTO_INCREMENT PRIMARY KEY,
    nomMenu VARCHAR(50) NOT NULL,
    archive ENUM('0', '1') DEFAULT '0',
    prix DECIMAL(10, 2)
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


CREATE TABLE reservation (
    id_reservation INT(11) AUTO_INCREMENT PRIMARY KEY,
    date_r DATE NOT NULL,
    heure_r TIME NOT NULL, -- Pour l'heure, utiliser le type TIME
    nb_personne_r INT(11) NOT NULL,
    statut_r ENUM('confirmée', 'annulée', 'en attente') DEFAULT 'en attente',
    id_user INT(11),
    id_menu INT(11),
    FOREIGN KEY (id_menu) REFERENCES menu(id_menu) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES users(id_user) ON DELETE CASCADE
);





insert into role(1 , "admin") ; 
insert into role(2 , "client") ; 


INSERT INTO users (nom, email, mdp, id_role) 
VALUES ('Maymon Malik', 'malik@gmail.com', '$2b$12$L01BvLqN5ZDhPYZ4EugVOuApt97A7lOsDzWhzrsU3vvrIMODiGDWu', 2); --mdp : malik


INSERT INTO users (nom, email, mdp, id_role) VALUES ('jawad ousd' , 'jawad@gmail.com', '$2b$12$ZvJE/dEMOyDckl73cwYj9eZmNBuPjQ1SwiyRAz2ccMlQ0XC.0KqgK', 1); --mdp : ouss