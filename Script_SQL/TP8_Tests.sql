USE cluedo;
GO


-- 1 Lister tous les personnages du jeu
------------------------------------------------------------
SELECT id_perso, nom AS nom_personnage
FROM dbo.personnage;
GO


-- 2 Lister chaque joueur et son personnage associe
------------------------------------------------------------
SELECT j.pseudo AS joueur,
       p.nom AS personnage
FROM dbo.participation pa
JOIN dbo.joueur j ON pa.id_joueur = j.id_joueur
LEFT JOIN dbo.personnage p ON pa.id_perso = p.id_perso;
GO


-- 3  Afficher les personnages présents dans la Cuisine entre 08:00 et 09:00
------------------------------------------------------------
SELECT per.nom AS personnage,
       pi.nom AS piece,
       pr.date_jour,
       pr.heure_debut,
       pr.heure_fin
FROM dbo.presence pr
JOIN dbo.personnage per ON pr.id_perso = per.id_perso
JOIN dbo.piece pi ON pr.id_piece = pi.id_piece
WHERE pi.nom = 'Cuisine'
  AND pr.heure_debut >= '08:00:00'
  AND pr.heure_fin <= '09:00:00';
GO


-- 4  Afficher les pieces ou aucun personnage n'est alle
------------------------------------------------------------
SELECT p.nom AS piece_sans_presence
FROM dbo.piece p
LEFT JOIN dbo.presence pr ON p.id_piece = pr.id_piece
WHERE pr.id_piece IS NULL;
GO


-- 5 Compter le nombre d'objets par piece
------------------------------------------------------------
SELECT pi.nom AS piece,
       COUNT(o.id_objet) AS nb_objets
FROM dbo.piece pi
LEFT JOIN dbo.contenir c ON pi.id_piece = c.id_piece
LEFT JOIN dbo.objet o ON c.id_objet = o.id_objet
GROUP BY pi.nom;
GO


-- 6 Ajouter une piece
------------------------------------------------------------
INSERT INTO dbo.piece(nom)
VALUES ('Salle de bain');
GO


-- 7 Modifier un objet
-- Exemple : renommer 'Matraque' en 'Poignard'
------------------------------------------------------------
UPDATE dbo.objet
SET nom = 'Poignard'
WHERE nom = 'Matraque';
GO


-- 8 Supprimer une piece
-- Exemple : supprimer la 'Salle de bain' en respectant les contraintes
------------------------------------------------------------
DELETE FROM dbo.contenir
WHERE id_piece = (SELECT id_piece FROM dbo.piece WHERE nom = 'Salle de bain');

DELETE FROM dbo.presence
WHERE id_piece = (SELECT id_piece FROM dbo.piece WHERE nom = 'Salle de bain');

DELETE FROM dbo.piece
WHERE nom = 'Salle de bain';
GO


-- Verification générale : Affichage des tables principales
------------------------------------------------------------
SELECT * FROM dbo.personnage;
SELECT * FROM dbo.joueur;
SELECT * FROM dbo.piece;
SELECT * FROM dbo.objet;
SELECT * FROM dbo.contenir;
SELECT * FROM dbo.presence;
SELECT * FROM dbo.participation;
GO
