#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: T_CATEGORIE
#------------------------------------------------------------

CREATE TABLE T_CATEGORIE(
        idCategorie Int  Auto_increment  NOT NULL ,
        libelle     Varchar (100) NOT NULL
	,CONSTRAINT T_CATEGORIE_PK PRIMARY KEY (idCategorie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: T_PRODUIT
#------------------------------------------------------------

CREATE TABLE T_PRODUIT(
        idProduit   Int  Auto_increment  NOT NULL ,
        Designation Varchar (100) NOT NULL ,
        prix        Float NOT NULL ,
        Stock       Int NOT NULL ,
        Description Varchar (100) NOT NULL ,
        Image       Varchar (100) NOT NULL ,
        idCategorie Int NOT NULL
	,CONSTRAINT T_PRODUIT_PK PRIMARY KEY (idProduit)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: T_USER
#------------------------------------------------------------

CREATE TABLE T_USER(
        email       Varchar (100) NOT NULL ,
        nom         Varchar (100) NOT NULL ,
        prenom      Varchar (100) NOT NULL ,
        adresse     Varchar (100) NOT NULL ,
        codePostale Varchar (100) NOT NULL ,
        motDePasse  Varchar (100) NOT NULL ,
        idPannier   Int NOT NULL
	,CONSTRAINT T_USER_PK PRIMARY KEY (email)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: T_COMMANDE
#------------------------------------------------------------

CREATE TABLE T_COMMANDE(
        id    Int  Auto_increment  NOT NULL ,
        email Varchar (100) NOT NULL
	,CONSTRAINT T_COMMANDE_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: T_PANNIER
#------------------------------------------------------------

CREATE TABLE T_PANNIER(
        idPannier Int  Auto_increment  NOT NULL ,
        email     Varchar (100) NOT NULL
	,CONSTRAINT T_PANNIER_PK PRIMARY KEY (idPannier)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Appartenir
#------------------------------------------------------------

CREATE TABLE Appartenir(
        idProduit Int NOT NULL ,
        id        Int NOT NULL ,
        quantite  Int NOT NULL
	,CONSTRAINT Appartenir_PK PRIMARY KEY (idProduit,id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contenir
#------------------------------------------------------------

CREATE TABLE Contenir(
        idProduit Int NOT NULL ,
        idPannier Int NOT NULL ,
        quantite  Int NOT NULL
	,CONSTRAINT Contenir_PK PRIMARY KEY (idProduit,idPannier)
)ENGINE=InnoDB;




ALTER TABLE T_PRODUIT
	ADD CONSTRAINT T_PRODUIT_T_CATEGORIE0_FK
	FOREIGN KEY (idCategorie)
	REFERENCES T_CATEGORIE(idCategorie);

ALTER TABLE T_USER
	ADD CONSTRAINT T_USER_T_PANNIER0_FK
	FOREIGN KEY (idPannier)
	REFERENCES T_PANNIER(idPannier);

ALTER TABLE T_USER 
	ADD CONSTRAINT T_USER_T_PANNIER0_AK 
	UNIQUE (idPannier);

ALTER TABLE T_COMMANDE
	ADD CONSTRAINT T_COMMANDE_T_USER0_FK
	FOREIGN KEY (email)
	REFERENCES T_USER(email);

ALTER TABLE T_PANNIER
	ADD CONSTRAINT T_PANNIER_T_USER0_FK
	FOREIGN KEY (email)
	REFERENCES T_USER(email);

ALTER TABLE T_PANNIER 
	ADD CONSTRAINT T_PANNIER_T_USER0_AK 
	UNIQUE (email);

ALTER TABLE Appartenir
	ADD CONSTRAINT Appartenir_T_PRODUIT0_FK
	FOREIGN KEY (idProduit)
	REFERENCES T_PRODUIT(idProduit);

ALTER TABLE Appartenir
	ADD CONSTRAINT Appartenir_T_COMMANDE1_FK
	FOREIGN KEY (id)
	REFERENCES T_COMMANDE(id);

ALTER TABLE Contenir
	ADD CONSTRAINT Contenir_T_PRODUIT0_FK
	FOREIGN KEY (idProduit)
	REFERENCES T_PRODUIT(idProduit);

ALTER TABLE Contenir
	ADD CONSTRAINT Contenir_T_PANNIER1_FK
	FOREIGN KEY (idPannier)
	REFERENCES T_PANNIER(idPannier);
