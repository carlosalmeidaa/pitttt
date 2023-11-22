CREATE DATABASE pet_care_db;

USE pet_care_db;

CREATE TABLE `usuarios` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`usuario` varchar(50) not null,
`nome` VARCHAR( 50 ) NOT NULL ,
`email` VARCHAR( 50 ) NOT NULL ,
`senha` VARCHAR( 70 ) NOT NULL ,
`telefone` VARCHAR( 75 ) NOT NULL ,
`foto` VARCHAR( 100 ) NOT NULL,
`data_nascimento` VARCHAR( 100 ) NOT NULL,
`nome_cachorro` varchar(100) not null
) ENGINE = MYISAM ;


CREATE TABLE `pets` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(50) NOT NULL,
  `especie` VARCHAR(50) NOT NULL,
  `cor` VARCHAR(50) NOT NULL,
  `idade` INT,
  `ultimo_local_visto` VARCHAR(100),
  `imagem` varchar(50)not null
) ENGINE = MYISAM ;


CREATE TABLE  `images` (
`id`  int(11),
`image` varchar(100),
`image_text` text
)ENGINE = MYISAM ;