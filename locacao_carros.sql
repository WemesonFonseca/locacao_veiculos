create database Locacao_carros;

use Locacao_carros;

/*Tabela Usuário*/
create table USU_Usuario
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
primary key (car_cod), 
unique key (car_placa));


/*Inserindo dados dos carros, (Obs: dados fictícios)*/
insert into CAR_Carro values 
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
create table HIS_Historico (
his_id int not null auto_increment,
car_cod int not null,
usu_cod int not null,
car_placa varchar(8),
car_desc varchar(45),
data_aluguel date not null,
primary key (his_id),
foreign key (usu_cod) references USU_Usuario(usu_cod),
foreign key (car_cod) references CAR_Carro(car_cod));