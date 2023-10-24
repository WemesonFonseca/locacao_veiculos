create database Locacao_carros;

use locacao_carros;

/*Tabela Usuário*/
create table Usu_Usuario
(usu_cod int not null auto_increment,
nome_usuario varchar(45) null,
senha_usuario varchar(45) null,
email_usuario varchar(45) not null,
primary key(usu_cod));

/*Tabela Carro*/
create table CAR_Carro
(car_cod int not null auto_increment,
car_placa varchar(8) not null,
car_desc varchar(45),
data_aluguel date null,
primary key (car_cod), 
unique key (car_placa));

/*Inserindo dados dos carros, (Obs: dados fictícios)*/
insert into CAR_carro values 
('1', 'JGO-3055', 'Compacto Plus'),
('2', 'JKF-0629', 'Sedan Econômico'),
('3', 'JHI-2649', 'Minivan'),
('4', 'JHG-4765', 'Compacto Popular'),
('5', 'JEP-7821', 'Execultivo de Luxo'),
('6', 'JIR-7167', 'SUV Manual'),
('7', 'JGT-9126', 'SUV Automático'),
('8', 'JKE-4598', 'Caminhonete 4x4'),
('9', 'JGQ-3342', 'Forgão');

/*Tabela histórico*/
CREATE TABLE his_historico (
    his_id INT NOT NULL AUTO_INCREMENT,
    car_cod INT NOT NULL,
    usu_cod INT,
    car_placa varchar(8),
    car_desc VARCHAR(45),
    data_aluguel DATE NOT NULL,
    PRIMARY KEY (his_id),
	FOREIGN KEY (usu_cod) REFERENCES usu_usuario(usu_cod),
    FOREIGN KEY (car_cod) REFERENCES CAR_Carro(car_cod));

