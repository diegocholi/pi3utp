CREATE DATABASE pi3utp;
DROP DATABASE pi3utp;

USE pi3utp;

/* Tabela: (null) */
CREATE TABLE usuario (
    idUsuario Integer not null auto_increment,
    login Varchar(10),
    senha Varchar(200),
   PRIMARY KEY (idUsuario)
);

/* Tabela: (null) */
CREATE TABLE equipe (
    idEquipe Integer not null auto_increment,
    nomeEquipe Varchar(50),
    nomeCarro Char(100),
    cor Char(8),
    foto Char(100),
    notaEquipe INT DEFAULT 0,
   PRIMARY KEY (idEquipe)
);

/* Tabela: (null) */
CREATE TABLE Aluno (
    idAluno Integer not null  auto_increment,
    nomeAluno Varchar(200),
    idEquipe Integer not null,
   PRIMARY KEY (idAluno)
);

/* Tabela: (null) */
CREATE TABLE prova (
    idProva Integer not null auto_increment,
    idEquipe Integer not null,
   PRIMARY KEY (idProva)
);

/* Tabela: (null) */
CREATE TABLE rampa (
    idProvaRampa Integer not null auto_increment,
    distancia Float(10,2),
    idProva Integer not null,
   PRIMARY KEY (idProvaRampa)
);

/* Tabela: (null) */
CREATE TABLE tracao (
    idProvaTracao Integer not null auto_increment,
    peso Float(10,2),
    idProva Integer not null,
   PRIMARY KEY (idProvaTracao)
);

/* Tabela: (null) */
CREATE TABLE velocidade (
    idProvaVelocidade Integer not null auto_increment,
    KMH Float(10,2),
    MS Float(10,2),
    idProva Integer not null,
   PRIMARY KEY (idProvaVelocidade)
);

/* Tabela: (null) */
CREATE TABLE pista (
    idPorvaPista Integer not null auto_increment,
    tempo Float(10,2),
    furarCone Integer,
    bater Integer,
    sairPista Integer,
    idProva Integer not null,
   PRIMARY KEY (idPorvaPista)
);

/* Relacionamentos */
ALTER TABLE Aluno ADD CONSTRAINT FK_Aluno_9 FOREIGN KEY (idEquipe) REFERENCES equipe(idEquipe) ON DELETE CASCADE;
ALTER TABLE prova ADD CONSTRAINT FK_prova_11 FOREIGN KEY (idEquipe) REFERENCES equipe(idEquipe);
ALTER TABLE velocidade ADD CONSTRAINT FK_velocidade_18 FOREIGN KEY (idProva) REFERENCES prova(idProva);
ALTER TABLE tracao ADD CONSTRAINT FK_tracao_20 FOREIGN KEY (idProva) REFERENCES prova(idProva);
ALTER TABLE rampa ADD CONSTRAINT FK_rampa_21 FOREIGN KEY (idProva) REFERENCES prova(idProva);
ALTER TABLE pista ADD CONSTRAINT FK_pista_22 FOREIGN KEY (idProva) REFERENCES prova(idProva);

INSERT INTO usuario (login, senha) VALUES ('professor','c323b35027629db8189c5e15fe423e69');
SELECT * FROM usuario;

SELECT  E.idEquipe, nomeEquipe, distancia FROM rampa AS R INNER JOIN prova AS P ON R.idProva = P.idProva
						INNER JOIN equipe AS E ON P.idEquipe = E.idEquipe ORDER BY distancia DESC;
                        
SELECT E.idEquipe, nomeEquipe, peso FROM tracao AS T INNER JOIN prova AS P ON T.idProva = P.idProva
						INNER JOIN equipe AS E ON P.idEquipe = E.idEquipe ORDER BY peso DESC;
                        
SELECT E.idEquipe, nomeEquipe, KMH, MS FROM velocidade AS V INNER JOIN prova AS P ON V.idProva = P.idProva
						INNER JOIN equipe AS E ON P.idEquipe = E.idEquipe ORDER BY MS DESC;
                        
SELECT E.idEquipe, nomeEquipe, (tempo +  furarCone + bater + SairPista) AS tempoLiquido, furarCone, bater, sairPista FROM pista AS PI INNER JOIN prova AS P ON PI.idProva = P.idProva
						INNER JOIN equipe AS E ON P.idEquipe = E.idEquipe ORDER BY tempoLiquido ASC;                      

UPDATE equipe SET notaEquipe = 0 WHERE notaEquipe >= 1 AND idEquipe BETWEEN 1 and 50;

SELECT nomeEquipe, notaEquipe FROM equipe ORDER BY notaEquipe DESC;
