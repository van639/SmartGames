create database dbSmartGames;

use dbSmartGames;

create table tbljogo (
	idjogo int not null auto_increment primary key,
    nome varchar (150) not null,
    descricao text,
    foto varchar (300) not null,
    valor varchar (45) not null,
    
    unique index (idjogo)
);

insert into tbljogo ( nome, descricao, foto, valor ) values ( 'Batman arkham city', 'Batman: Arkham City é um jogo eletrônico de Ação-Aventura e Stealth, baseado na série de quadrinhos Batman da DC Comics. O jogo é distribuído para: PlayStation 3, Xbox 360 e Microsoft Windows. Foi desenvolvido pela Rocksteady Studios e foi publicado pela Warner Bros. Interactive Entertainment e DC Entertainment.',
 'https://upload.wikimedia.org/wikipedia/pt/thumb/f/f0/Batman_arkham_city_logo.jpg/200px-Batman_arkham_city_logo.jpg', '31' );
 
 select * from tbljogo;
 
 /*delete from tbljogo where idjogo > 4;*/

create table tblcliente (
	idcliente int not null auto_increment primary key,
    nome varchar (150) not null,
    email varchar(100),
    senha varchar (45) not null,
    cpf varchar (20) not null,
    idendereco int not null,
    
    constraint FK_Endereco_Cliente
    foreign key (idendereco) 
    references tblendereco (idendereco),
    
    unique index (idcliente)
);

create table tblendereco (
	idendereco int not null auto_increment primary key,
    rua varchar (150) not null,
    cep varchar(20) not null,
    bairro varchar (100) not null,
    numero varchar (10) not null,
    complemento varchar (200),
    idestado int not null,
    
    constraint FK_Estado_Endereco
    foreign key (idestado) 
    references tblestado (idestado),
    
    unique index (idendereco)
);

create table tblestado (
	idestado int not null auto_increment primary key,
    nome varchar(80) not null,
    sigla varchar(5),
    
	unique index (idestado)
);

create table tblcidade(
	idcidade int not null auto_increment primary key,
    nome varchar (80) not null,
    idestado int not null,
    
   constraint FK_Estado_Cidade
    foreign key (idestado) 
    references tblestado (idestado),
    
    unique index (idcidade)
);

create table tbljogo_cliente (
idjogo_cliente int not null auto_increment primary key,
    idjogo int not null,
    idcliente int not null,
   
    constraint FK_Jogo_Jogo_Cliente
    foreign key (idjogo)
    references tbljogo (idjogo),
   
    constraint FK_Cliente_Jogo_Cliente
    foreign key (idcliente)
    references tblcliente (idcliente),
   
    unique index (idjogo_cliente)
);

create table tblloja (
	idloja int not null auto_increment primary key,
    endereco text not null,
    
    unique index (idloja)
);

insert into tblloja (endereco) values ('Loja Iguatemi');

select * from tblloja;

create table tbljogo_loja (
idjogo_loja int not null auto_increment primary key,
    idjogo int not null,
    idloja int not null,
   
    constraint FK_Jogo_Jogo_Loja
    foreign key (idjogo)
    references tbljogo (idjogo),
   
    constraint FK_Loja_Jogo_Loja
    foreign key (idloja)
    references tblloja (idloja),
   
    unique index (idjogo_loja)
);

insert into tbljogo_loja (idjogo, idloja) values (9,3);

select * from tbljogo_loja;
select * from tbljogo;
select * from tblloja;

create table tblplataforma (
	idplataforma int not null auto_increment primary key,
    nome varchar (50) not null,
    
    unique index (idplataforma)
);

insert into tblplataforma (nome) values ('WiiU');

select * from tblplataforma;

create table tbljogo_plataforma (
idjogo_plataforma int not null auto_increment primary key,
    idjogo int not null,
    idplataforma int not null,
   
    constraint FK_Jogo_JogoPlataforma
    foreign key (idjogo)
    references tbljogo (idjogo),
   
    constraint FK_Plataforma_JogoPlataforma
    foreign key (idplataforma)
    references tblplataforma (idplataforma),
   
    unique index (idjogo_plataforma)
);

insert into tbljogo_plataforma (idjogo, idplataforma ) values (9,8);

select * from tbljogo;

select * from tblplataforma;

select * from tbljogo_plataforma;


create table tblcartao_de_credito (
	idcartao_de_credito int not null auto_increment primary key,
    nome varchar (100) not null,
    numero int not null,
    data_de_validade date not null,
    codigo int not null,
    
    unique index (idcartao_de_credito)
);

create table tblagencia_bancaria (
	idagencia_bancaria int not null auto_increment primary key,
    agencia int not null,
    conta varchar (45) not null,
    banco int not null,
    
    unique index (idagencia_bancaria)
);

create table tblmeios_de_pagamento (
	idmeios_de_pagamento int not null auto_increment primary key,
    pix varchar(200),
    boleto varchar (200),
    
    unique index (idmeios_de_pagamento)
);

create table tblmeio_credito (
idmeio_credito int not null auto_increment primary key,
    idmeios_de_pagamento int not null,
    idcartao_de_credito int not null,
   
    constraint FK_MeiosDePagamento_MeioCredito
    foreign key (idmeios_de_pagamento)
    references tblmeios_de_pagamento (idmeios_de_pagamento),
   
    constraint FK_CartaoDeCredito_MeioCredito
    foreign key (idcartao_de_credito)
    references tblcartao_de_credito (idcartao_de_credito),
   
    unique index (idmeio_credito)
);

create table tblmeio_bancario (
idmeio_bancario int not null auto_increment primary key,
    idmeios_de_pagamento int not null,
    idagencia_bancaria int not null,
   
    constraint FK_MeiosDePagamento_MeioBancario
    foreign key (idmeios_de_pagamento)
    references tblmeios_de_pagamento (idmeios_de_pagamento),
   
    constraint FK_AgenciaBancaria_MeioBancario
    foreign key (idagencia_bancaria)
    references tblagencia_bancaria (idagencia_bancaria),
   
    unique index (idmeio_bancario)
);






select * from tbljogo_cliente;

select * from tblcidade;




