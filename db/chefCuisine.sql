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
    prix DECIMAL(10, 2),
    description VARCHAR(255),
    urlPhoto VARCHAR(255)
);
/*ALTER TABLE menu 
ADD COLUMN description VARCHAR(255);
ALTER TABLE menu 
ADD COLUMN urlPhoto VARCHAR(255);
*/

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

alter table reservation add COLUMN tel varchar(50) not null ; 
alter table reservation add COLUMN message text not null ; 
alter table reservation add COLUMN archive enum('0','1') DEFAULT '0' ; 


insert into role values(1 , "admin") ; 
insert into role values (2 , "client") ; 


INSERT INTO users (nom, email, mdp, id_role) 
VALUES ('Maymon Malik', 'malik@gmail.com', '$2b$12$L01BvLqN5ZDhPYZ4EugVOuApt97A7lOsDzWhzrsU3vvrIMODiGDWu', 2); --mdp : malik


INSERT INTO users (nom, email, mdp, id_role) VALUES ('jawad ousd' , 'jawad@gmail.com', '$2b$12$ZvJE/dEMOyDckl73cwYj9eZmNBuPjQ1SwiyRAz2ccMlQ0XC.0KqgK', 1); --mdp : ouss

INSERT INTO menu (nomMenu, archive, prix) 
VALUES 
    ('Menu Gourmet', '0', 50.00),
    ('Menu Prestige', '0', 75.00);
UPDATE menu 
SET description = 'Un menu élégant avec des plats raffinés, idéal pour les amateurs de gastronomie. Comprend une entrée, un plat principal, un dessert, et une boisson.',
urlPhoto = 'fish-menu.jpg'
WHERE nomMenu = 'Menu Gourmet';
UPDATE menu 
SET description = 'Un menu luxueux proposant des mets d exception, accompagnés des fruits exotic sélectionnés pour une expérience culinaire unique. Comprend plusieurs options pour chaque service.' ,
urlPhoto = 'menu-vegetarian.jpg'
WHERE nomMenu = 'Menu Prestige';

INSERT INTO menu (nomMenu, archive, prix, description, urlPhoto) 
VALUES 
    ('Menu Découverte', '0', 40.00, 
     'Découvrez nos spécialités locales avec une entrée, un plat principal, et un dessert.', 
     'menu-decouverte.jpg'),
    ('Menu Classique', '0', 30.00, 
     'Un menu simple et délicieux pour toute la famille, comprenant une soupe, un plat de viande ou de poisson, et un dessert.', 
     'menu-classique.jpg'),
    ('Menu Gourmet', '0', 60.00, 
     'Un menu raffiné pour les gourmets, avec une sélection de mets préparés par notre chef étoilé.', 
     'menu-gourmet.jpg');


-- Plats pour le Menu Gourmet
INSERT INTO plat (nom, ingredient, categorie, description, id_menu, photo)
VALUES
    ('Kir cassis et Feuilletés maison', 'Kir cassis, jus d’orange, feuilletés chauds maison (6 pièces/pers), chips, cacahuètes', 'Apéritif', 'Kir cassis accompagné de feuilletés maison et snacks variés.', 1, 'kir_cassis.jpg'),
    ('Terrine de canard et foie gras', 'Terrine de canard à l’orange, médaillon de foie gras, toasts', 'Entrée', 'Terrine et foie gras accompagnés de toasts.', 1, 'terrine_canard.jpg'),
    ('Médaillons de veau', 'Veau, champignons des bois, pommes fondantes, flan de légumes, tomate rôtie', 'Plat', 'Veau tendre avec garniture aux champignons.', 1, 'medaillon_veau.jpg'),
    ('Assiette de fromages du pays', 'Fromages variés locaux', 'Fromage', 'Sélection de fromages du terroir.', 1, 'fromage.jpg'),
    ('Nougat glacé', 'Nougat glacé aux amandes, coulis de fruits rouges', 'Dessert', 'Dessert glacé aux amandes et fruits rouges.', 1, 'nougat_glace.jpg'),
    ('Tarani Merlot Malbec et Cuvée Epicurius', 'Vin rouge, vin blanc ou rosé, café', 'Boisson', 'Sélection de vins et café.', 1, 'boisson_gourmet.jpg');

-- Plats pour le Menu Prestige
INSERT INTO plat (nom, ingredient, categorie, description, id_menu, photo)
VALUES
    ('Saumon fumé maison', 'Saumon fumé maison, crème d’aneth, bouquet de salades à l’huile d’olive', 'Entrée', 'Saumon fumé accompagné de crème d’aneth et salade.', 2, 'saumon_fume.jpg'),
    ('Pavé de bœuf aux 5 baies', 'Bœuf, pommes Château, haricots verts, tomate provençale', 'Plat', 'Pavé de bœuf aux épices et légumes.', 2, 'pave_boeuf.jpg'),
    ('Miroir framboises', 'Framboises, coulis de fruits rouges', 'Dessert', 'Gâteau miroir aux framboises.', 2, 'miroir_framboise.jpg'),
    ('Fromages et vin blanc', 'Sélection de fromages, vin blanc Bergerac Sauvignon 2019', 'Fromage', 'Fromages raffinés et vin blanc.', 2, 'fromages_vin.jpg'),
    ('Boisson complète', 'Vin rouge, vin blanc ou rosé, café', 'Boisson', 'Assortiment de vins et café.', 2, 'boisson_prestige.jpg');

INSERT INTO plat (nom, ingredient, categorie, description, id_menu, photo)
VALUES
    ('Salade César', 'Poulet, laitue, croûtons, sauce César', 'Entrée', 
     'Une salade classique avec des morceaux de poulet grillé et une sauce César maison.', 
     4, 'salade_cesar.jpg'),
    ('Poulet rôti aux herbes', 'Poulet, herbes de Provence, pommes de terre sautées', 'Plat', 
     'Poulet rôti tendre accompagné de pommes de terre sautées.', 
     4, 'poulet_roti.jpg'),
    ('Tarte Tatin', 'Pommes caramélisées, pâte feuilletée, crème fraîche', 'Dessert', 
     'Une tarte classique aux pommes caramélisées.', 
     4, 'tarte_tatin.jpg');


## inseration ds reservation pour user_id = 1 
INSERT INTO reservation (date_r, heure_r, nb_personne_r, statut_r, id_user, id_menu)
VALUES
('2024-12-15', '17:00:00', 2, 'confirmée', 1, 1),
('2024-12-16', '19:30:00', 4, 'en attente', 1, 2),  
('2024-12-17', '20:00:00', 3, 'confirmée', 1, 3),  
('2024-12-18', '18:30:00', 5, 'confirmée', 1, 4),  
('2024-12-19', '21:00:00', 2, 'en attente', 1, 5), 
('2024-12-20', '17:30:00', 6, 'confirmée', 1, 1),  
('2024-12-21', '19:00:00', 4, 'confirmée', 1, 2),  
('2024-12-22', '20:30:00', 3, 'en attente', 1, 3),  
('2024-12-23', '18:00:00', 5, 'confirmée', 1, 4), 
('2024-12-24', '21:30:00', 2, 'confirmée', 1, 5); 


## select prochaine reservation 
select * from reservation 
where date_r >= CURRENT_DATE()
and statut_r = "confirmée"
order by date_r ASC
limit 1        il affiche la prochaine reservation ; 