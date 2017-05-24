-- Big Brother : Serveur National auquel se réfère le site web pour obtenir la clé publique du token, et le secret associé à un électeur.

-- zweisamkeit@Armory [ ProjetMobilite ] --> mysql -u root -ptoor
-- MariaDB [(none)]> create database bigbrother;
-- MariaDB [(none)]> exit
-- zweisamkeit@Armory [ ProjetMobilite ] --> mysql -u root -ptoor bigbrother < bigbrother.sql
-- zweisamkeit@Armory [ ProjetMobilite ] --> mysql -u root -ptoor
-- MariaDB [(none)]> use bigbrother;
-- MariaDB [bigbrother]> show tables
--    -> ;
--	+----------------------+
--	| Tables_in_bigbrother |
--	+----------------------+
--	| Candidats            |
--	| Certificats          |
--	| Electeurs            |
--	| Tokens               |
--	+----------------------+



CREATE TABLE Candidats (id_candidat INT not null, Nom VARCHAR (255) not null, Score INT not null, PRIMARY KEY (id_candidat));

CREATE TABLE Electeurs (id_electeur INT not null, id_token INT not null, secret VARCHAR (255) not null, A_vote BOOLEAN not null, PRIMARY KEY (id_electeur));

CREATE TABLE Tokens (id_token INT not null, id_cert INT not null, PRIMARY KEY (id_token));

CREATE TABLE Certificats (id_cert INT not null, cert VARCHAR (255) not null, PRIMARY KEY (id_cert));



INSERT INTO Candidats (id_candidat, Nom, Score) VALUES (0, 'Wladimir d\'Ormesson (LR)', 0);
INSERT INTO Candidats (id_candidat, Nom, Score) VALUES (1, 'Laurent Sorcelle (UDI)', 0);
INSERT INTO Candidats (id_candidat, Nom, Score) VALUES (3, 'Céline Bézoui (PS)', 0);
INSERT INTO Candidats (id_candidat, Nom, Score) VALUES (4, 'Marie-Christine Baudouin (PCF)', 0);
INSERT INTO Candidats (id_candidat, Nom, Score) VALUES (5, 'François Cormier-Bouligeon (LRM)', 0);
INSERT INTO Candidats (id_candidat, Nom, Score) VALUES (6, 'Jean-René Coueille (FN)', 0);
INSERT INTO Candidats (id_candidat, Nom, Score) VALUES (7, 'Françoise Pouzet (EELV)', 0);
INSERT INTO Candidats (id_candidat, Nom, Score) VALUES (8, 'Frédéric Renard (LFI)', 0);
INSERT INTO Candidats (id_candidat, Nom, Score) VALUES (9, 'Romain Guillaume (UPR)', 0);

INSERT INTO Electeurs (id_electeur, id_token, secret, A_vote) VALUES (0, 0, 'azerty', False);
INSERT INTO Electeurs (id_electeur, id_token, secret, A_vote) VALUES (1, 0, 'password', True);
INSERT INTO Electeurs (id_electeur, id_token, secret, A_vote) VALUES (2, 1, 'qwerty', True);
INSERT INTO Electeurs (id_electeur, id_token, secret, A_vote) VALUES (3, 3, 'poney', False);
INSERT INTO Electeurs (id_electeur, id_token, secret, A_vote) VALUES (4, 2, '123456', True);
INSERT INTO Electeurs (id_electeur, id_token, secret, A_vote) VALUES (5, 2, 'dragon', True);
INSERT INTO Electeurs (id_electeur, id_token, secret, A_vote) VALUES (6, 1, 'spiderman', False);
INSERT INTO Electeurs (id_electeur, id_token, secret, A_vote) VALUES (7, 0, 'asterix', True);
INSERT INTO Electeurs (id_electeur, id_token, secret, A_vote) VALUES (8, 3, 'election', True);

INSERT INTO Tokens (id_token, id_cert) VALUES (0,0);
INSERT INTO Tokens (id_token, id_cert) VALUES (1,1);
INSERT INTO Tokens (id_token, id_cert) VALUES (2,2);
INSERT INTO Tokens (id_token, id_cert) VALUES (3,3);

INSERT INTO Certificats (id_cert, cert) VALUES (0, 'n=219&e=5');
INSERT INTO Certificats (id_cert, cert) VALUES (1, 'n=219&e=5');
INSERT INTO Certificats (id_cert, cert) VALUES (2, 'n=219&e=5');
INSERT INTO Certificats (id_cert, cert) VALUES (3, 'n=219&e=5');


