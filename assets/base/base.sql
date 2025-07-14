CREATE TABLE preteur_membre (
    id_membre INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50), 
    date_naissance DATE,
    genre VARCHAR(1), 
    email VARCHAR(50), 
    ville VARCHAR(50),
    mot_de_passe VARCHAR(50), 
    image_profil VARCHAR(50)
);

CREATE TABLE preteur_categorie_objet (
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    nom_categorie VARCHAR(50)
);

CREATE TABLE preteur_objet (
    id_objet INT PRIMARY KEY AUTO_INCREMENT,
    nom_objet VARCHAR(50),
    id_categorie INT,
    id_membre INT,
    FOREIGN KEY (id_categorie) REFERENCES preteur_categorie_objet(id_categorie),
    FOREIGN KEY (id_membre) REFERENCES preteur_membre(id_membre)

);




CREATE TABLE preteur_image_object (
    id_image INT PRIMARY KEY AUTO_INCREMENT,
    id_objet INT,
    nom_image VARCHAR(50),
    FOREIGN KEY (id_objet) REFERENCES preteur_objet(id_objet)
);

CREATE TABLE preteur_emprunt (
    id_emprunt INT PRIMARY KEY AUTO_INCREMENT,
    id_objet INT,
    id_membre INT,
    date_emprunt DATE,
    date_retour DATE,
    FOREIGN KEY (id_objet) REFERENCES preteur_objet(id_objet),
    FOREIGN KEY (id_membre) REFERENCES preteur_membre(id_membre)
);

INSERT INTO preteur_membre (nom, date_naissance, genre, email, ville, mot_de_passe, image_profil) VALUES
('Alice', '1995-03-12', 'F', 'alice@mail.com', 'Paris', '1234', 'alice.jpg'),
('Bob', '1990-07-22', 'M', 'bob@mail.com', 'Lyon', 'abcd', 'bob.jpg'),
('Claire', '1988-11-05', 'F', 'claire@mail.com', 'Toulouse', 'xyz', 'claire.jpg'),
('David', '1992-01-17', 'M', 'david@mail.com', 'Marseille', 'pass', 'david.jpg');

INSERT INTO preteur_categorie_objet (nom_categorie) VALUES
('Esthétique'), ('Bricolage'), ('Mécanique'), ('Cuisine');


-- Objets d'Alice (membre 1)
INSERT INTO preteur_objet (nom_objet, id_categorie, id_membre) VALUES
('Sèche-cheveux', 1, 1),
('Crème visage', 1, 1),
('Miroir LED', 1, 1),
('Marteau', 2, 1),
('Perceuse', 2, 1),
('Clé plate', 3, 1),
('Cric voiture', 3, 1),
('Fouet', 4, 1),
('Balance cuisine', 4, 1),
('Mixeur', 4, 1);

-- Objets de Bob (membre 2)
INSERT INTO preteur_objet (nom_objet, id_categorie, id_membre) VALUES
('Tondeuse barbe', 1, 2),
('Parfum', 1, 2),
('Boîte à outils', 2, 2),
('Visseuse', 2, 2),
('Pince multiprise', 2, 2),
('Clé à molette', 3, 2),
('Pompe à vélo', 3, 2),
('Batteur électrique', 4, 2),
('Cuiseur vapeur', 4, 2),
('Poêle antiadhésive', 4, 2);

-- Objets de Claire (membre 3)
INSERT INTO preteur_objet (nom_objet, id_categorie, id_membre) VALUES
('Fer à lisser', 1, 3),
('Lotion peau', 1, 3),
('Ponceuse', 2, 3),
('Scie sauteuse', 2, 3),
('Tournevis', 2, 3),
('Manomètre', 3, 3),
('Compresseur', 3, 3),
('Grille-pain', 4, 3),
('Casserole', 4, 3),
('Blender', 4, 3);

-- Objets de David (membre 4)
INSERT INTO preteur_objet (nom_objet, id_categorie, id_membre) VALUES
('Brosse nettoyante', 1, 4),
('Baume à lèvres', 1, 4),
('Échelle', 2, 4),
('Scie circulaire', 2, 4),
('Pince coupante', 2, 4),
('Crics hydraulique', 3, 4),
('Tournevis dynamométrique', 3, 4),
('Couteau de chef', 4, 4),
('Planche à découper', 4, 4),
('Four micro-ondes', 4, 4);


INSERT INTO preteur_image_object (id_objet, nom_image) VALUES
(1, 'seche.jpg'), (2, 'creme.jpg'), (3, 'miroir.jpg'), (4, 'marteau.jpg'), (5, 'perceuse.jpg'),
(6, 'cle.jpg'), (7, 'cric.jpg'), (8, 'fouet.jpg'), (9, 'balance.jpg'), (10, 'mixeur.jpg'),
(11, 'tondeuse.jpg'), (12, 'parfum.jpg'), (13, 'boite.jpg'), (14, 'visseuse.jpg'), (15, 'pince.jpg'),
(16, 'molette.jpg'), (17, 'pompe.jpg'), (18, 'batteur.jpg'), (19, 'cuiseur.jpg'), (20, 'poele.jpg'),
(21, 'fer.jpg'), (22, 'lotion.jpg'), (23, 'ponceuse.jpg'), (24, 'scie.jpg'), (25, 'tournevis.jpg'),
(26, 'mano.jpg'), (27, 'compresseur.jpg'), (28, 'grille.jpg'), (29, 'casserole.jpg'), (30, 'blender.jpg'),
(31, 'brosse.jpg'), (32, 'baume.jpg'), (33, 'echelle.jpg'), (34, 'circulaire.jpg'), (35, 'pincecoup.jpg'),
(36, 'hydraulique.jpg'), (37, 'tournevis_dyn.jpg'), (38, 'couteau.jpg'), (39, 'planche.jpg'), (40, 'micro.jpg');


-- Format : id_objet, id_membre_emprunteur, date_emprunt, date_retour
INSERT INTO preteur_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(1, 2, '2025-07-01', '2025-07-05'), -- Bob emprunte sèche-cheveux (Alice)
(14, 1, '2025-07-02', '2025-07-06'), -- Alice emprunte visseuse (Bob)
(25, 4, '2025-07-03', '2025-07-07'), -- David emprunte tournevis (Claire)
(36, 3, '2025-07-04', '2025-07-08'), -- Claire emprunte cric (David)
(10, 2, '2025-07-05', '2025-07-09'), -- Bob emprunte mixeur (Alice)
(20, 1, '2025-07-06', '2025-07-10'), -- Alice emprunte poêle (Bob)
(28, 4, '2025-07-07', '2025-07-11'), -- David emprunte grille-pain (Claire)
(39, 3, '2025-07-08', '2025-07-12'), -- Claire emprunte planche (David)
(17, 1, '2025-07-09', '2025-07-13'), -- Alice emprunte pompe à vélo (Bob)
(5, 3, '2025-07-10', '2025-07-14'); -- Claire emprunte perceuse (Alice)
