CREATE DATABASE CIEjemplo;

USE CIEjemplo;

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (

  id            INT             NOT NULL AUTO_INCREMENT,
  nombre        VARCHAR(50)     NOT NULL,
  apellido      VARCHAR(50)     NOT NULL,
  documento     VARCHAR(50)     NOT NULL,
  estado        BIT             NOT NULL DEFAULT TRUE,
  
  PRIMARY KEY (id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO usuarios (nombre, apellido, documento) VALUES
('Leonardo', 'Pardo', '20000001'),
('Nicolás', 'Pardo', '20000002'),
('Federico', 'Pardo', '20000003'),
('Sebastián', 'Pardo', '20000004'),
('Noelia', 'Pardo', '20000005'),
('Marianela', 'Pardo', '20000006');