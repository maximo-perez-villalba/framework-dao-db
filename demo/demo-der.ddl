SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `alumnos`;
DROP TABLE IF EXISTS `profesores`;
DROP TABLE IF EXISTS `materias`;
DROP TABLE IF EXISTS `alumnos_materias`;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `alumnos` (
	`uid` INTEGER NOT NULL AUTOINCREMENT,
	`nombres` VARCHAR(20) NOT NULL,
	`apellidos` VARCHAR(20) NOT NULL,
	`email` VARCHAR(30) NOT NULL,
	PRIMARY KEY (`uid`),
	UNIQUE (`email`)
);

CREATE TABLE `profesores` (
	`uid` INTEGER NOT NULL AUTOINCREMENT,
	`nombres` VARCHAR(20) NOT NULL,
	`apellidos` VARCHAR(20) NOT NULL,
	`email` VARCHAR(30) NOT NULL,
	PRIMARY KEY (`uid`),
	UNIQUE (`email`)
);

CREATE TABLE `materias` (
	`uid` INTEGER NOT NULL AUTOINCREMENT,
	`codigo` VARCHAR(10) NOT NULL,
	`nombre` VARCHAR(20) NOT NULL,
	`profesor_uid` INTEGER NOT NULL,
	PRIMARY KEY (`uid`),
	UNIQUE (`codigo`)
);

CREATE TABLE `alumnos_materias` (
	`uid` INTEGER NOT NULL,
	`alumno_uid` INTEGER NOT NULL,
	`materia_uid` INTEGER NOT NULL,
	PRIMARY KEY (`uid`)
);
