CREATE TABLE tbl_user (
    id_user INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL,
    tipo  CHAR(1) NOT NULL,
    codigo VARCHAR(128) NOT NULL,
    activo TINYINT(1) NOT NULL DEFAULT 0
);

INSERT INTO tbl_user (username, password, email,tipo,codigo,activo) VALUES ('test', 'pass', 'test1@example.com','a','123456',1);
INSERT INTO tbl_user (username, password, email,tipo,codigo,activo) VALUES ('doc', 'pass', 'test1@example.com','d','123456',1);
INSERT INTO tbl_user (username, password, email,tipo,codigo,activo) VALUES ('pas', 'pass', 'test1@example.com','p','123456',1);

