USE cluedo;
GO


INSERT INTO dbo.[role](id_role, libelle) VALUES
(1, 'MAITRE_JEU'),
(2, 'JOUEUR'),
(3, 'OBSERVATEUR');


INSERT INTO dbo.partie(date_partie)
VALUES ('2025-11-01');


INSERT INTO dbo.joueur(pseudo)
VALUES ('alice'),
       ('bob');


INSERT INTO dbo.personnage(nom)
VALUES ('Colonel Moutarde'),
       ('Mme Leblanc');

INSERT INTO dbo.piece(nom)
VALUES ('Cuisine'),
       ('Salon'),
       ('Bibliothèque'),
       ('Bureau');


INSERT INTO dbo.objet(nom)
VALUES ('Corde'),
       ('Chandelier'),
       ('Matraque');


INSERT INTO dbo.contenir(id_piece, id_objet)
VALUES (1, 1),  
       (2, 2);  


INSERT INTO dbo.participation(id_partie, id_joueur, id_role, id_perso)
VALUES (1, 1, 1, NULL),   
       (1, 2, 2, 1);      


INSERT INTO dbo.presence(id_partie, id_perso, id_piece, date_jour, heure_debut, heure_fin)
VALUES (1, 1, 1, '2025-11-01', '08:15:00', '08:45:00');


SELECT TOP (5) * FROM dbo.piece;
SELECT TOP (5) * FROM dbo.objet;
SELECT TOP (5) * FROM dbo.contenir;
SELECT TOP (5) * FROM dbo.participation;
SELECT TOP (5) * FROM dbo.presence;
GO
