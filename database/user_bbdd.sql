DROP DATABASE IF EXISTS user_bbdd;

CREATE DATABASE user_bbdd;
USE user_bbdd;

CREATE TABLE usuarios (
	usuario varchar(45) PRIMARY KEY,
	clave varchar(45) NOT NULL,
	admin boolean NOT NULL
);

CREATE TABLE datosPersonales(
	usuario varchar(45) PRIMARY KEY,
	nombre varchar(65),
	email varchar(45),
	FOREIGN KEY (usuario) REFERENCES usuarios(usuario)
);

CREATE TABLE categorias (
	ID_Categoria int AUTO_INCREMENT PRIMARY KEY,
	categoria varchar(45) NOT NULL,
	descripcion varchar(155) NOT NULL,
	ruta varchar(40) NOT NULL
);

CREATE TABLE permisos(
	usuario varchar(45),
	ID_Categoria int,
	PRIMARY KEY (usuario,ID_Categoria),
	FOREIGN KEY (ID_Categoria) REFERENCES categorias(ID_Categoria),
	FOREIGN KEY (usuario) REFERENCES usuarios(usuario)
);

INSERT INTO categorias (categoria, descripcion, ruta) VALUES
('Calculadora Alcance 1', 'Esta es la CALCULADORA A1', 'calculadoraA1.html'),
('Calculadora Alcance 2', 'Esta es la CALCULADORA A2', 'calculadoraA2.html');

INSERT INTO usuarios VALUES
('UsuarioTest','321asddsa123','0');