CREATE DATABASE SqlSecurity;

CREATE TABLE login(
	user_id INT NOT NULL AUTO_INCREMENT,
    `user` VARCHAR(200),
    senha VARCHAR(100),
     PRIMARY KEY(user_id)
    
);
INSERT INTO login (`user`, senha) VALUES ( 'teste','123');
DROP TABLE login;

SELECT * FROM login;