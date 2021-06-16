create database apicrudphp;
use apicrudphp;

CREATE TABLE IF NOT EXISTS tbProdutos (
    codigo int,
    nome varchar(100), 
    descrição varchar (200),
    quantidade int(100),
    valor_unitario float,
    data_entrada date,
    imagem longblob,
    primary key (codigo)
);