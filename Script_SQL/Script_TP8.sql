CREATE TABLE [role] (
  id_role  TINYINT      NOT NULL,
  libelle  VARCHAR(30)  NOT NULL,
  CONSTRAINT PK_role PRIMARY KEY (id_role)
);


CREATE TABLE partie (
  id_partie   INT IDENTITY(1,1) NOT NULL,
  date_partie DATE              NOT NULL,
  CONSTRAINT PK_partie PRIMARY KEY (id_partie)
);


CREATE TABLE joueur (
  id_joueur INT IDENTITY(1,1) NOT NULL,
  pseudo    VARCHAR(50)       NOT NULL,
  CONSTRAINT PK_joueur PRIMARY KEY (id_joueur)
);


CREATE TABLE personnage (
  id_perso INT IDENTITY(1,1) NOT NULL,
  nom      VARCHAR(50)       NOT NULL,
  CONSTRAINT PK_personnage PRIMARY KEY (id_perso)
);


CREATE TABLE piece (
  id_piece INT IDENTITY(1,1) NOT NULL,
  nom      VARCHAR(50)       NOT NULL,
  CONSTRAINT PK_piece PRIMARY KEY (id_piece)
);


CREATE TABLE objet (
  id_objet INT IDENTITY(1,1) NOT NULL,
  nom      VARCHAR(50)       NOT NULL,
  CONSTRAINT PK_objet PRIMARY KEY (id_objet)
);



CREATE TABLE contenir (
  id_piece INT NOT NULL,
  id_objet INT NOT NULL,
  CONSTRAINT PK_contenir PRIMARY KEY (id_piece, id_objet),
  CONSTRAINT FK_contenir_piece FOREIGN KEY (id_piece) REFERENCES piece(id_piece),
  CONSTRAINT FK_contenir_objet FOREIGN KEY (id_objet) REFERENCES objet(id_objet)
);



CREATE TABLE participation (
  id_partie INT     NOT NULL,
  id_joueur INT     NOT NULL,
  id_role   TINYINT NOT NULL,
  id_perso  INT     NULL,
  CONSTRAINT PK_participation PRIMARY KEY (id_partie, id_joueur),
  CONSTRAINT FK_participation_partie FOREIGN KEY (id_partie) REFERENCES partie(id_partie),
  CONSTRAINT FK_participation_joueur FOREIGN KEY (id_joueur) REFERENCES joueur(id_joueur),
  CONSTRAINT FK_participation_role   FOREIGN KEY (id_role)   REFERENCES [role](id_role),
  CONSTRAINT FK_participation_perso  FOREIGN KEY (id_perso)  REFERENCES personnage(id_perso)
);



CREATE TABLE presence (
  id_presence INT IDENTITY(1,1) NOT NULL,
  id_partie   INT               NOT NULL,
  id_perso    INT               NOT NULL,
  id_piece    INT               NOT NULL,
  date_jour   DATE              NOT NULL,
  heure_debut TIME              NOT NULL,
  heure_fin   TIME              NOT NULL,
  CONSTRAINT PK_presence PRIMARY KEY (id_presence),
  CONSTRAINT FK_presence_partie FOREIGN KEY (id_partie) REFERENCES partie(id_partie),
  CONSTRAINT FK_presence_perso  FOREIGN KEY (id_perso)  REFERENCES personnage(id_perso),
  CONSTRAINT FK_presence_piece  FOREIGN KEY (id_piece)  REFERENCES piece(id_piece)
);
